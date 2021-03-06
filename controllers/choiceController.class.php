<?php


class choiceController{


    /**************************************************************************************************************/
    /*                                          CONTROLLERS FRONT                                                 */
    /**************************************************************************************************************/
    public function indexAction( $args )
    {


        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {
            header("Location: ".BASE_URL);
        }
        else {
            // Verification des valeurs de la campagne en cours
            $arrayCampagne = self::getCampagneArrayAttributes();

            // Si le participant a déja ajouté une photo au jeu en cours
            if( isset($_SESSION["id_participant"]) && photo::alreadyAddPhoto($_SESSION["id_participant"],$arrayCampagne["id"]) ){
                header("Location: ".BASE_URL."vote");
            }
            else{
                $view->setView("indexChoice");
                $view->assign("base_url", BASE_URL);
                $view->assign("facebook_choice_url", BASE_URL.'choice/facebook');
                $view->assign("download_choice_url", BASE_URL.'choice/download');
                $view->assign("vote_url", BASE_URL.'vote');
                $view->assign("array_campagne", $arrayCampagne);
            }

        }
    }


    /*********************************************************************/
    /*                           DOWNLOAD CHOICE                         */
    /*********************************************************************/


    public function downloadAction(){

        // Verification des valeurs de la campagne en cours
        $arrayCampagne = self::getCampagneArrayAttributes();

        // Si le participant a déja ajouté une photo au jeu en cours
        if( isset($_SESSION["id_participant"]) && photo::alreadyAddPhoto($_SESSION["id_participant"],$arrayCampagne["id"]) ){
            header("Location: ".BASE_URL."vote");
        }
        else {

            $id_participant = participant::getIdParticipant();
            if ($id_participant == false) {
                header("Location: " . BASE_URL);
            }
            else{
                $view = new view();

                $fb = facebook::getVarFb();

                $arrAlbum = $this->userAlbums($fb);

                $view->setView("downloadChoice");
                $view->assign("base_url", BASE_URL);
                $view->assign("user_albums", $arrAlbum);
                $view->assign("array_campagne", $arrayCampagne);
                $view->assign("id_campagne", $arrayCampagne["id"]);
                $view->assign("array_campagne", $arrayCampagne);
                $view->assign("id_participant", $id_participant);
            }
        }
    }


    public function uploadAction(){
        if( isset($_SESSION['facebook_access_token'])){
            if( isset($_POST["id_album"]) && !empty($_POST["id_album"]) ){


                $fb = facebook::getVarFb();

                $img = $_FILES["image"];
                $id_album = $_POST["id_album"];

                $message_partage = <<<HTML
                    Toi aussi participe au concours photo get gagne des cadeaux :
                    https://apps.facebook.com/picturechallenge
                    
                    Voici ma photo :
HTML;


                $data = [
                    'message' => $message_partage,
                    'source' => $fb->fileToUpload($img["tmp_name"])
                ];


                try{
                    $fb->post("/".$id_album."/photos",$data,$_SESSION['facebook_access_token']);

                    $_SESSION["id_participant"] = $_POST["id_participant"];
                    $_SESSION["id_photo_facebook" ]= "9999";
                    $_SESSION["id_album_facebook" ]= $id_album;
                    $_SESSION["id_campagne"] = $_POST["id_campagne"];

                    header("Location: ".BASE_URL."choice/lastpicture");
                }
                catch(FacebookSDKException $e){
                    header("Location: ".BASE_URL."choice/download/erreur");
                }
            }
            else{
                header("Location: ".BASE_URL."choice/download");
            }
        }
        else{
            header("Location: ".BASE_URL."choice/download");
        }
    }

    public function lastpictureAction(){

        if(isset($_SESSION["id_album_facebook" ]) && !empty($_SESSION["id_album_facebook" ])){
            $id_album = $_SESSION["id_album_facebook" ];
            $fb = facebook::getVarFb();
            $_SESSION["url_photo"] = $this->lastPhotoAlbum($fb,$id_album) ;
            header("Location: ".BASE_URL."participant/recap");
        }
        else{
            header("Location: ".BASE_URL."choice");
        }
    }




    /*********************************************************************/
    /*                           FACEBOOK CHOICE                         */
    /*********************************************************************/


    public function facebookAction( $args ){

        // Verification des valeurs de la campagne en cours
        $arrayCampagne = self::getCampagneArrayAttributes();

        // Si le participant a déja ajouté une photo au jeu en cours
        if( isset($_SESSION["id_participant"]) && photo::alreadyAddPhoto($_SESSION["id_participant"],$arrayCampagne["id"]) ){
            header("Location: ".BASE_URL."vote");
        }
        else {
            $view = new view();


            $fb = facebook::getVarFb();
            $arrAlbum = $this->userAlbums($fb);

            if (isset($args["a"])) {
                if (array_key_exists($args["a"], $arrAlbum)) {
                    $array_photos = $this->photosAlbum($fb, $args["a"]);
                    $view->assign("array_photos", $array_photos);
                    $view->assign("id_album", $args["a"]);
                } else {
                    header("Location: " . BASE_URL . "choice/facebook");
                }
            } else {
                $view->assign("array_photos", "null");
            }

            $id_participant = participant::getIdParticipant();
            if ($id_participant == false) {
                header("Location: " . BASE_URL);
            }

            $view->setView("facebookChoice");
            $view->assign("base_url", BASE_URL);
            $view->assign("user_albums", $arrAlbum);
            $view->assign("id_campagne", $arrayCampagne["id"]);
            $view->assign("array_campagne", $arrayCampagne);
            $view->assign("id_participant", $id_participant);
        }
    }













/**************************************************************************************************************/
/*                                          METHODES                                                          */
/**************************************************************************************************************/











    public function userAlbums( $fb){


        $arrAlbums = [];
        $arrPhotos = null;

        $response = $fb->get('/me?fields=albums', $_SESSION['facebook_access_token']);

        $graphNode = $response->getGraphNode();
        $albums = $graphNode->getField("albums");

        foreach ($albums as $album) {
            $albumId = $album->getField("id");
            $arrAlbums [$albumId]["name"] = $album->getField("name");
        }

        return $arrAlbums;
    }


    public function photosAlbum( $fb , $idAlbum ){

        $arrayPhotos = [];

        $response = $fb->get("/".$idAlbum."/photos", $_SESSION['facebook_access_token']);
        $photos = $response->getDecodedBody()['data'];

        foreach ($photos as $photo) {

            $response = $fb->get("/".$photo["id"]."/picture", $_SESSION['facebook_access_token']);

            $urlPhoto = $response->getHeaders()["Location"];
            $idPhoto = $photo["id"];

            $arrayPhotos[] = ["url" => $urlPhoto, "id" => $idPhoto];
        }

        return $arrayPhotos;
    }


    public function lastPhotoAlbum( $fb , $idAlbum ){

        $urlPhoto = "";

        $response = $fb->get("/".$idAlbum."/photos", $_SESSION['facebook_access_token']);
        $photos = $response->getDecodedBody()['data'];

        $nb = 1;

        foreach ($photos as $photo) {
            if($nb<count($photos)){
                $response = $fb->get("/".$photo["id"]."/picture", $_SESSION['facebook_access_token']);

                $urlPhoto = $response->getHeaders()["Location"];
            }
            $nb++;
        }

        return $urlPhoto;
    }






    public function getCampagneArrayAttributes(){

        $campagneArray = [];

        if( !isset($_SESSION["campagne_in_session"]) || $_SESSION["campagne_in_session"] == "OK"  ){
            $campagne = campagne::loadCurrent();
            $_SESSION["campagne_id"] = $campagne->getId();
            $_SESSION["campagne_logo_entreprise"] = $campagne->getLogoEntreprise();
            $_SESSION["campagne_nom_campagne"] = $campagne->getNomCampagne();
            $_SESSION["campagne_date_debut"] = $campagne->getDateDebut();
            $_SESSION["campagne_date_fin"] = $campagne->getDateFin();
            $_SESSION["campagne_couleur"] = $campagne->getCouleur();
            $_SESSION["campagne_text_accueil"] = $campagne->getTextAccueil();
            $_SESSION["campagne_text_felicitations"] = $campagne->getTextFelicitations();
            $_SESSION["campagne_is_active"] = $campagne->getIsActive();
            $_SESSION["campagne_nom_lot"] = $campagne->getNomLot();
            $_SESSION["campagne_description_lot"] = $campagne->getDescriptionLot();
            $_SESSION["campagne_image_lot"] = $campagne->getImageLot();
            $_SESSION["campagne_photo_accueil_one"] = $campagne->getPhotoAccueilOne();
            $_SESSION["campagne_photo_accueil_two"] = $campagne->getPhotoAccueilTwo();
            $_SESSION["campagne_photo_accueil_three"] = $campagne->getPhotoAccueilThree();
            $_SESSION["campagne_icone_coeur"] = $campagne->getIconeCoeur();
            $_SESSION["campagne_icone_principale"] = $campagne->getIconePrincipale();
            $_SESSION["cgu"] = $campagne->getCgu();
            $_SESSION["campagne_in_session"] = "OK";
        }

        $campagneArray["id"] = $_SESSION["campagne_id"];
        $campagneArray["logo_entreprise"] = $_SESSION["campagne_logo_entreprise"];
        $campagneArray["nom_campagne"] = $_SESSION["campagne_nom_campagne"];
        $campagneArray["date_debut"] = $_SESSION["campagne_date_debut"];
        $campagneArray["date_fin"] = $_SESSION["campagne_date_fin"];
        $campagneArray["couleur"] = $_SESSION["campagne_couleur"];
        $campagneArray['text_accueil'] = $_SESSION["campagne_text_accueil"];
        $campagneArray['text_felicitations'] = $_SESSION["campagne_text_felicitations"];
        $campagneArray['is_active'] = $_SESSION["campagne_is_active"];
        $campagneArray['nom_lot'] = $_SESSION["campagne_nom_lot"];
        $campagneArray['description_lot'] = $_SESSION["campagne_description_lot"];
        $campagneArray['image_lot'] = $_SESSION["campagne_image_lot"];
        $campagneArray['photo_accueil_one'] = $_SESSION["campagne_photo_accueil_one"];
        $campagneArray['photo_accueil_two'] = $_SESSION["campagne_photo_accueil_two"];
        $campagneArray['photo_accueil_three'] = $_SESSION["campagne_photo_accueil_three"];
        $campagneArray['icone_coeur'] = $_SESSION["campagne_icone_coeur"];
        $campagneArray['icone_principale'] = $_SESSION["campagne_icone_principale"];
        $campagneArray['cgu'] = $_SESSION["cgu"];

        return $campagneArray;
    }
}
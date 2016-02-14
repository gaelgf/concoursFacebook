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
        } else {
            // Verification des valeurs de la campagne en cours
            $arrayCampagne = self::getCampagneArrayAttributes();

            $view->setView("indexChoice");
            $view->assign("base_url", BASE_URL);
            $view->assign("facebook_choice_url", BASE_URL.'choice/facebook');
            $view->assign("download_choice_url", BASE_URL.'choice/download');
            $view->assign("vote_url", BASE_URL.'vote');
            $view->assign("array_campagne", $arrayCampagne);
        }
    }


    /*********************************************************************/
    /*                           DOWNLOAD CHOICE                         */
    /*********************************************************************/


    public function downloadAction(){
        $view = new view();

        $fb = facebook::getVarFb();

        $arrAlbum = $this->userAlbums( $fb );


        $view->setView("downloadChoice");
        $view->assign("base_url", BASE_URL);
        $view->assign("user_albums", $arrAlbum);
    }


    public function uploadAction(){
        if( isset($_SESSION['facebook_access_token'])){
            if( isset($_POST["id_album"]) && !empty($_POST["id_album"]) ){


                $fb = facebook::getVarFb();

                $img = $_FILES["image"];
                $id_album = $_POST["id_album"];

                $data = [
                    'message' => "Toi aussi participe au concours photo !",
                    'source' => $fb->fileToUpload($img["tmp_name"])
                ];


                try{
                    $response = $fb->post("/".$id_album."/photos",$data,$_SESSION['facebook_access_token']);
                    header("Location: ".BASE_URL."/vote");
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


    /*********************************************************************/
    /*                           FACEBOOK CHOICE                         */
    /*********************************************************************/


    public function facebookAction(){
        $view = new view();


        // Verification des valeurs de la campagne en cours
        $arrayCampagne = self::getCampagneArrayAttributes();

        $fb = facebook::getVarFb();

        $arrAlbum = $this->userAlbums( $fb );
        $arrPhotosByAlbum = $this->photosAlbum( $fb , $arrAlbum );


        $view->setView("facebookChoice");
        $view->assign("base_url", BASE_URL);
        $view->assign("user_albums", $arrAlbum);
        $view->assign("photos_album", $arrPhotosByAlbum);
        $view->assign("array_campagne", $arrayCampagne);
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


    public function photosAlbum( $fb , $albums ){

        $arrPhotos = [];

        foreach ($albums as $album) {

            $albumId = $album["id"];

            $response = $fb->get("/".$albumId."?fields=photos", $_SESSION['facebook_access_token']);

            $photos = $response->getDecodedBody()["photos"]["data"];

            foreach ($photos as $photo) {

                $response = $fb->get("/$albumId?fields=picture", $_SESSION['facebook_access_token']);

                $urlPhoto = $response->getDecodedBody()["picture"];
                $idPhoto = $response->getDecodedBody()["id"];

                $photo = ["url" => $urlPhoto, "id" => $idPhoto];

                $arrPhotos[$album["id"]][]  = $photo;
            }
        }

        return ;
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

        return $campagneArray;
    }
}
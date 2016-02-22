<?php


class participantController
{
    public function saveAction($args)
    {
        //$participant = new participant( NULL, "27", "123456", "thibault", "jullion", "1990-04-15", true);
        //$participant->save();
        $thibault = participant::loadById(1);
        var_dump($thibault);
        echo $thibault->isParticipatingToCampagne(27);
    }


    public function recapAction(){

        $view = new view();
        $view->setView("recapParticipant");

        if( isset($_POST["url_photo"]) && !empty($_POST["url_photo"])
            && isset($_SESSION["id_participant"]) && !empty($_SESSION["id_participant"])
            && isset($_POST["id_photo_facebook"]) && !empty($_POST["id_photo_facebook"])
            && isset($_POST["id_album_facebook"]) && !empty($_POST["id_album_facebook"])
            && isset($_POST["id_campagne"]) && !empty($_POST["id_campagne"])
        ){
            $posts = $_POST;
        }
        else if( isset($_SESSION["url_photo"]) && !empty($_SESSION["url_photo"])
            && isset($_SESSION["id_participant"]) && !empty($_SESSION["id_participant"])
            && isset($_SESSION["id_photo_facebook"]) && !empty($_SESSION["id_photo_facebook"])
            && isset($_SESSION["id_album_facebook"]) && !empty($_SESSION["id_album_facebook"])
            && isset($_SESSION["id_campagne"]) && !empty($_SESSION["id_campagne"])
        ){
            $posts = $_SESSION;
            unset($_SESSION["url_photo"]) ;
            unset($_SESSION["id_photo_facebook" ]);
            unset($_SESSION["id_album_facebook" ]);
            unset($_SESSION["id_campagne"]);
        }
        else{
            header("Location: ".BASE_URL."choice");
        }


        // Verification des valeurs de la campagne en cours
        $arrayCampagne = self::getCampagneArrayAttributes();


        $view->assign("posts", $posts);
        $view->assign("base_url", BASE_URL);
        $view->assign("array_campagne", $arrayCampagne);
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
<?php


class photoController
{
    public function indexAction(){

    }
    public function addAction(){

        // SI tous les éléments sont présents pour l'ajout
        if($this->verifyPostPhoto()){
            $photo = new photo($id = NULL,
                $_POST['id_participant'],
                $_POST['id_photo_facebook'],
                $_POST['id_album_facebook'],
                $_POST['url_photo'],
                $_POST['id_campagne']);
            $photo->save();
            header("Location: ".BASE_URL."photo/validation");
        }
        else{
            header("Location: ".BASE_URL."choice");
        }
    }






    public function validationAction(){
        // Verification des valeurs de la campagne en cours
        $arrayCampagne = self::getCampagneArrayAttributes();

        $view = new view();
        $view->setView("validationPhoto");
        $view->assign("array_campagne", $arrayCampagne);
        $view->assign("base_url", BASE_URL);
    }









    public function verifyPostPhoto(){

        $res = true;

        if( !isset($_POST['url_photo']) || empty($_POST['url_photo'])){
            $res = false;
        }
        if( !isset($_POST['id_participant']) || empty($_POST['id_participant'])){
            $res = false;
        }
        if( !isset($_POST['id_photo_facebook']) || empty($_POST['id_photo_facebook'])){
            $res = false;
        }
        if( !isset($_POST['id_album_facebook']) || empty($_POST['id_album_facebook'])){
            $res = false;
        }
        if( !isset($_POST['id_campagne']) || empty($_POST['id_campagne'])){
            $res = false;
        }


        return $res;
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
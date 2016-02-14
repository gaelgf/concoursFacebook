<?php


class voteController{
    public function indexAction( $args )
    {


        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {
            header("Location: ".BASE_URL);
        } else {
            // Verification des valeurs de la campagne en cours
            $arrayCampagne = self::getCampagneArrayAttributes();
            $view->setView("indexVote");
            $view->assign("base_url", BASE_URL);
            $view->assign("array_campagne", $arrayCampagne);
        }
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
            $_SESSION["campagne_url_icone"] = $campagne->getUrlIcone();
            $_SESSION["campagne_text_accueil"] = $campagne->getTextAccueil();
            $_SESSION["campagne_text_felicitations"] = $campagne->getTextFelicitations();
            $_SESSION["campagne_is_active"] = $campagne->getIsActive();
            $_SESSION["campagne_nom_lot"] = $campagne->getNomLot();
            $_SESSION["campagne_description_lot"] = $campagne->getDescriptionLot();
            $_SESSION["campagne_image_lot"] = $campagne->getImageLot();
            $_SESSION["campagne_in_session"] = "OK";
        }

        $campagneArray["id"] = $_SESSION["campagne_id"];
        $campagneArray["logo_entreprise"] = $_SESSION["campagne_logo_entreprise"];
        $campagneArray["nom_campagne"] = $_SESSION["campagne_nom_campagne"];
        $campagneArray["date_debut"] = $_SESSION["campagne_date_debut"];
        $campagneArray["date_fin"] = $_SESSION["campagne_date_fin"];
        $campagneArray["couleur"] = $_SESSION["campagne_couleur"];
        $campagneArray['url_icone'] = $_SESSION["campagne_url_icone"];
        $campagneArray['text_accueil'] = $_SESSION["campagne_text_accueil"];
        $campagneArray['text_felicitations'] = $_SESSION["campagne_text_felicitations"];
        $campagneArray['is_active'] = $_SESSION["campagne_is_active"];
        $campagneArray['nom_lot'] = $_SESSION["campagne_nom_lot"];
        $campagneArray['description_lot'] = $_SESSION["campagne_description_lot"];
        $campagneArray['image_lot'] = $_SESSION["campagne_image_lot"];

        return $campagneArray;
    }
}
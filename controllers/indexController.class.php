<?php

include "campagneController.class.php";

class indexController{
    public function indexAction( $args )
    {
        $view = new view();

        //print_r(campagne::loadById(1));

        if (!isset($_SESSION['facebook_access_token'])) {

            $helper = facebook::conectionFacebook();
            $permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional

            if(BASE_URL === '/') {
                $loginUrl = $helper->getLoginUrl( 'https://fierce-refuge-2356.herokuapp.com/index/validation', $permissions);
            } else {
                $loginUrl = $helper->getLoginUrl( BASE_URL.'index/validation', $permissions);
            }

            // Verification des valeurs de la campagne en cours
            $arrayCampagne = self::getCampagneArrayAttributes();

            $view->setView("indexIndex");

            $view->assign("login_url", $loginUrl);
            $view->assign("array_campagne", $arrayCampagne);

        } else {
            header("Location: ".BASE_URL."choice");
        }
    }



    public function validationAction(){
        $helper = facebook::conectionFacebook();

        try {
            $accessToken = $helper->getAccessToken();
        }
        catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        }
        catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }





        if (isset($accessToken)) {
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            header("Location: ".BASE_URL."choice/");
        }
        else{
            // redirection vers accueil
            //header("Location: ".BASE_URL);
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
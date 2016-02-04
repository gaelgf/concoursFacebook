<?php

include "baseController.class.php" ;

class indexController extends baseController{
    public function indexAction( $args )
    {

        //$campagne = new campagne();
        //$campagne->setTitle("Campagne 1");
        //$campagne->setDescription("Lorem Ipsum");

        //$campagne->save();

        $view = new view();


        if (!isset($_SESSION['facebook_access_token'])) {

            $helper = parent::conectionFacebook();
            $permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
            $loginUrl = $helper->getLoginUrl('https://fierce-refuge-2356.herokuapp.com/validation_connexion', $permissions);

            $view->setView("indexIndex");

            $view->assign("login_url", $loginUrl);
        } else {
            header("Location: ".parent::getPath()."choix");
        }
    }
}
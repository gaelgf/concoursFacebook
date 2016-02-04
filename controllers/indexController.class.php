<?php


class indexController{
    public function indexAction( $args )
    {

        //$campagne = new campagne();
        //$campagne->setTitle("Campagne 1");
        //$campagne->setDescription("Lorem Ipsum");

        //$campagne->save();

        $view = new view();


        if (!isset($_SESSION['facebook_access_token'])) {

            $helper = configClass::conectionFacebook();
            $permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
            $loginUrl = $helper->getLoginUrl( configClass::getPath().'validation_connexion', $permissions);

            $view->setView("indexIndex");

            $view->assign("login_url", $loginUrl);
        } else {
            header("Location: ".parent::getPath()."choix");
        }
    }
}
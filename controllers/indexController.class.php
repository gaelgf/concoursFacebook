<?php


class indexController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {

            $helper = facebook::conectionFacebook();
            $permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
            $loginUrl = $helper->getLoginUrl( BASE_URL.'validation_connexion', $permissions);

            $view->setView("indexIndex");

            $view->assign("login_url", $loginUrl);

        } else {
            header("Location: ".BASE_URL."choix");
        }
    }
}
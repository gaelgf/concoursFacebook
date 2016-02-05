<?php


/*class adminController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {// TO DO : check if isAdmin

            $helper = facebook::conectionFacebook();
            $permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
            $loginUrl = $helper->getLoginUrl( BASE_URL.'validation_connexion', $permissions);

            $view->setView("campagnesIndex", "adminlayout");

        } else {
            header("Location: ".BASE_URL."login");// TO DO : do login page
        }
    }
}*/
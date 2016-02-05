<?php


class indexController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {

            $helper = facebook::conectionFacebook();
            $permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
            $loginUrl = $helper->getLoginUrl( BASE_URL.'index/validation', $permissions);

            $view->setView("indexIndex");

            $view->assign("login_url", $loginUrl);

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
            // Logged in!
            $_SESSION['facebook_access_token'] = (string) $accessToken;
            //header("Location: ".BASE_URL."choice");
        }
        else{
            // redirection vers accueil
            //header("Location: ".BASE_URL);
        }
    }

}
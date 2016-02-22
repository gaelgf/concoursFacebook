<?php


class indexController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {

            $helper = facebook::conectionFacebook();
            $permissions = []; // optional

            if(BASE_URL === '/') {
                $loginUrl = $helper->getLoginUrl( 'https://fierce-refuge-2356.herokuapp.com/admin/index/validation', $permissions);
            } else {
                $loginUrl = $helper->getLoginUrl( BASE_URL.'admin/index/validation', $permissions);
            }

            $view->setView("admin/indexIndex", "loginLayout");
            $view->assign("login_url", $loginUrl);

        } else {
        	$fb = facebook::getVarFb();

            $response = $fb->get('/me', $_SESSION['facebook_access_token']);
            $user = $response->getGraphUser();
            $idFacebook = $response->getDecodedBody()["id"];

            if(admin::isAdmin($idFacebook)) {
            	echo "window.top.location = '".BASE_URL."admin/campagnes/index';";
            	//header("Location: ".BASE_URL."admin/campagnes/index");
            } else {
            	$view->setView("admin/indexIndex", "loginLayout");
        		$view->assign("notAdmin", 'Vous devez être un administrateur pour accéder à cette partie du site');
            }
        }
    }

    public function notAdmin() {
    	$helper = facebook::conectionFacebook();
        $permissions = []; // optional

        if(BASE_URL === '/') {
            $loginUrl = $helper->getLoginUrl( 'https://fierce-refuge-2356.herokuapp.com/admin/index/validation', $permissions);
        } else {
            $loginUrl = $helper->getLoginUrl( BASE_URL.'admin/index/validation', $permissions);
        }

        $view->setView("admin/indexIndex", "loginLayout");
        $view->assign("notAdmin", 'Vous devez être un administrateur pour accéder à cette partie du site');
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

            // Recuperation des données facebook
            $fb = facebook::getVarFb();

            $response = $fb->get('/me', $_SESSION['facebook_access_token']);
            $user = $response->getGraphUser();
            $idFacebook = $response->getDecodedBody()["id"];

            if(admin::isAdmin($idFacebook)) {
            	header("Location: ".BASE_URL."admin/campagnes/index");
            } else {
            	$view = new view();
            	$view->setView("admin/indexIndex", "loginLayout");
        		$view->assign("notAdmin", 'Vous devez être un administrateur pour accéder à cette partie du site');
            }
        }
        else{
            header("Location: ".BASE_URL."admin/index");
        }
    }

}
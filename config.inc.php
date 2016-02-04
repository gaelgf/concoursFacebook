<?php




require_once "assets/fb_sdk/src/Facebook/autoload.php";

class configClass{

    public static function conectionFacebook(){
        $fb = new Facebook\Facebook([
            'app_id' => '1545660598783922',
            'app_secret' => 'ca702576b5815fbccba65343c8003198',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();

        return $helper;
    }


    public static function getPath(){
        return "/facebook/";
    }
}
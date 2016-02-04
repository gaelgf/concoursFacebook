<?php

class rooting{

    public static function getRooting(){
        $uri = str_replace("/facebook/","",$_SERVER["REQUEST_URI"]);

        $uri = explode("?",$uri);
        $array_uri = explode("/", trim($uri[0],"/") );

        $controller = (empty($array_uri[0]))? "index" : $array_uri[0];
        unset($array_uri[0]);

        $action = (empty($array_uri[1]))? "index" : $array_uri[1];
        unset($array_uri[1]);

        $args = array_merge($array_uri,$_POST);
        if( isset($uri[1]) ){
            $args = array_merge( $args , $_GET );
        }

        return ["c"=> $controller , "a" => $action , "args" => $args];
    }
}
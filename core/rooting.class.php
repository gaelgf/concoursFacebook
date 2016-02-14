<?php

class rooting{

    public static function getRooting(){
        $uri = str_replace("/facebook/","",$_SERVER["REQUEST_URI"]);

        $uri = explode("?",$uri);
        $array_uri = explode("/", trim($uri[0],"/") );

        $controllerPath = empty($array_uri[0])? "index" : $array_uri[0];
        $actionPath = empty($array_uri[1])? "index" : $array_uri[1];
        if($array_uri[0] === 'admin') {
            unset($array_uri[0]);
            $controllerPath = "admin/" . (empty($array_uri[1])? "index" : $array_uri[1]);
            $actionPath = empty($array_uri[2])? "index" : $array_uri[2];
        }
 
        $controller = $controllerPath;
        unset($controllerPath);

        $action = $actionPath;
        unset($actionPath);

        $args = array_merge($array_uri,$_POST);
        if( isset($uri[1]) ){
            $args = array_merge( $args , $_GET );
        }

        return ["c"=> $controller , "a" => $action , "args" => $args];
    }
}
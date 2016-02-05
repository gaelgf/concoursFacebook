<?php
error_reporting(E_ALL);
ini_set("display_errors",1);

session_start();

require_once("config.inc.php");


function includeCore( $class ){
    if( file_exists("core/".$class.".class.php")){
        include("core/".$class.".class.php");
    }
}

function includeModel( $class ){
    if( file_exists("models/".$class.".class.php")){
        include("models/".$class.".class.php");
    }
}

spl_autoload_register("includeCore");
spl_autoload_register("includeModel");

$root = rooting::getRooting();

$path_controller = "controllers/".$root["c"]."Controller.class.php";
$name_controller = str_replace("admin/", "", $root["c"]) ."Controller";

if( file_exists($path_controller) ){
    include($path_controller);
    $c = new $name_controller;

    $name_action = $root["a"]."Action";
    if( method_exists($c,$name_action) ){
        $c->$name_action($root["args"]);
    }
    else{
        die("Action inexistante");
    }
}
else{
    die("Controller inexistant");
}
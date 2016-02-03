<?php


class view{

    private $layout;
    private $view;
    private $data = [];

    public function setView( $view , $layout = "layout" ){
        $layout_path = "view/".$layout.".php";
        if( file_exists($layout_path) ){
            $this->layout = $layout_path;
        }
        else{
            die("Layout inexistant");
        }


        $view_path = "view/".$view.".php";
        if( file_exists($view_path) ){
            $this->view = $view_path;
        }
        else{
            die("View inexistant");
        }

    }

    public function assign( $cle , $valeur ){
        $this->data[$cle] = $valeur;
    }

    public function __destruct(){
        extract($this->data);
        include($this->layout);
        die();
    }

}
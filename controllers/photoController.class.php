<?php


class photoController
{
    public function indexAction(){

    }
    public function ajoutAction(){

        // SI tous les éléments sont présents pour l'ajout
        if($this->verifyPostPhoto()){
            $photo = new photo($id = NULL,
                $_POST['id_participant'],
                $_POST['id_photo_facebook'],
                $_POST['id_album_facebook'],
                $_POST['url_photo']);

            $photo->save();
            header("Location: ".BASE_URL."photo/validation");
        }
        else{
            header("Location: ".BASE_URL."choice");
        }
    }
    public function validationAction(){
        $view = new view();
        $view->setView("validationPhoto");
    }









    public function verifyPostPhoto(){

        $res = true;

        if( !isset($_POST['url_photo']) || empty($_POST['url_photo'])){
            $res = false;
        }
        if( !isset($_POST['id_participant']) || empty($_POST['id_participant'])){
            $res = false;
        }
        if( !isset($_POST['id_photo_facebook']) || empty($_POST['id_photo_facebook'])){
            $res = false;
        }
        if( !isset($_POST['id_album_facebook']) || empty($_POST['id_album_facebook'])){
            $res = false;
        }


        return $res;
    }
}
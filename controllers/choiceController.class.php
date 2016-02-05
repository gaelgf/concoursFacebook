<?php


class choiceController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {
            header("Location: ".BASE_URL);
        } else {
            $view->setView("Index");
        }
    }
}
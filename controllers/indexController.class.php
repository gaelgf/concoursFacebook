<?php
class indexController{
    public function indexAction( $args ){

        $campagne = new campagne();
        $campagne->setTitle("Campagne 1");
        $campagne->setDescription("Lorem Ipsum");

        $campagne->save();

        $view = new view();
        $view->setView("indexIndex");

        $view->assign("valeur_1","32");
    }

    public function testAction( $args ){
        echo "test2";
    }

}
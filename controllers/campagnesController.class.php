<?php


class campagnesController{
    public function indexAction( $args )
    {
        return self::showAction($args);
    }

    public function showAction( $args )
    {
        $view = new view();
        $view->setView("campagnesShow", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }

    public function editAction( $args )
    {
        $view = new view();
        $view->setView("campagnesEdit", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }
}
<?php


class campagnesController{
    public function indexAction( $args )
    {
        return self::showAction($args);
    }

    public function showAction( $args )
    {
        $view = new view();
        $view->setView("admin/campagnesShow", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }

    public function editAction( $args )
    {
        $view = new view();
        $view->setView("admin/campagnesEdit", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }
}
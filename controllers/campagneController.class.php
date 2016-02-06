<?php


class campagnesController{
    public function indexAction( $args )
    {
        return self::showAction($args);
    }

    public function showAction( $args )
    {
        $view = new view();
        $view->setView("showCampagne", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }

    public function editAction( $args )
    {
        $view = new view();
        $view->setView("editCampagne", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }

    public function showallAction( $args )
    {
        $view = new view();
        $view->setView("showAllCampagne", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }
}
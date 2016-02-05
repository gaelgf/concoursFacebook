<?php

class campagnesController{
    public function indexAction( $args )
    {
        return self::showAction($args);
    }

    public function showallaction( $args )
    {
        $view = new view();
        $view->setView("admin/showAllCampagnes", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }

    public function createAction( $args ) {
        $view = new view();
        $view->setView("admin/createCampagne", "adminlayout");
    }

    public function saveAction ( $args ) {
        $errorsMessages = [];

        if( campagne::checkCampagneArray(array_slice($args, 2)) !== [] ) {
            $errorsMessages = campagne::checkCampagneArray(array_slice($args, 2));
        } else {
            $campagne = campagne::campagneFromArray($args);
            if(!$campagne->save()) {
                $errorsMessages[] = "Erreur lors de l'engistrement de la campagne.";
            }
        }

        $view = new View();
        if(sizeof($errorsMessages) > 0) {
            $view->setView("admin/createCampagne", "adminlayout");
            $view->assign("errorsMessages", $errorsMessages);
        } else {
            $view->setView("admin/showAllCampagnes", "adminlayout");
            $campagnes = campagne::load();
            $view->assign("campagnes", $campagnes);
            $view->assign("successMessages", ["Votre campagne a bien été enreistrée"]);
        }
    }

    public function editAction( $args )
    {
        $view = new view();
        $view->setView("admin/editCampagne", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
    }
}
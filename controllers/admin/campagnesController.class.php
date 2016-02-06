<?php

class campagnesController{
    public function indexAction( $args )
    {
        return self::showAction($args);
    }

    public function showallaction( $args )
    {
        if(isset($args['errors'])) {
            $errors = explode( ', ', $args['errors']);
        }
        $view = new view();
        $view->setView("admin/showAllCampagnes", "adminlayout");

        $campagnes = campagne::load();
        $view->assign("campagnes", $campagnes);
        if(isset($errors)) {
            $view->assign("errorsMessages", $errors);
        }
    }

    public function showaction( $args ) {
        if(ctype_digit($args[2])) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval($args[2]));
            if ( !is_array( $campagne ) ) {
                $view = new view();
                $view->setView("admin/showCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
            } else {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            }
        } else {
            $campagne = campagne::loadByName($args[2]);
            if ( !is_array( $campagne ) ) {
                $view = new view();
                $view->setView("admin/showCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
            } else {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            }

        }
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
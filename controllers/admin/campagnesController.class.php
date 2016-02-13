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

        if(isset($args['errors'])) {
            $errors = explode( ', ', $args['errors']);
        }
        if(isset($args['success'])) {
            $success = explode( ', ', $args['success']);
        }

        if(ctype_digit($args[2])) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval($args[2]));
            if ( !is_array( $campagne ) ) {
                $view = new view();
                $view->setView("admin/showCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
                if(isset($errors)) {
                    $view->assign("errorsMessages", $errors);
                }
                if(isset($success)) {
                    $view->assign("successMessages", $success);
                }
            } else {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            }
        } else {
            $campagne = campagne::loadByName($args[2]);
            if ( !is_array( $campagne ) ) {
                $view = new view();
                $view->setView("admin/showCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
                if(isset($errors)) {
                    $view->assign("errorsMessages", $errors);
                }
                if(isset($success)) {
                    $view->assign("successMessages", $success);
                }
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
        if(isset($args['errors'])) {
            $errors = explode( ', ', $args['errors']);
        }
        if(isset($args['success'])) {
            $success = explode( ', ', $args['success']);
        }

        if(ctype_digit($args[2])) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval($args[2]));
            if ( !is_array( $campagne ) ) {
                $view = new view();
                $view->setView("admin/editCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
                if(isset($errors)) {
                    $view->assign("errorsMessages", $errors);
                }
                if(isset($success)) {
                    $view->assign("successMessages", $success);
                }
            } else {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            }
        } else {
            $campagne = campagne::loadByName($args[2]);
            if ( !is_array( $campagne ) ) {
                $view = new view();
                $view->setView("admin/editCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
                if(isset($errors)) {
                    $view->assign("errorsMessages", $errors);
                }
                if(isset($success)) {
                    $view->assign("successMessages", $success);
                }
            } else {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            }

        }
    }

    public function updateAction( $args ) {
        $errorsMessages = [];

        if( campagne::checkCampagneArray(array_slice($args, 2)) !== [] ) {
            $errorsMessages = campagne::checkCampagneArray(array_slice($args, 2));
        } else {
            $campagne = campagne::campagneFromArray($args);
            if(!$campagne->save()) {
                $errorsMessages[] = "Erreur lors de l'engistrement de la campagne.";
            }
        }

        if(sizeof($errorsMessages) > 0) {
            header('Location: ' . BASE_URL . 'admin/campagnes/edit/' . $campagne->getNomCampagne() . '?errors=' . implode($errorsMessages) );
        } else {
            header('Location: ' . BASE_URL . 'admin/campagnes/show/' . $campagne->getNomCampagne() . '?success=' . "La campagne a bien été mise à jour" );
        }
    }

    public function deleteAction( $args ) {
        $errors = [];
        if(ctype_digit($args[2])) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval($args[2]));
            if ( is_array( $campagne ) ) {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            } else {
                if( $errors = $campagne->delete() !== []) {
                    header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($errors) );
                } else {
                    $view = new View();
                    $view->setView("admin/showAllCampagnes", "adminlayout");
                    $campagnes = campagne::load();
                    $view->assign("campagnes", $campagnes);
                    $view->assign("successMessages", ["La campagne " . $args[2] . " a bien été supprimée"]);
                }
            }
        } else {
            $campagne = campagne::loadByName($args[2]);
            if ( is_array( $campagne ) ) {
                header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($campagne) );
            } else {
                if( $errors = $campagne->delete() !== []) {
                    header('Location: ' . BASE_URL . 'admin/campagnes/showAll?errors=' . implode($errors) );
                } else {
                    $view = new View();
                    $view->setView("admin/showAllCampagnes", "adminlayout");
                    $campagnes = campagne::load();
                    $view->assign("campagnes", $campagnes);
                    $view->assign("successMessages", ["La campagne " . $args[2] . " a bien été supprimée"]);
                }
            }
        }
    }
}
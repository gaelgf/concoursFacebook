<?php

class campagnesController{
    public function indexAction( $args )
    {
        return self::showAction($args);
    }

    public function showCurrentAction( $args ) {
        if(isset($args['errors'])) {
            $errors = explode( ', ', $args['errors']);
        }

        $currentCampagne = campagne::loadCurrent();
        $inscrits = participant::loadParticipantsByCampagneId($currentCampagne->getId());

        $view = new view();
        $view->setView("admin/showCampagne", "adminlayout");
        $view->assign("campagne", $currentCampagne);
        $view->assign("inscrits", $inscrits);
        if(isset($errors)) {
            $view->assign("errorsMessages", $errors);
        }
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

        if(ctype_digit(urldecode($args[2]))) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval(urldecode($args[2])));
            if ( !is_array( $campagne ) ) {
                $inscrits = participant::loadParticipantsByCampagneId($campagne->getId());
                $view = new view();
                $view->setView("admin/showCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
                $view->assign("inscrits", $inscrits);
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
            $campagne = campagne::loadByName(urldecode($args[2]));
            if ( !is_array( $campagne ) ) {
                $inscrits = participant::loadParticipantsByCampagneId($campagne->getId());
                $photos = photo::loadByCampagneId($campagne->getId());
                
                $participantsIds = [];                
                foreach ($photos as $key => $photo) {
                    $participantsIds []= $photo->getIdParticipant();
                    $photosByParticipants[$key] = $photo;
                }
                $participants = [];
                $participants = participant::loadByIds($participantsIds);

                $photosIds = [];
                $photosByParticipants = [];
                foreach ($photos as $key => $photo) {
                    $photosIds []= $photo->getId();
                    $photosByParticipants[$key] = $photo;
                }

                $votes = vote::loadByPhotoIds($photosIds);
                $votesByPhotos = [];
                foreach ($votes as $vote) {
                    $votesByPhotos[$vote->getIdPhoto()][] = $vote;
                }

                $notes = [];
                $criteres = critere::load();
                foreach ($votesByPhotos as $key => $votesByPhoto) {
                    $notes[$key] = [];
                    foreach ($criteres as $critere) {
                        $notes[$key][$critere->getNomCritere()] = 0;
                    }
                }

                foreach ($votesByPhotos as $key => $votesByPhoto) {
                    if(count($votesByPhoto) === 0) {
                        foreach ($criteres as $critere) {
                            $notes[$key][$critere->getNomCritere()] = 'aucun vote';
                        }
                    } else {
                        foreach ($votesByPhoto as $vote) {
                            foreach ($criteres as $critere) {
                                if($critere->getId() === $vote->getIdCritere()) {
                                    $notes[$key][$critere->getNomCritere()] += $vote->getValeur();
                                }
                            }
                        }
                        var_dump($notes);
                        foreach ($criteres as $critere) {
                            $notes[$key][$critere->getNomCritere()] /= count($votesByPhoto);
                            $notes[$key][$critere->getNomCritere()] = round($notes[$key][$critere->getNomCritere()]);
                        }
                    }                    
                }
                var_dump($notes);

                $view = new view();
                $view->setView("admin/showCampagne", "adminlayout");
                $view->assign("campagne", $campagne);
                $view->assign("inscrits", $inscrits);
                $view->assign("participants", $participants);
                $view->assign("photosByParticipants", $photosByParticipants);
                $view->assign("notesByParticipants", $notes);
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

        if(ctype_digit(urldecode($args[2]))) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval(urldecode($args[2])));
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
            $campagne = campagne::loadByName(urldecode($args[2]));
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
            header('Location: ' . BASE_URL . 'admin/campagnes/edit/' . urlencode($campagne->getNomCampagne()) . '?errors=' . implode($errorsMessages) );
        } else {
            header('Location: ' . BASE_URL . 'admin/campagnes/show/' . urlencode($campagne->getNomCampagne()) . '?success=' . "La campagne a bien été mise à jour" );
        }
    }

    public function deleteAction( $args ) {
        $errors = [];
        if(ctype_digit(urldecode($args[2]))) {//Si le paramère est un entier (id de la campagne)

            $campagne = campagne::loadById(intval(urldecode($args[2])));
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
                    $view->assign("successMessages", ["La campagne " . urldecode($args[2]) . " a bien été supprimée"]);
                }
            }
        } else {
            $campagne = campagne::loadByName(urldecode($args[2]));
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
                    $view->assign("successMessages", ["La campagne " . urldecode($args[2]) . " a bien été supprimée"]);
                }
            }
        }
    }
}
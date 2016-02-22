<?php

class campagnesController{
    public function indexAction( $args )
    {
        $view = new view();
        $view->setView("admin/accueil", "adminlayout");
    }

    public function showCurrentAction( $args ) {
        if(isset($args['errors'])) {
            $errors = explode( ', ', $args['errors']);
        }

        $campagne = campagne::loadCurrent();
        $inscrits = participant::loadParticipantsByCampagneId($campagne->getId());
        if ( !is_array( $campagne ) ) {
            $inscrits = participant::loadParticipantsByCampagneId($campagne->getId());
            if(isset($inscrits[0]) && $inscrits[0] === "Erreur lors de la récupération de l'objet participant") {
                $inscrits = [];
            }
            $photos = photo::loadByCampagneId($campagne->getId());
            
            $participantsIds = [];
            if($photos[0] === 'Erreur lors de la récupération des photos de la campagne') {
                $photos = [];
            } 
            foreach ($photos as $key => $photo) {
                $participantsIds []= $photo->getIdParticipant();
                $photosByParticipants[$key] = $photo;
            }
            $participants = [];
            $participants = count($participantsIds) > 0 ? participant::loadByIds($participantsIds) : [];

            $photosIds = [];
            $photosByParticipants = [];
            foreach ($photos as $key => $photo) {
                $photosIds []= $photo->getId();
                $photosByParticipants[$key] = $photo;
            }

            $votes = count($photosIds) > 0 ? vote::loadByPhotoIds($photosIds) : [];
            if(isset($votes[0]) && $votes[0] === "Erreur lors de la récupération de l'objet vote") {
                $votes = [];
            }
            foreach ($votes as $key => $vote) {
                $votesByPhotos[$vote->getIdPhoto()][] = $vote;
            }

            $test = [];
            foreach($photos as $key => $photo) {
                $finded = false; 
                foreach ($votesByPhotos as $keyVote => $vote) {
                    if($photo->getId() === $keyVote) {
                        $test[$key] = $vote;
                        $finded = true;
                        break;
                    }
                }
                if($finded === false) {
                    $test[$key] = [];
                }
            }

            $notes = [];
            $criteres = critere::load();
            foreach ($test as $key => $votesByPhoto) {
                $notes[$key] = [];
                foreach ($criteres as $critere) {
                    $notes[$key][$critere->getNomCritere()] = 0;
                }
            }

            foreach ($test as $key => $votesByPhoto) {
                if(count($votesByPhoto) === 0) {
                    foreach ($criteres as $critere) {
                        $notes[$key][$critere->getNomCritere()] = 'aucun vote';
                    }
                } else {
                    foreach ($votesByPhoto as $keyVote => $vote) {
                        foreach ($criteres as $critere) {
                            if($critere->getId() === $vote->getIdCritere()) {
                                $notes[$key][$critere->getNomCritere()] += $vote->getValeur();
                            }
                        }
                    }
                    foreach ($criteres as $critere) {
                        $notes[$key][$critere->getNomCritere()] /= count($votesByPhoto) / 3;
                        $notes[$key][$critere->getNomCritere()] = round($notes[$key][$critere->getNomCritere()]);
                    }
                }                    
            }

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
                if(isset($inscrits[0]) && $inscrits[0] === "Erreur lors de la récupération de l'objet participant") {
                    $inscrits = [];
                }
                $photos = photo::loadByCampagneId($campagne->getId());
                
                $participantsIds = [];
                if($photos[0] === 'Erreur lors de la récupération des photos de la campagne') {
                    $photos = [];
                } 
                foreach ($photos as $key => $photo) {
                    $participantsIds []= $photo->getIdParticipant();
                    $photosByParticipants[$key] = $photo;
                }
                $participants = [];
                $participants = count($participantsIds) > 0 ? participant::loadByIds($participantsIds) : [];

                $photosIds = [];
                $photosByParticipants = [];
                foreach ($photos as $key => $photo) {
                    $photosIds []= $photo->getId();
                    $photosByParticipants[$key] = $photo;
                }

                $votes = count($photosIds) > 0 ? vote::loadByPhotoIds($photosIds) : [];
                if(isset($votes[0]) && $votes[0] === "Erreur lors de la récupération de l'objet vote") {
                    $votes = [];
                }
                $votesByPhotos = [];
                foreach ($votes as $key => $vote) {
                    $votesByPhotos[$vote->getIdPhoto()][] = $vote;
                }

                $test = [];
                foreach($photos as $key => $photo) {
                    $finded = false; 
                    foreach ($votesByPhotos as $keyVote => $vote) {
                        if($photo->getId() === $keyVote) {
                            $test[$key] = $vote;
                            $finded = true;
                            break;
                        }
                    }
                    if($finded === false) {
                        $test[$key] = [];
                    }
                }

                $notes = [];
                $criteres = critere::load();
                foreach ($test as $key => $votesByPhoto) {
                    $notes[$key] = [];
                    foreach ($criteres as $critere) {
                        $notes[$key][$critere->getNomCritere()] = 0;
                    }
                }

                foreach ($test as $key => $votesByPhoto) {
                    if(count($votesByPhoto) === 0) {
                        foreach ($criteres as $critere) {
                            $notes[$key][$critere->getNomCritere()] = 'aucun vote';
                        }
                    } else {
                        foreach ($votesByPhoto as $keyVote => $vote) {
                            foreach ($criteres as $critere) {
                                if($critere->getId() === $vote->getIdCritere()) {
                                    $notes[$key][$critere->getNomCritere()] += $vote->getValeur();
                                }
                            }
                        }
                        foreach ($criteres as $critere) {
                            $notes[$key][$critere->getNomCritere()] /= count($votesByPhoto) / 3;
                            $notes[$key][$critere->getNomCritere()] = round($notes[$key][$critere->getNomCritere()]);
                        }
                    }                    
                }

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
            header('Location: ' . BASE_URL . 'admin/campagnes/edit/' . urlencode($args['nom_campagne']) . '?errors=' . implode($errorsMessages) );
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
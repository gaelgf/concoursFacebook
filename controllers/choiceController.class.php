<?php


class choiceController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {
            header("Location: ".BASE_URL);
        } else {
            $view->setView("indexChoice");
            $view->assign("base_url", BASE_URL);
            $view->assign("facebook_choice_url", BASE_URL.'choice/facebook');
            $view->assign("download_choice_url", BASE_URL.'choice/download');
            $view->assign("vote_url", BASE_URL.'vote');
        }
    }




    public function downloadAction(){
        $view = new view();
        $view->setView("downloadChoice");
    }

    public function facebookAction(){
        $view = new view();

        $fb = facebook::getVarFb();

        $donneesAlbum = self::userAlbums( $fb );


        $view->setView("facebookChoice");
        $view->assign("base_url", BASE_URL);
        $view->assign("user_albums", $donneesAlbum[0]);
        $view->assign("photos_album", $donneesAlbum[1]);
    }


    public static function userAlbums( $fb ){


        $arrAlbums = [];
        $arrPhotos = [];

        $response = $fb->get('/me?fields=albums', $_SESSION['facebook_access_token']);

        $graphNode = $response->getGraphNode();
        $albums = $graphNode->getField("albums");
        foreach ($albums as $album) {
            $albumId = $album->getField("id");
            $arrAlbums [$albumId]["name"] = $album->getField("name");

            $response = $fb->get("/$albumId?fields=photos", $_SESSION['facebook_access_token']);
            /*
            $photos = $response->getDecodedBody()["photos"]["data"];

            foreach ($photos as $photo) {
                $photoId = $photo["id"];
                $response = $fb->get("/$photoId?fields=picture", $_SESSION['facebook_access_token']);

                $urlPhoto = $response->getDecodedBody()["picture"];
                $idPhoto = $response->getDecodedBody()["id"];

                $photo = ["url" => $urlPhoto, "id" => $idPhoto];

                $arrPhotos[$albumId][] = $photo;
            }
            */
        }

        return [$arrAlbums,$arrPhotos];
    }
}
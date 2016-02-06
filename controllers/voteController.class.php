<?php


class voteController{
    public function indexAction( $args )
    {
        $view = new view();

        if (!isset($_SESSION['facebook_access_token'])) {
            header("Location: ".BASE_URL);
        } else {
            $view->setView("indexVote");
            $view->assign("base_url", BASE_URL);
        }
    }
}
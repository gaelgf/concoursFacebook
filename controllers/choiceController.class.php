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
        $view->setView("facebookChoice");
        $view->assign("var_fb", facebook::getVarFb());
        $view->assign("base_url", BASE_URL);
    }
}
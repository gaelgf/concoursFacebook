<?php



session_start();

require_once "fb_sdk/src/Facebook/autoload.php";

$fb = new Facebook\Facebook([
        'app_id' => '1545660598783922',
        'app_secret' => 'ca702576b5815fbccba65343c8003198',
        'default_graph_version' => 'v2.5',
]);


$helper = $fb->getRedirectLoginHelper();


try {
    $accessToken = $helper->getAccessToken();
}
catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
}
catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}





if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']

    echo <<<HTML
    <script>
        document.location.href="https://fierce-refuge-2356.herokuapp.com/choix_type_photo";
    </script>
HTML;

}
else{
    echo <<<HTML
    <script>
        document.location.href="https://fierce-refuge-2356.herokuapp.com/";
    </script>
HTML;
}


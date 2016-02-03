<?php

session_start();

require_once "fb_sdk/src/Facebook/autoload.php";

$fb = new Facebook\Facebook([
        'app_id' => '1545660598783922',
        'app_secret' => 'ca702576b5815fbccba65343c8003198',
        'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Titre</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/selection_album.js"></script>
</head>

<body>
<header>
    <img src="img/campagnes/1/logo.png" alt="">
    - Concours photos
</header>
<div class="select_picture">
    <div class="container_select">

        $response = $fb->get('/me?fields=albums', $_SESSION['facebook_access_token']);

        $graphNode = $response->getGraphNode();
        $albums = $graphNode->getField("albums");
        $i=0;
        foreach ($albums as $album) {
        $photos = "";


        $i++;
        echo "<h2>Album $i</h2>";
        $albumId = $album->getField("id");
        $response = $fb->get("/$albumId?fields=photos", $_SESSION['facebook_access_token']);
        $photos = $response->getDecodedBody()["photos"]["data"];

        foreach ($photos as $photo) {
        $photoId = $photo["id"];
        $response = $fb->get("/$photoId?fields=picture", $_SESSION['facebook_access_token']);
        $source = $response->getDecodedBody()["picture"];
        echo "<img src='$source'>";
        }
        }
    </div>
</div>
</body>
</html>
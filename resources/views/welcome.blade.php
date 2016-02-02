<?php

session_start();

require_once "fb_sdk/src/Facebook/autoload.php";

$fb = new Facebook\Facebook([
        'app_id' => '1545660598783922',
        'app_secret' => 'ca702576b5815fbccba65343c8003198',
        'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
$loginUrl = $helper->getLoginUrl('https://fierce-refuge-2356.herokuapp.com/validation_connexion', $permissions);

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
        <div class="container_pictures">
            <ul class="album album_1">
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
            </ul>
        </div>
        <?php

        if( !isset($_SESSION['facebook_access_token'])){
            echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
        }
        else{
            echo "Vous etes connecte<br/>";
        }

        ?>
    </div>
</div>
</body>
</html>
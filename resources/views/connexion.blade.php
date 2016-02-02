<?php

session_start();

require_once "sdk_fb/src/Facebook/autoload.php";

$fb = new Facebook\Facebook([
        'app_id' => '916120625137591',
        'app_secret' => '07e327936f04164ae38405974b923578',
        'default_graph_version' => 'v2.5',
]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes','publish_actions','user_photos']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/facebook_formulaire_photo/validation/', $permissions);

?>
        <!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>Application facebook</title>
    <meta name="description" content="mon application facebook"/>
    <meta charset="UTF-8">
    <style>
        body{
            font-family: Arial;
            margin-top:0%;
            margin-bottom:0%;
            margin-left:0%;
            margin-right:0%;
            text-align: center;
        }
        .formulaire{
            width:500px;
            margin:auto;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
    <h1>Application Facebook</h1>
    <nav></nav>

</header>

<section class="formulaire">

    <?php

    if( !isset($_SESSION['facebook_access_token'])){
        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    }
    else{
        echo "Vous etes connecte<br/>";

        $response = $fb->get('/me?fields=albums{can_upload,name,id}', $_SESSION['facebook_access_token']);

        $graphNode = $response->getGraphNode();
        $albums = $graphNode->getField("albums");
        $i=0;

        $liste ="";

        foreach ($albums as $album) {
            $photos = "";


            $i++;
            $title = $album->getField("name");
            $id_album = $album->getField("id");
            $can_publish = $album->getField("can_upload");

            if( $can_publish ){
                $liste .='<option value="'.$id_album.'">'.$title.'</option>';
            }
        }

        echo <<<HTML
		<form enctype='multipart/form-data' method="post" action="upload.php">
			<input type="file" name="image">
			<br/>
			<br/>
			<select name="id_album">
				<option selected>Selectionner un album</option>
				{$liste}
			</select>
			<input type="submit"/>
		</form>
HTML;
    }

    ?>
</section>

<aside>
</aside>

<footer>
</footer>
</body>
</html>
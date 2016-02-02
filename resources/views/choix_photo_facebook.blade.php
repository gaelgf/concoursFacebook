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
        <select class="album_list">
            <?php
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
           <?php echo $liste; ?>
        </select>
        <img src="img/icones/arrow_select.png" class="arrow" alt="">
    </div>
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
        <ul class="album album_2">
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
        <ul class="album album_3">
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
</div>
</body>
</html>
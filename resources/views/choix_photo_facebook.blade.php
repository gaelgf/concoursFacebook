@extends("templates/layout.blade.php");

@section("content")
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
           ?>
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

@endsection
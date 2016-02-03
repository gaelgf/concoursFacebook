<?php
@extends('templates.facebook_connect')

@section('content')
    <form enctype='multipart/form-data' method="post" action="upload.php">
        <div class="select_picture">
            <div class="container_select">
                <select class="album_list">
                    <?php
                        /*
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
                    <?php echo $liste; */?>
                </select>
                <img src="img/icones/arrow_select.png" class="arrow" alt="">
            </div>
        </div>
        <input type="file" name="image">
        <input class="boutons" type="submit"/>
    </form>
@endsection
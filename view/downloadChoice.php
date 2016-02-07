
<form enctype='multipart/form-data' method="post" action="upload.php">
    <div class="select_picture">
        <div class="container_select">
            <div class="container_select">
                <select class="album_list">
                    <?php foreach( $user_albums as $album): ?>
                        <option><?php echo $album["name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <img src="img/icones/arrow_select.png" class="arrow" alt="">
            </div>
            <img src="img/icones/arrow_select.png" class="arrow" alt="">
        </div>
    </div>
    <input type="file" name="image">
    <input class="boutons" type="submit"/>
</form>

<div class="select_picture">
    <div class="container_select">
        <select class="album_list">
            <?php foreach( $user_albums as $album): ?>
                <option><?php echo $album["name"] ?></option>
            <?php endforeach; ?>
        </select>
        <img src="img/icones/arrow_select.png" class="arrow" alt="">
    </div>
    <div class="container_pictures">
        <!--
        <?php foreach( $user_albums as $album): ?>
        <ul class="album album_1">
            <?php foreach( $photos_album as $photo): ?>
                <?php print_r($photo); ?>
                <?php break; ?>
                <li>
                    <img src="<?php echo $photo["url"]; ?>"></li>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php endforeach; ?>
        -->
    </div>
</div>
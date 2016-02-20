<script>
    var baseUrl = "<?php echo $base_url; ?>";
</script>
<div class="select_picture">
    <div class="container_select">
        <select class="album_list">
            <option class="list_option" value="-1">Liste des albums...</option>
            <?php foreach( $user_albums as $idAlbum => $album): ?>
                <?php $selected = ( $id_album == $idAlbum ? 'selected="selected"' : "" ); ?>
                <option class="list_option" <?php echo $selected; ?> value="<?php echo $idAlbum; ?>"><?php echo $album["name"] ?></option>
            <?php endforeach; ?>
        </select>
        <img src="<?php echo $base_url; ?>assets/img/icones/arrow_select.png" class="arrow" alt="">
    </div>
    <div class="container_pictures">
        <?php if($array_photos != "null"): ?>
            <form class="valid_choix_facebook" onsubmit="return isPhotoChoisie();" action="<?php echo $base_url; ?>participant/recap" method="POST">
                <input type="hidden" class="url_photo" name="url_photo">
                <input type="hidden" class="id_album_facebook" name="id_album_facebook" value="<?php echo $id_album; ?>">
                <input type="hidden" class="id_photo_facebook" name="id_photo_facebook">
                <input type="hidden" class="id_participant" name="id_participant" value="1">
                <input type="hidden" class="id_campagne" name="id_campagne" value="<?php echo $id_campagne; ?>">
                <input type="submit" class="boutons" value="Valider">
            </form>
            <ul class="album">
            <?php foreach( $array_photos as $photo): ?>
                <li>
                    <img class="photo_choix_fb" data-id="<?php echo $photo["id"]; ?>" src="<?php echo $photo["url"]; ?>"></li>
                </li>
            <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <div class="message_album">
                Selectionner un album pour afficher ses photos
            </div>
        <?php endif; ?>
    </div>
</div>
<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["logo_entreprise"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".album_list").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".list_option").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".nom_campagne").text("<?php echo $array_campagne["nom_campagne"]; ?>");
</script>
<script type="text/javascript" src="<?php echo $base_url; ?>assets/js/photosfacebook.js"></script>



<!--


   -->

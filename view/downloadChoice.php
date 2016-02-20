
<form enctype='multipart/form-data' method="post" action="<?php echo $base_url; ?>choice/upload">
    <div class="select_picture">
        <div class="container_select">
            <div class="container_select">
                <select name="id_album" class="album_list">
                    <?php foreach( $user_albums as $idAlbum => $album): ?>
                        <option class="list_option" value="<?php echo $idAlbum; ?>"><?php echo $album["name"] ?></option>
                    <?php endforeach; ?>
                </select>
                <img src="img/icones/arrow_select.png" class="arrow" alt="">
            </div>
            <img src="<?php echo $base_url; ?>assets/img/icones/arrow_select.png" class="arrow" alt="">
        </div>
    </div>
    <input type="hidden" class="id_participant" name="id_participant" value="<?php echo $id_participant; ?>">
    <input type="hidden" class="id_campagne" name="id_campagne" value="<?php echo $id_campagne; ?>">
    <div class="form_upload">
        <input type="file" name="image">
        <input class="boutons" type="submit"/>
    </div>
</form>
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

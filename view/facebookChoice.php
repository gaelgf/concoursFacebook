
<div class="select_picture">
    <div class="container_select">
        <select class="album_list">
            <?php foreach( $user_albums as $album): ?>
                <option class="list_option"><?php echo $album["name"] ?></option>
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

<?php
 $date_fin = explode("-",$array_campagne["date_fin"]);
 $arr_mois = ["","janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre"];
?>



<form class="container recapitulatif_participation" action="<?php echo $base_url;  ?>photo/add" method="POST">

    <div class="col-xs-6 container_img">
        <img src="<?php echo $posts["url_photo"]; ?>" alt="">
    </div>
    <div class="col-xs-6 texte">
        Le concours prendra fin le
        <br>
        <span class="date">
            <?php echo intval($date_fin[2])." ".$arr_mois[intval($date_fin[1])]." ".$date_fin[0] ?>
        </span>
        <br/>
        <input type="hidden" value="<?php echo $posts["url_photo"]; ?>" name="url_photo">
        <input type="hidden" value="<?php echo $posts["id_album_facebook"]; ?>" name="id_album_facebook">
        <input type="hidden" value="<?php echo $posts["id_photo_facebook"]; ?>" name="id_photo_facebook">
        <input type="hidden" value="<?php echo $posts["id_participant"]; ?>" name="id_participant">
        <input type="hidden" value="<?php echo $posts["id_campagne"]; ?>" name="id_campagne">
        <input type="submit" class="boutons" value="Je valide ma participation" />
    </div>
</form>








<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["logo_entreprise"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
</script>

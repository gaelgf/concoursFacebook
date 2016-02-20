<?php
$date_fin = explode("-",$array_campagne["date_fin"]);
$arr_mois = ["","janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre"];
?>
<div class="validation_photo">
    <div class="col-xs-6 left">
        <div class="remerciement">
            Bravo !
            <br>
            Vous participez maintenant au concours photo
            <br>
            <span class="nom_concours">
                <?php echo $array_campagne["nom_campagne"]; ?>
            </span>
        </div>
        <div class="date_fin">
            Ce concours prendra fin le
            <br>
            <span>
                <?php echo intval($date_fin[2])." ".$arr_mois[intval($date_fin[1])]." ".$date_fin[0] ?>
            </span>
        </div>
        <div class="redirect">
            <a class="boutons" href="<?php echo $base_url."vote"; ?>">
                Voter dès maintenant !
            </a>
        </div>
    </div>
    <div class="col-xs-6 right">
        <div class="titre_a_gagner">
            à gagner :
        </div>
        <div class="img_lot">
            <img src="<?php echo $array_campagne["image_lot"]; ?>" alt="Lot jeu concours">
        </div>
    </div>
</div>




<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["logo_entreprise"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".nom_concours").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".album_list").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".list_option").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".nom_campagne").text("<?php echo $array_campagne["nom_campagne"]; ?>");
</script>
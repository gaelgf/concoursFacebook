<div class="accueil container">
    <div class="row">
        <div class="col-xs-9 lot">
            <div class="nom_lot">
                A gagner :<br><?php echo $array_campagne["nom_lot"]; ?>
            </div>
            <img class="photo_lot" src="<?php echo $array_campagne["image_lot"]; ?>" alt="">
            <br/>
            <a  class="boutons bouton_connexion" target="_top" href="<?php echo $login_url; ?>">Je participe !</a>
        </div>
        <div class="col-xs-3 container_pictures">
            <img class="photo" src="<?php echo $array_campagne["photo_accueil_one"]; ?>">
            <br/>
            <img class="photo" src="<?php echo $array_campagne["photo_accueil_two"]; ?>">
            <br/>
            <img class="photo" src="<?php echo $array_campagne["photo_accueil_three"]; ?>">
        </div>
    </div>
</div>
<?php
//print_r($array_campagne);
?>
<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["logo_entreprise"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
</script>

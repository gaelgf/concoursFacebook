
Classement
<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["logo_entreprise"]; ?>");
    $(".icone_principale").attr("src","<?php echo $array_campagne["icone_principale"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".note_moyenne").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".nom_campagne").text("<?php echo $array_campagne["nom_campagne"]; ?>");
    $(".text_accueil").text("<?php echo $array_campagne["text_accueil"]; ?>");
    $(".icone_coeur_moyenne").attr("src","<?php echo $array_campagne["icone_coeur"]; ?>");
    $(".critere_heart").css("background-image","<?php echo $array_campagne["icone_coeur"]; ?>");
</script>

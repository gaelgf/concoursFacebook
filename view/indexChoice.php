<div class="accueil">
    <div class="title container">
        <div class="col-xs-5 text_accueil" style="text-align:right">
            Montres nous ton <br/>meilleur souvenir Coca-Cola !
        </div>
        <div class="col-xs-2 icone">
            <img class="icone_principale" src="<?php echo $base_url; ?>assets/img/campagnes/1/icone.png" alt="">
        </div>
        <div class="col-xs-5" style="text-align:left">
            PARTICIPER?<br/> Rien de plus simple
        </div>
    </div>
    <div class="actions_bottom container">
        <div class="row">
            <div class="col-xs-1"></div>
            <a class="col-xs-4 boutons choisir_photo" href="<?php echo $facebook_choice_url; ?>">
                Choisir une photo
            </a>
            <div class="col-xs-2"></div>
            <a class="col-xs-4 boutons telecharger_photo" href="<?php echo $download_choice_url; ?>">
                Télécharger votre photo
            </a>
            <div class="col-xs-1"></div>
        </div>
    </div>
    <div class="container_vote">
        <a class="col-xs-12 boutons" href="<?php echo $vote_url; ?>">
            Voter
        </a>
    </div>
</div>
<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["logo_entreprise"]; ?>");
    $(".icone_principale").attr("src","<?php echo $array_campagne["icone_principale"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".nom_campagne").text("<?php echo $array_campagne["nom_campagne"]; ?>");
    $(".text_accueil").text("<?php echo $array_campagne["text_accueil"]; ?>");
</script>

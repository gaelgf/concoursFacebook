<div class="vote">
    <div class="row">
        <div class="col-xs-5">
            <div class="col-xs-4 icone">
                <img class="icone_principale" src="<?php echo $base_url; ?>assets/img/campagnes/1/icone.png" alt="">
            </div>
            <div class="col-xs-8 photo">
                <img src="<?php echo $photo->getUrlPhoto(); ?>" alt="">
            </div>
            <!--
            <div class="averange">
                <img src="<?php echo $base_url; ?>assets/img/icones/fleche_ave.png" class="fleche" alt="">
                <div class="white note_moyenne">
                    <img class="icone_coeur_moyenne" src="<?php echo $base_url; ?>assets/img/campagnes/1/coeur_on.png" class="heart" alt="">
                    3 / 5
                </div>
            </div>
            -->
        </div>
        <form class="col-xs-6 col-xs-offset-1" action="<?php echo $base_url; ?>vote/voteparticipant" method="POST">
            <input type="hidden" name="id_photo" value="<?php echo $photo->getId(); ?>">
            <input type="hidden" name="id_participant" value="<?php echo $participant; ?>">
            <div class="col-xs-11 col-xs-offset-1 criteres">
                <?php foreach($criteres as $critere): ?>
                <div class="title"><?php echo $critere->getNomCritere(); ?></div>
                <div class="note">
                    <input type="hidden" class="input_critere_<?php echo $critere->getId(); ?>" name="critere_<?php echo $critere->getId(); ?>" value="1">
                    <ul>
                        <li class="critere_heart critere_<?php echo $critere->getId(); ?> active" data-critere="<?php echo $critere->getId(); ?>" data-number="1"></li>
                        <li class="critere_heart critere_<?php echo $critere->getId(); ?>" data-critere="<?php echo $critere->getId(); ?>" data-number="2"></li>
                        <li class="critere_heart critere_<?php echo $critere->getId(); ?>" data-critere="<?php echo $critere->getId(); ?>" data-number="3"></li>
                        <li class="critere_heart critere_<?php echo $critere->getId(); ?>" data-critere="<?php echo $critere->getId(); ?>" data-number="4"></li>
                        <li class="critere_heart critere_<?php echo $critere->getId(); ?>" data-critere="<?php echo $critere->getId(); ?>" data-number="5"></li>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-xs-12 next_vote_container">
                <input type="submit" class="boutons" value="Valider" />
            </div>
        </form>
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
    $(".note_moyenne").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".nom_campagne").text("<?php echo $array_campagne["nom_campagne"]; ?>");
    $(".text_accueil").text("<?php echo $array_campagne["text_accueil"]; ?>");
    $(".icone_coeur_moyenne").attr("src","<?php echo $array_campagne["icone_coeur"]; ?>");
    $(".critere_heart").css("background-image","<?php echo $array_campagne["icone_coeur"]; ?>");
</script>

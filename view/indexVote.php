
<div class="vote">
    <div class="row">
        <div class="col-xs-2 icone">
            <img class="icone_principale" src="<?php echo $base_url; ?>assets/img/campagnes/1/icone.png" alt="">
        </div>
        <div class="col-xs-3 photo">
            <img src="<?php echo $base_url; ?>assets/img/campagnes/1/photos/1.jpg" alt="">
        </div>
        <div class="col-xs-6 col-xs-offset-1 criteres">
            <div class="title">Critere 1</div>
            <div class="note">
                <ul>
                    <li class="critere_heart critere_1" data-critere="1" data-number="1"></li>
                    <li class="critere_heart critere_1" data-critere="1" data-number="2"></li>
                    <li class="critere_heart critere_1" data-critere="1" data-number="3"></li>
                    <li class="critere_heart critere_1" data-critere="1" data-number="4"></li>
                    <li class="critere_heart critere_1" data-critere="1" data-number="5"></li>
                </ul>
            </div>
            <div class="title">Critere 2</div>
            <div class="note">
                <ul>
                    <li class="critere_heart critere_2" data-critere="2" data-number="1"></li>
                    <li class="critere_heart critere_2" data-critere="2" data-number="2"></li>
                    <li class="critere_heart critere_2" data-critere="2" data-number="3"></li>
                    <li class="critere_heart critere_2" data-critere="2" data-number="4"></li>
                    <li class="critere_heart critere_2" data-critere="2" data-number="5"></li>
                </ul>
            </div>
            <div class="title">Critere 3</div>
            <div class="note">
                <ul>
                    <li class="critere_heart critere_3" data-critere="3" data-number="1"></li>
                    <li class="critere_heart critere_3" data-critere="3" data-number="2"></li>
                    <li class="critere_heart critere_3" data-critere="3" data-number="3"></li>
                    <li class="critere_heart critere_3" data-critere="3" data-number="4"></li>
                    <li class="critere_heart critere_3" data-critere="3" data-number="5"></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 col-xs-offset-2 averange">
            <img src="<?php echo $base_url; ?>assets/img/icones/fleche_ave.png" class="fleche" alt="">
            <div class="white">
                <img src="<?php echo $base_url; ?>assets/img/campagnes/1/coeur_on.png" class="heart" alt="">
                3 / 5
            </div>
        </div>
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
    $(".critere_heart").css("background-image","<?php echo $array_campagne["icone_coeur"]; ?>");
</script>

<div class="classement">
    <div class="col-xs-6 left">
        <table>
            <tr>
                <td colspan="2" class="head">
                    CLASSEMENT
                </td>
            </tr>
            <?php $nb = 0;?>
            <?php foreach($statsparticipants as $stats):?>
                <tr class="line <?php echo $nb%2==1 ? "silver" : ""; ?>">
                    <td>
                        <img width="50" src="<?php echo $stats["url_photo"];?>" alt="">
                    </td>
                    <td>
                        <?php echo round($stats["moyenne"],2);?>/5
                    </td>
                </tr>
                <?php $nb++;?>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="col-xs-6 right">
        <?php if($photo !=""): ?>
        <div class="photo">
            <img src="<?php echo $photo ?>" alt="">
            <div class="label_moyenne">
                Votre moyenne :
            </div>
            <div class="">
                <?php echo round($moyenne,2); ?>/5
            </div>
            <?php foreach($criteres as $critere): ?>
                 <div class="label_critere">
                     <?php echo $critere->getNomCritere(); ?>
                 </div>
                <div class="valeur_critere">
                    <?php echo round($moyennes[$critere->getId()],2); ?>/5
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <a class="boutons" href="<?php echo $base_url; ?>choice">
                Je participe !
            </a>

        <?php endif; ?>
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
    $(".icone_coeur_moyenne").attr("src","<?php echo $array_campagne["icone_coeur"]; ?>");
    $(".critere_heart").css("background-image","<?php echo $array_campagne["icone_coeur"]; ?>");
    $(".head").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
    $(".label_critere").css("color","<?php echo $array_campagne["couleur"]; ?>");
</script>

<div class="select_picture">
    <div class="container_select">
        <div class="container_pictures">
            <ul class="album">
                <li>
                    <img src="assets/img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="assets/img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="assets/img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="assets/img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="assets/img/photo_exemple.jpg"></li>
                </li>
            </ul>
        </div>
        <br/>
        <a  class="boutons bouton_connexion" href="<?php echo $login_url; ?>">Je participe !</a>
    </div>
</div>
<script>
    $(".main_logo").attr("src","<?php echo $array_campagne["url_icone"]; ?>");
    $(".header").css("border-bottom","3px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("border-top","1px solid <?php echo $array_campagne["couleur"]; ?>");
    $(".header").css("color","<?php echo $array_campagne["couleur"]; ?>");
    $(".boutons").css("background-color","<?php echo $array_campagne["couleur"]; ?>");
</script>

<h1 style="margin-top:70px;">Admin Concours Photos</h1>
<div class="adminLoginContainer">
	<?php if( isset($login_url)) { ?>
	<a class="boutons bouton_connexion" href="<?php echo $login_url; ?>">Se connecter</a>
	<?php } ?>
	<?php if( isset($notAdmin)) { 
		echo '<h1>' . $notAdmin . '</h1>';
	} ?>
</div>
<h1>Concours <?php echo $campagne->getNomCampagne(); ?></h1>

<?php
	if(isset($successMessages)) {
		foreach ($successMessages as $successMessage) {
			echo "<div class=\"alert alert-success\" role=\"alert\"><i class=\"fa fa-check\"></i> " . $successMessage . "</div>";
		}
	}

    if(isset($errorsMessages)) {
        foreach ($errorsMessages as $errorsMessage) {
            echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fa fa-times\"></i>  " . $errorsMessage . "</div>";
        }
    }
?>

<div id="showCampagne">

	<div class="row">
		<div class="pull-right">
    		<a class="btn btn-primary" href=<?php echo BASE_URL . 'admin/campagnes/edit/' . urlencode ($campagne->getNomCampagne()); ?> role="button"><i class="fa fa-pencil-square-o"></i> Editer</a>
			<a class="btn btn-danger" href=<?php echo BASE_URL . 'admin/campagnes/delete/' . urlencode ($campagne->getNomCampagne()); ?>><i class="fa fa-trash"></i> Supprimer</a>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Active</label>
			    <div class="col-sm-8">
			        <?php echo $campagne->getIsActive() ? '<i class="fa fa-check fa-3x" style="color:#3C765A"></i>' : '<i class="fa fa-times fa-3x" style="color:#A94442"></i>'; ?>
			    </div>                    
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Nom de la campagne</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getNomCampagne()); ?>
			    </div>                    
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Logo de l'entreprise</label>
			    <div class="col-sm-8">
			        <img src="<?php echo html_entity_decode($campagne->getLogoentreprise()); ?>" width="200px">
			    </div>                    
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Date de début de la campagne</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getDateDebut()); ?>
			    </div>                    
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Date de fin de la campagne</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getDateFin()); ?>
			    </div>                    
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Texte d'accueil</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getTextAccueil()); ?>
			    </div>                    
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Texte de félicitations</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getTextFelicitations()); ?>
			    </div>                    
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Nom du lot</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getNomLot()); ?>
			    </div>                    
			</div>
		</div>
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Description du lot</label>
			    <div class="col-sm-8">
			        <?php echo html_entity_decode($campagne->getDescriptionLot()); ?>
			    </div>                    
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<div class="row">
			    <label class="col-sm-4">Couleur de la campagne</label>
			    <div class="col-sm-8">
			        <input type="color" value="<?php echo html_entity_decode($campagne->getCouleur()); ?>" disabled >
			    </div>                    
			</div>
		</div>
	</div>

	<div class="container_pictures">
        <ul>
            <li></li>
            <li>
            	<h2>Image du lot</h2>
                <img src="<?php echo html_entity_decode($campagne->getImageLot()); ?>">
            </li>
            <li></li>
        </ul>
    </div>

	<div class="container_pictures">
        <ul>
            <li>
            	<h2>Photo accueil n°1</h2>
                <img src="<?php echo html_entity_decode($campagne->getPhotoAccueilOne()); ?>">
            </li>
            <li>
            	<h2>Photo accueil n°2</h2>
                <img src="<?php echo html_entity_decode($campagne->getPhotoAccueilTwo()); ?>">
            </li>
            <li>
            	<h2>Photo accueil n°3</h2>
                <img src="<?php echo html_entity_decode($campagne->getPhotoAccueilThree()); ?>">
            </li>
        </ul>
    </div>

    <div class="row" style="margin-top:20px">
		<div class="pull-right">
    		<a class="btn btn-primary" href=<?php echo BASE_URL . 'admin/campagnes/edit/' . urlencode ($campagne->getNomCampagne()); ?> role="button"><i class="fa fa-pencil-square-o"></i> Editer</a>
			<a class="btn btn-danger" href=<?php echo BASE_URL . 'admin/campagnes/delete/' . urlencode ($campagne->getNomCampagne()); ?>><i class="fa fa-trash"></i> Supprimer</a>
		</div>
	</div>		

</div>

<div class="table-responsive" style="display:none;">
	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>logo_entreprise</th>
				<th>nom_campagne</th>
				<th>date_debut</th>
				<th>date_fin</th>
				<th>couleur</th>
				<th>text_accueil</th>
				<th>text_felicitations</th>
				<th>is_active</th>
				<th>nom_lot</th>
				<th>description_lot</th>
				<th>image_lot</th>
				<th>photo_accueil_one</th>
				<th>photo_accueil_two</th>
				<th>photo_accueil_three</th>
				<th>icone_principale</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td><?php echo html_entity_decode($campagne->getId()); ?></td>
					<td>
						<img src="<?php echo html_entity_decode($campagne->getLogoentreprise()); ?>" width="200px">
					</td>
					<td><?php echo html_entity_decode($campagne->getNomCampagne()); ?></td>
					<td><?php echo html_entity_decode($campagne->getDateDebut()); ?></td>
					<td><?php echo html_entity_decode($campagne->getDateFin()); ?></td>
					<td><?php echo html_entity_decode($campagne->getCouleur()); ?></td>
					<td><?php echo html_entity_decode($campagne->getTextAccueil()); ?></td>
					<td><?php echo html_entity_decode($campagne->getTextFelicitations()); ?></td>
					<td><?php echo html_entity_decode($campagne->getIsActive()); ?></td>
					<td><?php echo html_entity_decode($campagne->getNomLot()); ?></td>
					<td><?php echo html_entity_decode($campagne->getDescriptionLot()); ?></td>
					<td><?php echo html_entity_decode($campagne->getImageLot()); ?></td>
					<td><?php echo html_entity_decode($campagne->getPhotoAccueilOne()); ?></td>
					<td><?php echo html_entity_decode($campagne->getPhotoAccueilTwo()); ?></td>
					<td><?php echo html_entity_decode($campagne->getPhotoAccueilThree()); ?></td>
					<td><?php echo html_entity_decode($campagne->getIconePrincipale()); ?></td>
				</tr>
		</tbody>
	</table>
</div>

<h2><?php echo count($participants) ?> Paricipants :</h2>

<?php
	$i=0;
	foreach ($participants as $participant) {
		$i++;
		if($i%3===1) {
			echo '<div class="row">';
		}
				echo '<div class="col-sm-4">';
					echo '<h3><strong>Nom :</strong> ' . $participant->getNom() . '</h3>';
					echo '<h4><strong>Prenom :</strong> ' . $participant->getPrenom() . '</h4>';
					echo '<h5><strong>Date de naissance :</strong> ' . $participant->getDateNaissance() . '</h5>';
					echo '<h5><strong>Validation :</strong> ' . $participant->getValidation() . '</h5>';
				echo '</div>';
		if($i%3===0) {
			echo '</div>';
		}
	}
?>


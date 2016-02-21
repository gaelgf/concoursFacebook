<h1>Vos concours</h1>

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

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Actions</th>

				<th>id</th>
				<th>nom_campagne</th>
				<th>logo_entreprise</th>
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
			<?php 
				foreach ($campagnes as $campagne) {
			?>
				<tr>
					<td>
						<a class="btn btn-sm btn-primary" style="display:block; margin-bottom:5px" href=<?php echo BASE_URL . 'admin/campagnes/show/' . urlencode ($campagne->getNomCampagne()); ?> role="button"><i class="fa fa-eye"></i> Voir</a>
						<a class="btn btn-sm btn-primary" style="display:block; margin-bottom:5px" href=<?php echo BASE_URL . 'admin/campagnes/edit/' . urlencode ($campagne->getNomCampagne()); ?> role="button"><i class="fa fa-pencil-square-o"></i> 	Editer</a>
						<a class="btn btn-sm btn-danger" style="display:block; margin-bottom:5px" href=<?php echo BASE_URL . 'admin/campagnes/delete/' . urlencode ($campagne->getNomCampagne()); ?>><i class="fa fa-trash"></i> 	Supprimer</a>
					</td>
					<td><?php echo html_entity_decode($campagne->getId()); ?></td>
					<td><?php echo html_entity_decode($campagne->getNomCampagne()); ?></td>
					<td><?php echo html_entity_decode($campagne->getLogoentreprise()); ?></td>
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
			<?php
				}
			?>
		</tbody>
	</table>
</div>
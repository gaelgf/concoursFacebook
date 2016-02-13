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

<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>id</th>
				<th>logo_entreprise</th>
				<th>nom_campagne</th>
				<th>date_debut</th>
				<th>date_fin</th>
				<th>couleur</th>
				<th>url_icone</th>
				<th>text_accueil</th>
				<th>text_felicitations</th>
				<th>is_active</th>
				<th>nom_lot</th>
				<th>description_lot</th>
				<th>image_lot</th>

				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
				<tr>
					<td><?php echo html_entity_decode($campagne->getId()); ?></td>
					<td><?php echo html_entity_decode($campagne->getLogoentreprise()); ?></td>
					<td><?php echo html_entity_decode($campagne->getNomCampagne()); ?></td>
					<td><?php echo html_entity_decode($campagne->getDateDebut()); ?></td>
					<td><?php echo html_entity_decode($campagne->getDateFin()); ?></td>
					<td><?php echo html_entity_decode($campagne->getCouleur()); ?></td>
					<td><?php echo html_entity_decode($campagne->getUrlIcone()); ?></td>
					<td><?php echo html_entity_decode($campagne->getTextAccueil()); ?></td>
					<td><?php echo html_entity_decode($campagne->getTextFelicitations()); ?></td>
					<td><?php echo html_entity_decode($campagne->getIsActive()); ?></td>
					<td><?php echo html_entity_decode($campagne->getNomLot()); ?></td>
					<td><?php echo html_entity_decode($campagne->getDescriptionLot()); ?></td>
					<td><?php echo html_entity_decode($campagne->getImageLot()); ?></td>
					<td>
						<a class="btn btn-sm btn-primary" href=<?php echo BASE_URL . 'admin/campagnes/edit/' . $campagne->getNomCampagne(); ?> role="button"><i class="fa fa-pencil-square-o"></i> Editer</a>
						<a class="btn btn-sm btn-primary" href=<?php echo BASE_URL . 'admin/campagnes/delete/' . $campagne->getNomCampagne(); ?>><i class="fa fa-trash"></i> Supprimer</a>
					</td>
				</tr>
		</tbody>
	</table>
</div>
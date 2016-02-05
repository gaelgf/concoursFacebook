<?php
	if(isset($successMessages)) {
		foreach ($successMessages as $successMessage) {
			echo "<div class=\"alert alert-success\" role=\"alert\">" . $successMessage . "</div>";
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

				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				foreach ($campagnes as $campagne) {
			?>
				<tr>
					<td><?php echo $campagne->getId(); ?></td>
					<td><?php echo $campagne->getLogoentreprise(); ?></td>
					<td><?php echo $campagne->getNomCampagne(); ?></td>
					<td><?php echo $campagne->getDateDebut(); ?></td>
					<td><?php echo $campagne->getDateFin(); ?></td>
					<td><?php echo $campagne->getCouleur(); ?></td>
					<td><?php echo $campagne->getUrlIcone(); ?></td>
					<td><?php echo $campagne->getTextAccueil(); ?></td>
					<td><?php echo $campagne->getTextFelicitations(); ?></td>
					<td>
						<a class="btn btn-sm btn-primary" href="<?php BASE_URL . 'admin/' . $campagne->getId(); ?>" role="button"><i class="fa fa-eye"></i> Show</a>
						<a class="btn btn-sm btn-primary" href="#" role="button"><i class="fa fa-pencil-square-o"></i> 	Edit</a>
						<a class="btn btn-sm btn-primary" href="#" role="button"><i class="fa fa-trash"></i> 	Remove</a>
					</td>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>
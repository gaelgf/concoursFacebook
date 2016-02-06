<h1>Concours <?php echo $campagne->getNomCampagne(); ?></h1>

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
						<a class="btn btn-primary" href="#" role="button">Editer</a>
						<a class="btn btn-primary" href="#" role="button">Supprimer</a>
					</td>
				</tr>
		</tbody>
	</table>
</div>
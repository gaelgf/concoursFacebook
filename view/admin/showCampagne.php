<h1><i class="fa fa-trophy"></i> <?php echo $campagne->getNomCampagne(); ?></h1>

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
		<ul class="nav nav-tabs" id="showCampagneTabs">
			<li class="active pull-right"><a data-target="#infos" data-toggle="tab"><i class="fa fa-info-circle"></i> Infos</a></li>
			<li class="pull-right"><a data-target="#inscrits" data-toggle="tab"><i class="fa fa-users"></i> Inscrits (<?php echo count($inscrits) ?>)</a></li>
			<li class="pull-right"><a data-target="#participants" data-toggle="tab"><i class="fa fa-camera"></i> Participants (<?php echo count($participants) ?>)</a></li>
		</ul>
	</div>

	<div class="tab-content">
	  	<div class="tab-pane fade in active" id="infos">

			<div class="row">
				<div class="pull-right">
		  			<button role="button" class="btn btn-success" id="downloadCampagneCSV">
						<i class="fa fa-arrow-circle-o-down"></i> Exporter en CSV
					</button>
		    		<a class="btn btn-primary" href=<?php echo BASE_URL . 'admin/campagnes/edit/' . urlencode($campagne->getNomCampagne()); ?> role="button"><i class="fa fa-pencil-square-o"></i> Editer</a>
					<a class="btn btn-danger" href=<?php echo BASE_URL . 'admin/campagnes/delete/' . urlencode($campagne->getNomCampagne()); ?>><i class="fa fa-trash"></i> Supprimer</a>
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

		    <div class="row" style="margin-top:20px;">
				<div class="col-sm-6 col-sm-offset-3">
					<h1>CGU</h1>
				    <span style="font-size:15px;"><?php echo html_entity_decode($campagne->getCgu()); ?></span>
				</div>
			</div>

	  </div>
	  <div class="tab-pane fade" id="inscrits">

		  	<div class="row">
		  		<div class="pull-right">
		  			<button type="button" class="btn btn-success pull-right" id="downloadInscritsCSV">
						<i class="fa fa-arrow-circle-o-down"></i> Exporter en CSV
					</button>
		  		</div>
		  	</div>

			<?php
				foreach ($inscrits as $key => $inscrit) {
					if($key%3===0) {
						echo '<div class="row">';
					}
							echo '<div class="col-sm-4">';
								echo '<h3><strong>Nom :</strong> ' . $inscrit->getNom() . '</h3>';
								echo '<h4><strong>Prenom :</strong> ' . $inscrit->getPrenom() . '</h4>';
								echo '<h4><strong>Email :</strong> ' . $inscrit->getEmail() . '</h4>';
								echo '<h5><strong>Date de naissance :</strong> ' . $inscrit->getDateNaissance() . '</h5>';
								echo '<h5><strong>Validation :</strong> ' . $inscrit->getValidation() . '</h5>';
							echo '</div>';
					if($key%3===2 || $key === count($inscrits) - 1) {
						echo '</div>';
					}
				}
			?>

	  	</div>
	  	<div class="tab-pane fade" id="participants">

		  	<div class="row">
		  		<div class="pull-right">
		  			<button type="button" class="btn btn-success pull-right" id="downloadParticipantsCSV">
						<i class="fa fa-arrow-circle-o-down"></i> Exporter en CSV
					</button>
		  		</div>
		  	</div>

			<?php
				foreach ($participants as $key => $participant) {
					if($key%3===0) {
						echo '<div class="row">';
					}
							echo '<div class="col-sm-4" style="text-align:center">';
								echo '<img height="300px" width="300px" src="' . $photosByParticipants[$key]->getUrlPhoto() . '" class="img-circle">';
								foreach ($notesByParticipants[$key] as $keyNote => $note) {
									echo '<h1><strong>' . $keyNote . ' :</strong> ' . $note . '</h1>';
								}
								echo '<h3><strong>Nom :</strong> ' . $participant->getNom() . '</h3>';
								echo '<h4><strong>Prenom :</strong> ' . $participant->getPrenom() . '</h4>';
								echo '<h4><strong>Email :</strong> ' . $inscrit->getEmail() . '</h4>';
								echo '<h5><strong>Date de naissance :</strong> ' . $participant->getDateNaissance() . '</h5>';
								echo '<h5><strong>Validation :</strong> ' . $participant->getValidation() . '</h5>';
							echo '</div>';
					if($key%3===2 || $key === count($participants) - 1) {
						echo '</div>';
					}
				}
			?>

	  	</div>

	</div>

</div>


<table style="display:none;" id="campagneTable">
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
				<td><?php echo html_entity_decode($campagne->getLogoentreprise()); ?></td>
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

<?php
	if(count($inscrits) !== 0) {
?>
<table style="display:none;" id="inscritsTable">
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Date de naissance</th>
			<th>Validation</th>
		</tr>
	</thead>
	<tbody>
				<?php
					foreach ($inscrits as $inscrit) {
				?>
					<tr>
						<td><?php echo $inscrit->getNom(); ?></td>
						<td><?php echo $inscrit->getPrenom(); ?></td>
						<td><?php echo $inscrit->getEmail(); ?></td>
						<td><?php echo $inscrit->getDateNaissance(); ?></td>
						<td><?php echo $inscrit->getValidation(); ?></td>
					</tr>
				<?php
					}
				?>
	</tbody>
</table>
<?php
	}
?>

<?php
	if(count($participants) !== 0 && count($notesByParticipants) !== 0) {
?>
	<table style="display:none;" id="participantsTable">
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>Date de naissance</th>
				<th>Validation</th>
				<?php foreach ($notesByParticipants[0] as $keyNote => $note) { ?>
					<th><?php echo $keyNote; ?></th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>

			<?php
				foreach ($participants as $key => $participant)
				{
			?>
				<tr>
					<td><?php echo $participant->getNom(); ?></td>
					<td><?php echo $participant->getPrenom(); ?></td>
					<td><?php echo $inscrit->getEmail(); ?></td>
					<td><?php echo $participant->getDateNaissance(); ?></td>
					<td><?php echo $participant->getValidation(); ?></td>
					<?php foreach ($notesByParticipants[$key] as $keyNote => $note) { ?>
						<td><?php echo $note; ?></td>
					<?php } ?>
				</tr>
			<?php
				}
			?>
		</tbody>
	</table>

<?php
	}
?>

<script>
$( document ).ready(function() {

    $('#showCampagneTabs a:first').tab('show');

    /*Download Campagne infos csv*/
    $('#downloadCampagneCSV').on( "click", function downloadCampagneCSV() {
		var campagneTable = $('#campagneTable').html();
		var dataCampagne = campagneTable.replace(/<thead>/g,'')
						.replace(/<\/thead>/g,'')
						.replace(/<tbody>/g,'')
						.replace(/<\/tbody>/g,'')
						.replace(/<tr>/g,'')
						.replace(/<\/tr>/g,'\r\n')
						.replace(/<th>/g,'')
						.replace(/<\/th>/g,';')
						.replace(/<td>/g,'')
						.replace(/<\/td>/g,';')
						.replace(/\t/g,'')
						.replace(/\n/g,'');
		var linkCampagneCSV = $(document.createElement('a'))
						.attr({
							id: 'aCampagneCsv',
							download: <?php echo "'" . html_entity_decode($campagne->getNomCampagne()) . ".csv'"; ?>,
							href: 'data:application/csv,' + escape(dataCampagne)
						});
		$('#showCampagne').append(linkCampagneCSV);
		document.getElementById("aCampagneCsv").click();
	});

	/*Download Inscrits infos csv*/
    $('#downloadInscritsCSV').on( "click", function downloadInscritsCSV() {
		var inscritsTable = $('#inscritsTable').html();
		var dataInscrits = inscritsTable.replace(/<thead>/g,'')
						.replace(/<\/thead>/g,'')
						.replace(/<tbody>/g,'')
						.replace(/<\/tbody>/g,'')
						.replace(/<tr>/g,'')
						.replace(/<\/tr>/g,'\r\n')
						.replace(/<th>/g,'')
						.replace(/<\/th>/g,';')
						.replace(/<td>/g,'')
						.replace(/<\/td>/g,';')
						.replace(/\t/g,'')
						.replace(/\n/g,'');
		var linkInscritsCSV = $(document.createElement('a'))
						.attr({
							id: 'aInscritsCsv',
							download: <?php echo "'" . html_entity_decode($campagne->getNomCampagne()) . " inscrits.csv'"; ?>,
							href: 'data:application/csv,' + escape(dataInscrits)
						});
		$('#showCampagne').append(linkInscritsCSV);
		document.getElementById("aInscritsCsv").click();
	});

    <?php
		if(count($participants) !== 0 && count($notesByParticipants) !== 0) {
	?>
		/*Download participants infos csv*/
		$('#downloadParticipantsCSV').on( "click", function downloadParticipantsCSV() {
			var participantsTable = $('#participantsTable').html();
			var dataParticipants = participantsTable.replace(/<thead>/g,'')
							.replace(/<\/thead>/g,'')
							.replace(/<tbody>/g,'')
							.replace(/<\/tbody>/g,'')
							.replace(/<tr>/g,'')
							.replace(/<\/tr>/g,'\r\n')
							.replace(/<th>/g,'')
							.replace(/<\/th>/g,';')
							.replace(/<td>/g,'')
							.replace(/<\/td>/g,';')
							.replace(/\t/g,'')
							.replace(/\n/g,'');
			var linkParticipantsCSV = $(document.createElement('a'))
							.attr({
								id: 'aParticipantsCsv',
								download: <?php echo "'" . html_entity_decode($campagne->getNomCampagne()) . " participants.csv'"; ?>,
								href: 'data:application/csv,' + escape(dataParticipants)
							});
			$('#showCampagne').append(linkParticipantsCSV);
			document.getElementById("aParticipantsCsv").click();
		});
	<?php
		}
	?>

});
</script>


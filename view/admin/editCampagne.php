<h1>Editer le concours <?php echo $campagne->getNomCampagne(); ?></h1>

<?php
	if(isset($successMessages)) {
		foreach ($successMessages as $successMessage) {
			echo "<div class=\"alert alert-success\" role=\"alert\">" . $successMessage . "</div>";
		}
	}
	
    if(isset($errorsMessages)) {
        foreach ($errorsMessages as $errorsMessage) {
            echo "<div class=\"alert alert-danger\" role=\"alert\"><i class=\"fa fa-times\"></i>  " . $errorsMessage . "</div>";
        }
    }
?>

<div class="row">
    <div class="col-sm-6 col-sm-offset-3 createForm">

        <form action=<?php echo BASE_URL . "admin/campagnes/update"; ?> method="POST" class="form-horizontal">

			<input type="hidden" name="id" value=<?php echo '"'.$campagne->getId().'"' ?>>

            <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Nom du concours</label>
                <div class="col-sm-8">
                    <input type="text" name ="nom_campagne" class="form-control" id="inputName"
                    	   value=<?php echo '"'.$campagne->getNomCampagne().'"' ?> placeholder="Nom du concours" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputLogo" class="col-sm-4 control-label">Url du logo de la marque</label>
                <div class="col-sm-8">
                    <input type="url" name="logo_entreprise" class="form-control" id="inputLogo"
                    value=<?php echo '"'.$campagne->getLogoEntreprise().'"' ?> placeholder="Logo de la marque" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputStartDate" class="col-sm-4 control-label">Date de début</label>
                <div class="col-sm-8">
                    <input type="date" min=<?php echo date("y.m.d") ?> name="date_debut" class="form-control" id="inputStartDate"
                    value=<?php echo '"'.$campagne->getDateDebut().'"' ?> required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputEndDate" class="col-sm-4 control-label">Date de fin</label>
                <div class="col-sm-8">
                    <input type="date" min=<?php echo date("y.m.d") ?> name="date_fin" class="form-control" id="inputEndDate"
                    value=<?php echo '"'.$campagne->getDateFin().'"' ?> required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputColor" class="col-sm-4 control-label">Couleur</label>
                <div class="col-sm-8">
                    <input type="color" name="couleur" id="inputColor"
                    value=<?php echo '"'.$campagne->getCouleur().'"' ?> required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputIconUrl" class="col-sm-4 control-label">Url de l'icone</label>
                <div class="col-sm-8">
                    <input type="url" name="url_icone" class="form-control" id="inputIconUrl"
                    value=<?php echo '"'.$campagne->getUrlIcone().'"' ?> placeholder="Url de l'icone" required>
                </div>
            </div>

            <div class="form-group">
                <label for="text_accueil" class="col-sm-4 control-label">Texte d'accueil</label>
                <div class="col-sm-8">
                    <textarea name="text_accueil" class="form-control"
                              id="text_accueil" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'text_accueil' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="text_felicitations" class="col-sm-4 control-label">Texte de félicitations</label>
                <div class="col-sm-8">
                    <textarea name="text_felicitations" class="form-control"
                           id="text_felicitations" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'text_felicitations' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="inputNomLot" class="col-sm-4 control-label">Nom du lot</label>
                <div class="col-sm-8">
                    <input type="text" name ="nom_lot" class="form-control" id="inputNomLot"
                    	   value=<?php echo '"'.$campagne->getNomLot().'"' ?>placeholder="Nom du lot" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputImageLot" class="col-sm-4 control-label">Image du lot</label>
                <div class="col-sm-8">
                    <input type="url" name="image_lot" class="form-control" id="inputImageLot"
                    	   value=<?php echo '"'.$campagne->getImageLot().'"' ?> placeholder="Url de le l'image du lot" required>
                </div>
            </div>

            <div class="form-group">
                <label for="description_lot" class="col-sm-4 control-label">Description du lot</label>
                <div class="col-sm-8">
                    <textarea name="description_lot" class="form-control"
                           id="description_lot" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'description_lot' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="is_active" class="col-sm-4 control-label">Activer la campagne</label>
                <div class="col-sm-8">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="is_active" name="is_active" required>
                      </label>
                    </div>
                </div>
            </div>


            <div class="form-group btnSubmit">
                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-pencil-square-o"></i> Editer
                </button>
            </div>

        </form>
    </div>
</div>

<script>
	$( document ).ready(function() {

	    var campagne = {
			text_accueil: <?php echo '"' . $campagne->getTextAccueil() . '"'; ?>,
			text_felicitations: <?php echo '"' . $campagne->getTextFelicitations() . '"'; ?>,
			description_lot: <?php echo '"' . $campagne->getDescriptionLot() . '"'; ?>,
			is_active: <?php echo '"'.$campagne->getIsActive().'"' ?>
	    };
	    for (var attr in campagne) {
	        if (campagne.hasOwnProperty(attr)) {
	        	if(attr !== 'is_active') {
	        		$('#'+attr).html(unescape(campagne[attr])).val();
	        	} else {
	        		$('#'+attr).prop('checked', campagne.is_active);
	        	}
        		
	        }
	    }

	});
</script>
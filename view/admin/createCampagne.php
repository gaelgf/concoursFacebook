<h1><i class="fa fa-plus-circle"></i> Créer un nouveau concours</h1>

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

<div class="row">
    <div class="col-sm-6 col-sm-offset-3 createForm">

        <form action=<?php echo BASE_URL . "admin/campagnes/save"; ?> method="POST" class="form-horizontal">

            <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Nom du concours</label>
                <div class="col-sm-8">
                    <input type="text" name ="nom_campagne" class="form-control" id="inputName" placeholder="Nom du concours" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputLogo" class="col-sm-4 control-label">Url du logo de la marque</label>
                <div class="col-sm-8">
                    <input type="url" name="logo_entreprise" class="form-control" id="inputLogo" placeholder="Logo de la marque" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputStartDate" class="col-sm-4 control-label">Date de début</label>
                <div class="col-sm-8">
                    <input type="date" min=<?php echo date("y.m.d") ?> name="date_debut" class="form-control" id="inputStartDate" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputEndDate" class="col-sm-4 control-label">Date de fin</label>
                <div class="col-sm-8">
                    <input type="date" min=<?php echo date("y.m.d") ?> name="date_fin" class="form-control" id="inputEndDate" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputColor" class="col-sm-4 control-label">Couleur</label>
                <div class="col-sm-8">
                    <input type="color" name="couleur" id="inputColor" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputWelcomeText" class="col-sm-4 control-label">Texte d'accueil</label>
                <div class="col-sm-8">
                    <textarea name="text_accueil" class="form-control"
                              id="inputWelcomeText" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'inputWelcomeText' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="inputCongratulationText" class="col-sm-4 control-label">Texte de félicitations</label>
                <div class="col-sm-8">
                    <textarea name="text_felicitations" class="form-control"
                           id="inputCongratulationText" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'inputCongratulationText' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="inputNomLot" class="col-sm-4 control-label">Nom du lot</label>
                <div class="col-sm-8">
                    <input type="text" name ="nom_lot" class="form-control" id="inputNomLot" placeholder="Nom du lot" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputImageLot" class="col-sm-4 control-label">Image du lot</label>
                <div class="col-sm-8">
                    <input type="url" name="image_lot" class="form-control" id="inputImageLot" placeholder="Url de le l'image du lot" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputDescriptionLot" class="col-sm-4 control-label">Description du lot</label>
                <div class="col-sm-8">
                    <textarea name="description_lot" class="form-control"
                           id="inputDescriptionLot" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'inputDescriptionLot' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPhotoAccueilOne" class="col-sm-4 control-label">Url de la photo d'accueil n°1</label>
                <div class="col-sm-8">
                    <input type="url" name="photo_accueil_one" class="form-control" id="inputPhotoAccueilOne"
                           placeholder="Url de la photo d'accueil n°1" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputPhotoAccueilTwo" class="col-sm-4 control-label">Url de la photo d'accueil n°2</label>
                <div class="col-sm-8">
                    <input type="url" name="photo_accueil_two" class="form-control" id="inputPhotoAccueilTwo"
                           placeholder="Url de la photo d'accueil n°2" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="inputPhotoAccueilThree" class="col-sm-4 control-label">Url de la photo d'accueil n°3</label>
                <div class="col-sm-8">
                    <input type="url" name="photo_accueil_three" class="form-control" id="inputPhotoAccueilThree"
                        placeholder="Url de la photo d'accueil n°3" required>
                </div>                    
            </div>

            <input type="hidden" name="icone_coeur"
                    value="">

            <div class="form-group">
                <label for="inputIconePrincipale" class="col-sm-4 control-label">Url de l'icone principal</label>
                <div class="col-sm-8">
                    <input type="url" name="icone_principale" class="form-control" id="inputIconePrincipale"
                           placeholder="Url de l'icone principal" required>
                </div>                    
            </div>

            <div class="form-group">
                <label for="cgu" class="col-sm-4 control-label">CGU</label>
                <div class="col-sm-8">
                    <textarea name="cgu" class="form-control"
                           id="cgu" required>
                    </textarea>
                    <script>
                        CKEDITOR.replace( 'cgu' );
                    </script>
                </div>
            </div>

            <div class="form-group">
                <label for="inputIsActive" class="col-sm-4 control-label">Activer la campagne</label>
                <div class="col-sm-8">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" id="inputIsActive" name="is_active">
                      </label>
                    </div>
                </div>
            </div>

            <div class="form-group btnSubmit">
                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-plus-circle"></i> Créer
                </button>
            </div>

        </form>
    </div>
</div>
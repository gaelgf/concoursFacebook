<h1>Créer un nouveau concours</h1>

<?php
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
                <label for="inputIconUrl" class="col-sm-4 control-label">Url de l'icone</label>
                <div class="col-sm-8">
                    <input type="url" name="url_icone" class="form-control" id="inputIconUrl" placeholder="Url de l'icone" required>
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


            <div class="form-group btnSubmit">
                <button type="submit" class="btn btn-primary pull-right">
                    <i class="fa fa-plus-circle"></i> Créer
                </button>
            </div>

        </form>
    </div>
</div>
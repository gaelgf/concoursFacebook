<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/menuback.css">
    <link rel="stylesheet" href="css/formcontact.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<div id='cssmenu'>
    <ul>
        <li><a href='admin'><span>Home</span></a></li>
        <li class='active'><a href='#'><span>Créer Concours</span></a></li>
        <li><a href='adminVisuConcours'><span>Visualiser Concours</span></a></li>
        <li class='last'><a href='adminModifConcours'><span>Modifier Concours</span></a></li>
    </ul>
</div>
<div id="contenu">

    <div class="row" align="center" id="formcreate">
        <div class="col-lg-12">


            {!! Form::open(
                array(
                    /*'route' => 'admin/adminCreerConcours', */
                    'class' => 'form',
                    'novalidate' => 'novalidate',
                    'files' => true)) !!}

                <fieldset>
                    <legend> Création de concours </legend>


                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('nom_campagne', 'Entrez le nom du concours : ') !!}
                            {!! Form::text('nom_campagne') !!}
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('couleur', 'Choisissez une couleur de thème : ') !!}
                            {{ Form::select('couleur', [
                                   'rouge' => 'Rouge',
                                   'bleu' => 'Bleu',
                                   'vert' => 'Vert']
                                ) }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="color-picker">Choix de la couleur</label>
                            <input type="color" name="color-picker" id="color-picker">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('Choisissez un logo à afficher') !!}
                            {!! Form::file('logo_entreprise', null) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('Date de début du concours') !!}
                            {!! Form::date('date_debut', \Carbon\Carbon::now()) !!}
                        </div>
                    </div>

                     <div class="row">
                         <div class="col-lg-12">
                             {!! Form::label('Date de fin du concours') !!}
                             {!! Form::date('date_fin', \Carbon\Carbon::now()) !!}
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-lg-12">
                             {!! Form::label('Choisissez une icone') !!}
                             {!! Form::file('icone', null) !!}
                         </div>
                     </div>

                        <div class="row">
                           <div class="col-lg-12">
                               {!! Form::label('Insérez un texte de présentation') !!}
                               {!! Form::textarea('text_accueil') !!}
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                            {!! Form::label('Insérez un texte de félicitation') !!}
                            {!! Form::textarea('text_felicitation') !!}
                         </div>
                     </div>

                </fieldset>


                <div>
                    {!! Form::submit('creer') !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>


</div>


<?php
    if(isset($_POST['creer'])){
        $nom_campagne=$_POST['nom'];
        $couleur=$_POST['couleur'];
        $logo_entreprise=$_POST['logo'];
        $date_debut=$_POST['datedebut'];
        $date_fin=$_POST['datefin'];
        $url_icone=$_POST['icone'];
        $text_accueil=$_POST['text_accueil'];
        $text_felicitation=$_POST['text_felicitation'];

        echo 'nom : '. $nom_campagne.'<br/>';
        echo 'couleur : '. $couleur.'<br/>';
        echo 'logo : '. $logo_entreprise.'<br/>';
        echo 'datedebut : '. $date_debut.'<br/>';
        echo 'datefin : '. $date_fin.'<br/>';
        echo 'icone : '. $url_icone.'<br/>';
        echo 'text_accueil : '. $text_accueil.'<br/>';
        echo 'text_felicitation : '. $text_felicitation.'<br/>';

    }
?>


</body>

</html>

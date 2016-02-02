<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/menuback.css">
    <link rel="stylesheet" href="css/formcontact.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

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

    <div class="row" align="center">
        <div class="col-lg-12">
            <form action="toto.php" method="post" id="formcreate">

                <fieldset>
                    <legend> Création de concours </legend>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nom">Entrez le nom du concours :</label>
                            <input type="text" name="nom" placeholder="Ex : Concours été 2015" id="nom" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                        <label for="couleur">Choisissez une couleur de thème : </label>
                        <input type="radio" name="theme" value="rouge" id="rouge" checked="checked" /> Rouge
                        <input type="radio" name="theme" value="bleu" id="bleu" checked="checked" /> Bleu
                        <input type="radio" name="theme" value="vert" id="vert" checked="checked" /> Vert
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="logo">Choisissez un logo à afficher : </label>
                            <input type="file" name="logo" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="date_debut">Date de début</label>
                            <input type="date" name="datedebut">
                        </div>
                    </div>

                     <div class="row">
                         <div class="col-lg-12">
                            <label for="date_fin">Date de fin</label>
                            <input type="date" name="datefin">
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-lg-12">
                            <label for="icone">Choisissez un icone : </label>
                            <input type="file" name="icone" />
                         </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-12">
                            <label for="text_accueil">Insérer un text d'acceuil</label>
                         </div>
                     </div>
                        <div class="row">
                           <div class="col-lg-12">
                            <textarea name="text_accueil" id="text_accueil"></textarea>
                        </div>
                     </div>

                     <div class="row">
                         <div class="col-lg-12">
                            <label for="text_felicitation">Insérer un text de fécilitation</label>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                            <textarea name="text_felicitation" id="text_felicitation"></textarea>
                         </div>
                     </div>

                </fieldset>


                <p>
                    <input type="submit" value="Créer" />
                </p>

            </form>
        </div>
    </div>


</div>


</body>

</html>

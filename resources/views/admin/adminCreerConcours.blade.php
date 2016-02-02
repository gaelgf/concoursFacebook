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


    <form action="toto.php" method="post" id="formcreate">

        <fieldset>
            <legend> Création de concours </legend>

            <label for="nom">Entrez le nom du concours :</label>
            <input type="text" name="nom" value="nom" id="nom" />


            <p>Choisissez une couleur de thème : </p>
            <input type="radio" name="theme" value="rouge" id="rouge" checked="checked" /> Rouge
            <input type="radio" name="theme" value="bleu" id="bleu" checked="checked" /> Bleu
            <input type="radio" name="theme" value="vert" id="vert" checked="checked" /> Vert


            <p>Choisissez un logo à afficher : </p>
            <input type="file" name="logo" />

            <p>Date de début</p>
            <input type="date" name="datedebut">

            <p>Date de fin</p>
            <input type="date" name="datefin">

            <p>Choisissez un icone : </p>
            <input type="file" name="icone" />

            <p>Insérer un text d'acceuil</p>
            <input type="text" name="text_accueil">

            <p>Insérer un text de fécilitation</p>
            <input type="text" name="text_felicitation">

        </fieldset>


        <p>
            <input type="submit" value="Envoyer" />
        </p>

    </form>


</div>


</body>

</html>

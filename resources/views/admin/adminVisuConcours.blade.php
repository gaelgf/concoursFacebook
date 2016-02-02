<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/menuback.css">
    <link rel="stylesheet" href="css/formcontact.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<div id='cssmenu'>
    <ul>
        <li><a href='admin'><span>Home</span></a></li>
        <li><a href='adminCreerConcours'><span>Créer Concours</span></a></li>
        <li class='active'><a href='#{'><span>Visualiser Concours</span></a></li>
        <li class='last'><a href='adminModifConcours'><span>Modifier Concours</span></a></li>
    </ul>
</div>
<div id="contenu">


    <form action="toto.php" method="post" id="formcreate">
    <form action="toto.php" method="post" id="formcreate">

        <fieldset>
            <legend> Visualisation de concours </legend>

            <label for="nom">Choisissez le concours à visualiser:</label>
            <SELECT name="nom" size="1">
                <OPTION>Concours 1
                <OPTION>Concours 2
                <OPTION>Concours 3
                <OPTION>Concours de bob
                <OPTION>Concours 5
            </SELECT>

        </fieldset>


        <p>
            <input type="submit" value="Afficher" />
        </p>

    </form>



    <h3>Affichage du concours </h3>



</div>


</body>

</html>

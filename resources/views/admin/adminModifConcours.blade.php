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
        <li><a href='adminCreerConcours'><span>Créer Concours</span></a></li>
        <li><a href='adminVisuConcours'><span>Visualiser Concours</span></a></li>
        <li class='active'><a href='#'><span>Modifier Concours</span></a></li>
    </ul>
</div>
<div id="contenu">

    <div class="row" align="center" id="formcreate">
        <div class="col-lg-12">


            <form method="post" action="#">

                <fieldset>
                    <legend> Modification de concours </legend>


                    <div class="row">
                        <div class="col-lg-12">
                            <label for="modif_concours">Choisissez un concours à modifier : </label>
                                <select name="modif_concours">
                                    <option value="concours1">concours 1 </option>
                                    <option value="concours2">concours 2</option><
                                    <option value="concours3">concours 3</option>
                                </select>
                        </div>
                    </div>


                </fieldset>


                <p>
                    <input type="submit" value="Modifier" name="modifier"/>
                </p>

            </form>
        </div>
    </div>


        <h3>Affichage du concours </h3>



</div>


</body>

</html>

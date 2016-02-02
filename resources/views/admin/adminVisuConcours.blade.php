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

        <div class="row" align="center" id="formcreate">
            <div class="col-lg-12">

                {!! Form::open(
                array(
                    /*'route' => 'admin/adminCreerConcours', */
                    'class' => 'form',
                    'novalidate' => 'novalidate',
                    'files' => true)) !!}

                    <fieldset>
                        <legend> Visualisation de concours </legend>

                        <div class="row">
                            <div class="col-lg-12">
                                {!! Form::label('visualisation_concours', 'Choisissez un concours à visualiser : ') !!}
                                {{ Form::select('visualisation_concours', [
                                       'concours1' => 'concours 1',
                                       'concours2' => 'concours 2',
                                       'concours3' => 'concours 2 ']
                                    ) }}
                            </div>
                        </div>
                    </fieldset>


                    <p>
                        {!! Form::submit('visualiser') !!}
                    </p>

                {!! Form::close() !!}
            </div>
        </div>


        <h3>Affichage du concours </h3>



    </div>


</body>

</html>

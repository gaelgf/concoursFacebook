<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<html>
    <div class="container" style="margin-top:30px">

        <div class="row" id="formcreate">
            <div class="col-sm-12">

                @if (isset($errors) && count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                 @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form action="{{ URL::to('campagnes') }}" method="POST" class="form-horizontal">

                    <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Nom du concours</label>
                        <div class="col-sm-10">
                            <input type="text" name ="nom_campagne" class="form-control" id="inputName" placeholder="Nom du concours" value="{{ Input::get('nom_campagne') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLogo" class="col-sm-2 control-label">Logo de la marque</label>
                        <div class="col-sm-10">
                            <input type="text" name="logo_entreprise" class="form-control" id="inputLogo" placeholder="Logo de la marque" value="{{ Input::get('logo_entreprise') }}">
                        </div>                    
                    </div>

                    <div class="form-group">
                        <label for="inputStartDate" class="col-sm-2 control-label">Date de début</label>
                        <div class="col-sm-10">
                            <input type="text" name="date_debut" name="nom_campagne" class="form-control" id="inputStartDate" placeholder="Date de début" value="{{ Input::get('date_debut') }}">
                        </div>                    
                    </div>

                    <div class="form-group">
                        <label for="inputEndDate" class="col-sm-2 control-label">Date de fin</label>
                        <div class="col-sm-10">
                            <input type="text" name="date_fin" class="form-control" id="inputEndDate" placeholder="Date de fin" value="{{ Input::get('date_fin') }}">
                        </div>                    
                    </div>

                    <div class="form-group">
                        <label for="inputColor" class="col-sm-2 control-label">Couleur</label>
                        <div class="col-sm-10">
                            <select name="couleur" class="form-control" value="{{ Input::get('couleur') }}">
                              <option value="red">Rouge</option> 
                              <option value="blue">Vert</option>
                              <option value="green">Bleu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputIconUrl" class="col-sm-2 control-label">Url de l'icone</label>
                        <div class="col-sm-10">
                            <input type="text" name="url_icone" class="form-control" id="inputIconUrl" placeholder="Url de l'icone" value="{{ Input::get('url_icone') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputWelcomeText" class="col-sm-2 control-label">Texte d'accueil</label>
                        <div class="col-sm-10">
                            <input type="text" name="text_accueil" class="form-control" id="inputWelcomeText" placeholder="Texte d'accueil" value="{{ Input::get('text_accueil') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputCongratulationText" class="col-sm-2 control-label">Texte de félicitations</label>
                        <div class="col-sm-10">
                            <input type="text" name="text_felicitations" class="form-control" id="inputCongratulationText" placeholder="Texte de félicitations" value="{{ Input::get('text_felicitations') }}">
                        </div>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-default pull-right">
                            <i class="fa fa-plus"></i> Ajouter le concours
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</html>
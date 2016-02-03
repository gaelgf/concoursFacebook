@extends('templates.base.php')

@section('content')
<div class="accueil">
    <div class="title container">
        <div class="col-xs-5" style="text-align:right">
            Montres nous ton <br/>meilleur souvenir Coca-Cola !
        </div>
        <div class="col-xs-2 icone">
            <img src="img/campagnes/1/icone.png" alt="">
        </div>
        <div class="col-xs-5" style="text-align:left">
            PARTICIPER?<br/> Rien de plus simple
        </div>
    </div>
    <div class="actions_bottom container">
        <div class="col-xs-1"></div>
        <a class="col-xs-4 boutons choisir_photo" href="https://fierce-refuge-2356.herokuapp.com/choix_photo_facebook">
            Choisir une photo
        </a>
        <div class="col-xs-2"></div>
        <a class="col-xs-4 boutons telecharger_photo" href="https://fierce-refuge-2356.herokuapp.com/choix_telechargement_photo">
            Télécharger votre photo
        </a>
        <div class="col-xs-1"></div>
    </div>
</div>
@endsection
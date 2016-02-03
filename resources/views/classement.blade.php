@extends('templates.facebook_connect')

@section('content')
<div class="classement container">
    <div class="col-xs-7">
        <div class="container_podium container">
            <div class="col-xs-4 personne" style="margin-top:47px;">
                <div class="photo">
                    <img src="img/classement/participant.jpg" alt="">
                </div>
                <div class="name">
                    ThiboJ
                </div>
                <div class="note">
                    3.5/10
                </div>
            </div>
            <div class="col-xs-4 personne">
                <div class="photo">
                    <img src="img/classement/participant.jpg" alt="">
                </div>
                <div class="name">
                    ThiboJ
                </div>
                <div class="note">
                    3.5/10
                </div>
            </div>
            <div class="col-xs-4 personne" style="margin-top:63px;">
                <div class="photo">
                    <img src="img/classement/participant.jpg" alt="">
                </div>
                <div class="name">
                    ThiboJ
                </div>
                <div class="note">
                    3.5/10
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-5 container_right">
        <div class="image_personne" alt="">
            <img src="img/classement/photo_visiteur.jpg" alt="">
        </div>
        <a class="col-xs-4 boutons telecharger_photo" href="https://fierce-refuge-2356.herokuapp.com/choix_telechargement_photo">
            Télécharger votre photo
        </a>
        <br/>
        <br/>
        <a class="col-xs-4 boutons choisir_photo" href="https://fierce-refuge-2356.herokuapp.com/choix_photo_facebook">
            Choisir une photo
        </a>
    </div>
</div>
@endsection
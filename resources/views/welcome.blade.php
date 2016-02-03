@extends('templates.base.php')

@section('content')
<?php

$helper = $fb->getRedirectLoginHelper();
$permissions = ['public_profile', 'email','user_photos','publish_actions']; // optional
$loginUrl = $helper->getLoginUrl('https://fierce-refuge-2356.herokuapp.com/validation_connexion', $permissions);

?>
<div class="select_picture">
    <div class="container_select">
        <div class="container_pictures">
            <ul class="album">
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
                <li>
                    <img src="img/photo_exemple.jpg"></li>
                </li>
            </ul>
        </div>
        <br/>
        <?php

        if( !isset($_SESSION['facebook_access_token'])){
            echo '<a  class="boutons bouton_connexion" href="' . $loginUrl . '">Log in with Facebook!</a>';
        }
        else{
            echo "Vous etes connecte<br/>";
        }

        ?>
    </div>
</div>
@endsection
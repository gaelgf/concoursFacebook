@extends("templates.layout");

@section("content")
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
        <a  class="boutons bouton_connexion" href=" <?php echo $loginUrl; ?>">Je participe !</a>
    </div>
</div>
@endsection
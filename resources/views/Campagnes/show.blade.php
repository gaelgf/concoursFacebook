<!DOCTYPE html>
<html lang="en">

<head>
    <script src="../js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<html>

<h1>Showing {{ $campagne->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $campagne->nom_campagne }}</h2>
        <p>
            <strong>Date début :</strong> {{ $campagne->date_debut }}<br>
            <strong>Date fin :</strong> {{ $campagne->date_fin }}
        </p>
    </div>

</div>

</html>
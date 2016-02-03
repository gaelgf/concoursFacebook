<!DOCTYPE html>
<html lang="en">

<head>
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<html>

<h1>All the Campagnes</h1>

@if (session('status'))
    <div class="alert alert-success">
@endif{{ session('status') }}
    </div>
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Name</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($campagnes as $campagne)
        <tr>
            <td>{{ $campagne->nom_campagne  }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('campagnes/' . $campagne->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('campagnes/' . $campagne->id . '/edit') }}">Edit</a>
                <form action="{{ URL::to('campagnes/' . $campagne->id) }}" method="DELETE" style="display:inline">
                    <button type="submit" class="btn btn-small">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</html>
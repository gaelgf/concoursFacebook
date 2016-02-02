<h1>All the Campagnes</h1>

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
                <a class="btn btn-small btn-success" href="{{ URL::to('campagnes/' . $campagne->id_campagne) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('campagnes/' . $campagne->id_campagne . '/edit') }}">Edit</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
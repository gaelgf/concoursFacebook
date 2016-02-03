<h1>All the Campagnes</h1>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
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
                <!--<form action="{{ URL::to('campagnes/' . $campagne->id) }}" method="DELETE">
                    <button type="submit" class="btn btn-small pull-right">
                        Delete
                    </button>
                </form>-->
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $animal->nom }}</h1>
            <p class="lead">{{ $animal->description }}</p>
                 <!-- Display Uploaded Image -->
    @if (isset($animal) && $animal->image)
        <div class="mt-3">
            <label for="animal-image">Image:</label>
            <img src="{{ asset('images/' . $animal->image) }}" alt="Animal Image" id="animal-image" class="img-thumbnail">
        </div>
    @endif
    <script>
    var animalImage = @json($animal->image); // Assuming $animal->image is a string
    console.log("Animal Image:", animalImage);
</script>

            <div class="buttons">
                <a href="{{ url('animal/'. $animal->id .'/edit') }}" class="btn btn-info">Modifier</a>
                <form action="{{ url('animal/'. $animal->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            
            </div>
        </div>
    </div>
</div>
</div>


@endsection
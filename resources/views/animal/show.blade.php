@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $animal->nom }}</h1>
            <p class="lead">{{ $animal->description }}</p>

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
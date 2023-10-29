@extends('layouts.app')


@section('content')


    <h1>Modifier animal: {{ $animal->titre }}</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('animal/'. $animal->id) }}" >
        @method('PATCH')
        @csrf

<!--
        <div class="form-group mb-3">

            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" placeholder="Entrer titre" name="titre" value="{{ $animal->titre }}">

        </div>

        <div class="form-group mb-3">

            <label for="content">Ajouter le contenu:</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $animal->content }}</textarea>

        </div>

        <div class="form-group mb-3">

            <label for="auteur">Auteur:</label>
            <input type="text" class="form-control" id="auteur" placeholder="Entrer auteur" name="auteur" value="{{ $animal->auteur }}">

        </div>

    -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
@extends('layouts.app')


@section('content')

    <h1>Ajouter un animal</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ url('animal') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez un nom" name="nom">
        </div>

        <div class="form-group mb-3">

            <label for="description">Ajouter une description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>

        </div>


       <!-- <div class="form-group mb-3">
            <label for="user">Ajouter auteur:</label>
            <input type="auteur" class="form-control" id="user" placeholder="auteur" name="user">
        </div>-->
    

        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection
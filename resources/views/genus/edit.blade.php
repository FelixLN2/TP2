@extends('layouts.app')


@section('content')


    <h1>Modifier genus: {{ $genus->nom }}</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form method="post" action="{{ url('genus/'. $genus->id . '/update') }}" >
        @method('PATCH')
        @csrf


        <div class="form-group mb-3">

            <label for="nom">nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrer nom" name="nom" value="{{ $genus->nom }}">

        </div>

        <div class="form-group mb-3">

            <label for="description">Ajouter le contenu:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $genus->description }}</textarea>

        </div>

        <!--<div class="container">
            <div class="row">
           
            <p> <B>Cette page va contenir des détails sur mon blog.</B></p>
            <h2> Téléverser une image  </h2>
            <form method = "POST" action = "{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <input type = "file" name= "photo">
                <input type = "submit" name= "Téléversser">

            </form>
            </div>
        </div>-->
        <!--
        <div class="form-group mb-3">

            <label for="auteur">Auteur:</label>
            <input type="text" class="form-control" id="auteur" placeholder="Entrer auteur" name="auteur" value="{{ $genus->auteur }}">

        </div>
        -->
 
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
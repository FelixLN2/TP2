@extends('layouts.app')


@section('content')

    <h1>Ajouter un genus</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ url('genus') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez un nom" name="nom">
        </div>

        <div class="form-group mb-3">

            <label for="description">Ajouter une description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>

        </div>


<!--        
        <div class="container">
            <div class="row">
           
            <p> <B>Cette page va contenir des détails sur mon blog.</B></p>
            <h2> Téléverser une image  </h2>
            <form method = "POST" action = "{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <input type = "file" name= "photo">
                <input type = "submit" name= "Téléversser">

            </form>
            </div>
        </div>
-->
      <!--  <div class="form-group mb-3">
            <label for="user">Ajouter auteur:</label>
            <input type="auteur" class="form-control" id="user" placeholder="auteur" name="user">
        </div>-->
    

        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection
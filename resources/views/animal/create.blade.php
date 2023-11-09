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

    <form action="{{ url('animal') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="titre">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrez un nom" name="nom">
        </div>

        <div class="form-group mb-3">

            <label for="description">Ajouter une description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>

        </div>
        <input type="hidden" name="genus_id" value="{{ $genus_id }}">

       <!-- <div class="container">
            <div class="row">
           
            <p> <B>Cette page va contenir des détails sur mon blog.</B></p>
            <h2> Téléverser une image  </h2>
            <form method = "POST" action = "{{ route('login') }}" enctype="multipart/form-data">
                @csrf
                <input type = "file" name= "image">
                <input type = "submit" name= "image">

            </form>
            </div>
        </div>-->

        <div class="form-group mb-3">
            <label for="image">Téléverser une image:</label>
            <input type="file" name="image" class="form-control-file">
        </div>

    

        <button type="submit" class="btn btn-primary">Enregister</button>

    </form>

@endsection
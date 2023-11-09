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

    <form method="post" action="{{ url('animal/'. $animal->id  . '/update')  }}"  enctype="multipart/form-data">
        @method('PATCH')
        @csrf


          <div class="form-group mb-3">

            <label for="nom">nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Entrer nom" name="nom" value="{{ $animal->nom }}">

        </div>

        <div class="form-group mb-3">

            <label for="description">Ajouter le contenu:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="{{ $animal->description }}"></textarea>

        </div>
        <div class="form-group mb-3">
            <label for="image">Téléverser une image:</label>
            <input type="file" name="image" class="form-control-file">
        </div>

       

  
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>

@endsection
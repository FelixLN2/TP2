@extends('layouts.app')


@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
            <h1>{{ $genus->nom }}</h1>
            <p class="lead">{{ $genus->description }}</p>

            <div class="buttons">
                <a href="{{ url('genus/'. $genus->id .'/edit') }}" class="btn btn-info">{!! __('messages.modify') !!}</a>
                <form action="{{ url('genus/'. $genus->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{!! __('messages.delete') !!}</button>
                </form>
            
            </div>

            <a href="{{ url('animal/create?genus_id=' . $genus->id) }}" class="btn btn-info">{!! __('messages.addanimal') !!}</a>
            <!-- Display Associated Animals -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{!! __('messages.associatedanimals') !!}</h2>
            @if ($genus->animal->count() > 0)
                <ul>
                    @foreach ($genus->animal as $animal)
                    <a href="{{ url('animal/' . $animal->id) }}" class="btn btn-info">{{ $animal->nom }}</a> - {{ $animal->description }}</li>
                    @endforeach
                </ul>
            @else
                <p>No associated animals found.</p>
            @endif
        </div>
    </div>
</div>
        </div>
    </div>
</div>
</div>


@endsection
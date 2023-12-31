@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-10">
            <h2>Mon blog avec Laravel</h2>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-success" href="{{ url('animal/create') }}">{!! __('messages.addanimal') !!}</a>
        </div>

    </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif



<div class="container">
    <div class="row">
        @foreach ($animals as $index => $animal)
        <div class="col-md-4">
            <div class="card card-body">
                <a href="{{ url('animal/'. $animal->id) }}">
                <h2>
                        {{ $animal->nom }}
                    </h2>
                </a>
            <p>{!! __('messages.writtenby') !!} {{ $animal->user->name }} | date: {{ $animal->created_at }}</p>
            <a href="{{ url('animal/'. $animal->id) }}" class="btn btn-outline-primary">{!! __('messages.showdetails') !!}</a>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
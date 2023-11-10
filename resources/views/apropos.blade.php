@extends('layouts.app')


@section('content')

<body>
<div class="container">
<div class="row">
<ul>
    <li>Félix Laprise-Narbonne</li>
    <br/>
    <li>
        <ul>
            <li>420-5H6 MO Applications Web transactionnelles</li>
            <li>Automne 2023, Collège Montmorency</li>
        </ul>
    </li>
    <br/>
    <li>
        <ul>
            
            
            <li>tu peux uploader une image pour les animaux, fonctionne</li>
            <li>tu recois un mail de verification quand tu register, fonctionne</li>
            <li>internationalistion marche pas, suivi le lien <a href="https://dev.to/jeromew90/how-to-create-a-multilingual-project-in-laravel-internationalization-i18n-11ol">https://dev.to/jeromew90/how-to-create-a-multilingual-project-in-laravel-internationalization-i18n-11ol</a> et ca marche pas</li>
        </ul>
    </li>
    <li><img src="{{ asset('images/ConcepteurBD.png') }}" alt="Concepteur BD"  class="img-thumbnail"></li>
</ul>



</div>
</div>
</body>

@endsection 
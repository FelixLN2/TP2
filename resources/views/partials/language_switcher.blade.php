<!-- resources/views/partials/language_switcher.blade.php -->

@php $locale = session()->get('locale'); @endphp
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        @switch($locale)
            @case('es')
                <img src="{{ asset('/images/flag/es.png') }}" width="30px" height="20px"> Español
                @break
            @case('fr')
                <img src="{{ asset('/images/flag/fr.png') }}" width="30px" height="20px"> Français
                @break
            @default
                <img src="{{ asset('/images/flag/en.png') }}" width="30px" height="20px"> English
        @endswitch
        <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ url('/lang/en') }}">
            <img src="{{ asset('/images/flag/en.png') }}" width="30px" height="20px"> English
        </a>
        <a class="dropdown-item" href="{{ url('/lang/fr') }}">
            <img src="{{ asset('/images/flag/fr.png') }}" width="30px" height="20px"> Français
        </a>
        <a class="dropdown-item" href="{{ url('/lang/es') }}">
            <img src="{{ asset('/images/flag/es.png') }}" width="30px" height="20px"> Español
        </a>
    </div>
</li>

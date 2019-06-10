<ul class="nav nav-tabs card-header-tabs">

    <li class="nav-item">
        <a class="nav-link {{ Request::is('profiel') ? 'active' : ''}}" href="{{route('home.profiel')}}">Overzicht</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('profiel/account') ? 'active' : ''}}" href="{{route('home.profiel.account')}}">Mijn account</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('home.profiel.orders')}}">Bestellingen</a>
    </li>

</ul>
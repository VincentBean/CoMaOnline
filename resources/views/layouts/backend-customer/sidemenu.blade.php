<ul class="nav">
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.index')}}">
        <i class="material-icons">dashboard</i>
            <p>Mijn gegevens</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/nieuws*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.articles')}}">
        <i class="material-icons">library_books</i>
            <p>Mijn bestellingen</p>
        </a>
    </li>
  
    {{-- <li class="nav-item">
        <a class="nav-link" href="https://material-dashboard-laravel.creative-tim.com/notifications">
        <i class="material-icons">contact_mail</i>
        <p>Contact</p>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}">
        <i class="material-icons">language</i>
        <p>Loguit</p>
        </a>
    </li>
</ul>
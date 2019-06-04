<ul class="nav">
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.index')}}">
        <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/nieuws*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.articles')}}">
        <i class="material-icons">library_books</i>
            <p>Nieuwsberichten</p>
        </a>
    </li>
    <li class="nav-item {{Request::is('dashboard/aanbiedingen*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.promotions.edit')}}">
        <i class="material-icons">shopping_basket</i>
            <p>Aanbiedingen</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/categorieen*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.categories')}}">
        <i class="material-icons">category</i>
        <p>Categorieën</p>
        </a>
    </li>
    <li class="nav-item {{ Request::is('dashboard/gebruikers*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.users')}}">
        <i class="material-icons">account_box</i>
            <p>Gebruikers</p>
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
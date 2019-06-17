<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
            <div class="col-lg-11 mx-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="ni ni-align-left-2"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <a class="navbar-brand mr-lg-5" href="{{route('welcome')}}">
                        <img src="{{asset('svg/logo.svg')}}">
                    </a>
                    <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                        <li class="nav-item dropdown">
                            <a href="{{route('home.products')}}" class="nav-link">
                                <i class="ni ni-shop d-lg-none"></i>
                                <span class="nav-link-inner--text">Producten</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{route('home.discounts')}}" class="nav-link">
                                <i class="ni ni-shop d-lg-none"></i>
                                <span class="nav-link-inner--text">Aanbiedingen</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a href="{{route('home.cart')}}" class="nav-link">
                                <i class="ni ni-shop d-lg-none"></i>
                                <span class="nav-link-inner--text">Winkelwagen - €{{Cart::total()}}</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <form method="GET" action="{{route('search')}}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                                    </div>
                                    <input id="search" name="q" value="{{request()->input('q')}}"
                                        class="form-control form-control-alternative" placeholder="Zoek naar..."
                                        type="text" autocomplete="off">

                                    <div id="productlist" class="dropdown-menu" aria-labelledby="dropdownMenuLink"
                                        style="width:500px;z-index:1000;">

                                    </div>
                                    {{ csrf_field() }}
                                </div>
                            </form>
                        </li>
                        @if(Route::has('login'))
                        @auth
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{route('home.profiel')}}">
                                <span class="nav-link-inner--text">Profiel</span>
                            </a>
                        </li>
                        @role('admin|web_editor')
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{route('dashboard.index')}}">
                                <span class="nav-link-inner--text">Dashboard</span>
                            </a>
                        </li>
                        @endrole
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('logout')}}">Logout</a>
                        </li>
                        @else
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{route('register')}}" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon">
                                    <i class="ni ni-circle-08 mr-2"></i>
                                </span>
                                <span class="nav-link-inner--text">Registeren</span>
                            </a>
                        </li>

                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{route('login')}}">
                                <span class="nav-link-inner--text">Inloggen</span>
                            </a>
                        </li>
                        @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
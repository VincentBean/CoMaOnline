<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="{{route('welcome')}}">
          <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Albert_Heijn_Logo.svg">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="./index.html">
                  <img src="./assets/img/brand/blue.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
            <li class="nav-item dropdown">
              <a href="{{route('home.products')}}" class="nav-link">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Producten</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-collection d-lg-none"></i>
                <span class="nav-link-inner--text">Categorieën</span>
              </a>
              <div class="dropdown-menu">

            </li>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                <i class="ni ni-ui-04 d-lg-none"></i>
                <span class="nav-link-inner--text">Acties</span>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item d-none d-lg-block ml-lg-4">
              <a href="https://www.creative-tim.com/product/argon-design-system" target="_blank" class="btn btn-neutral btn-icon">
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
          </ul>
        </div>
      </div>
    </nav>
  </header>
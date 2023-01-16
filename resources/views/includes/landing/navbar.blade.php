  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <span class="brand-text font-weight-light"></span>
        <span class="brand-text font-weight-light">DINKES</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        @if (Route::has('login'))

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/" class="nav-link">Home</a>
            </li>

            @auth
            <li class="nav-item">
                <a href="/dashboard/home" class="nav-link">Lowongan Pekerjaan</a>
            </li>
            @else
            
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Registrasi</a>
            </li>
            
            @endauth

        </ul>
        @endif
        <!-- SEARCH FORM -->
        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
        <li class="nav-item">
          {{-- <p class="nav-link">Hallo {{ Auth::user()->name }}</p> --}}
        </li>

        <li class="nav-item">
            {{-- <a href="{{ route('logout') }}" class="nav-link" style="color:red" onclick="event.preventDefault();
            document.getElementById('logout').submit();">Logout            
                <form id="logout" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </a> --}}
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
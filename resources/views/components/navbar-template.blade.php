
    <!-- Navbar-->
    <div class="site-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container"><a class="navbar-brand" href="{{url ("http://127.0.0.1:8000")}}"><img class="site-logo" src="{{ asset('assets/images/logo.png')}}" alt="Logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item"><a class="nav-link" href="{{url ("http://127.0.0.1:8000")}}">Beranda</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ route('landing_dokumentasi') }}">Dokumentasi</a></li>
              <li class="nav-item"><a class="nav-link" href="element-accordions.html">About Us</a></li>
              <head>
                <style>
                    .btn-custom {
                        background-color: #5d53ed;
                        color: white; 
                    }
                </style>
            </head>
            <body>
                </div><a class="btn btn-cornflower-blue text-white mt-2 "
                            href="{{ route('login') }}">Login</a>
            </body>
            </ul>
            <ul class="nav-modules">
              <!-- Social nav-->
            </ul>
          </div>
        </div>
      </nav>
    </div>
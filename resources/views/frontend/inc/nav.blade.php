  <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="{{ url('/') }}">
              <img src="{{ asset('frontend/image/logo.png') }}" alt="logo_salman" srcset="">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto me-3">
                  <li class="nav-item  mx-md-2">
                      <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="nav-item mx-md-2">
                      <a class="nav-link" href="#">facility</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          Services
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another action</a></li>
                          <li>
                              <hr class="dropdown-divider">
                          </li>
                          <li><a class="dropdown-item" href="#">Something else here</a></li>
                      </ul>
                  </li>
                  <li class="nav-item mx-md-2">
                      <a class="nav-link" href="#" aria-current="page">Testimonial</a>
                  </li>
              </ul>
              @guest
                  <!-- mobile-->
                  <form class="form-check-inline d-sm-block d-md-none">
                      <button class="btn btn-login btn-navbar-right my-2 my-sm-0" type="button"
                          onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                          Login</button>
                  </form>
                  <!-- dekstop-->
                  <form class="form-check-inline my-2 my-lg-0 d-none d-md-block">
                      <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button"
                          onclick="event.preventDefault(); location.href='{{ route('login') }}';">
                          Login</button>
                  </form>
              @endguest
              @auth
                  <!-- mobile-->
                  <form class="form-check-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
                      @csrf
                      <button class="btn btn-login btn-navbar-right my-2 my-sm-0">
                          Keluar</button>
                  </form>
                  <!-- dekstop-->
                  <form class="form-check-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}"
                      method="POST">
                      @csrf
                      <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4">
                          Keluar</button>
                  </form>
              @endauth
          </div>
      </nav>
  </div>

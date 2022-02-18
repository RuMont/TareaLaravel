<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">

    <button class="navbar-brand border-0 bg-transparent">
      <img src="../resources/img/square.png" alt="Logo" width="32" height="32">
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

        @if (Route::currentRouteName() != 'home')
          <li class="nav-item">
            <a class="nav-link active text-light" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
        @endif
        @auth
          @if (Auth::user()->is_admin == 1)
            <li class="nav-item">
              <a href="{{ url('/admin') }}" class="nav-link text-light">Admin Management</a>
            </li>
          @endif
        @endauth
        <li class="nav-item">
          <button class="nav-link border-0 bg-transparent text-light">About</button>
        </li>

      </ul>
    </div>
    <div class="d-flex">
      @auth
        @if (Route::currentRouteName() != 'readtable')
          <a href="{{ url('/readtable') }}" class="mx-1 btn btn-light">Table</a>
        @endif

        @if (Route::currentRouteName() != 'edit')
          <a href="{{ url('/edittable') }}" class="mx-1 btn btn-outline-light">Check</a>
        @endif

        <span class="text-light nav-link">{{ Auth::user()->email }}</span>
        <a href="{{ url('/logout') }}" class="btn btn-outline-danger">Logout</a>
      @else
        @if (Route::currentRouteName() == 'register')
          <a href="{{ url('/login') }}" class="btn btn-light">Sign In</a>

        @elseif (Route::currentRouteName() == 'login')
          <a href="{{ url('/register') }}" class="btn btn-light">Sign Up</a>

        @else
          <a href="{{ url('/login') }}" class="btn btn-light">Sign In</a>
          <a href="{{ url('/register') }}" class="ms-1 btn btn-outline-light">Sign Up</a>
        @endif
      @endauth
    </div>
  </div>
</nav>

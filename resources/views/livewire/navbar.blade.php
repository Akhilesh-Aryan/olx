<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" >
        <div class="container-fluid">
          <a class="navbar-brand ms-5" href="/">{{ $logo }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form action="{{ route('search') }}" method="POST" class="d-flex ms-auto">
              @csrf
              <input class="form-control me-2 ms-5" type="search" name="search" placeholder="Search" aria-label="Search" size="50">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto me-5">
              @if(session()->has('login'))
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle me-5" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  More
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Insert Categotry</a></li>
                  <li><a class="dropdown-item" href="{{ route('insert') }}">Insert Item</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
              </li>
              @else
              <li class="nav-item"><a href="{{ route('register') }}" class="nav-link btn">Register</a></li>
              <li class="nav-item"><a href="{{ route('login') }}" class="nav-link btn" >Login</a></li>
            @endif
            </ul>
          </div>
        </div>
      </nav>
</div>

<nav class="navbar">
  <a href="#" class="sidebar-toggler">
    <i data-feather="menu"></i>
  </a>
  <div class="navbar-content">
  <div class="m-2 ms-auto">

    @if(Auth::guard('mahasiswa')->check())
    <div class="btn-group">
      <button type="button" class="btn btn-light dropdown-toggle rounded-pill" data-bs-toggle="dropdown">
        <a style="font-size: small;">{{ Auth::guard('mahasiswa')->user()->nama }}</a>
      </button>
      <div class="dropdown-menu">
        <a href="/mhs/profile" class="dropdown-item">Profil</a>
        <form id="logout-form" action="{{ route('logout_mahasiswa') }}" method="post">
          @csrf  
          <a href="{{ route('logout_mahasiswa') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </form>
      </div>
    </div>
    @endif

    @if(Auth::guard('penjamin')->check())
    <div class="btn-group">
      <button type="button" class="btn btn-light dropdown-toggle rounded-pill" data-bs-toggle="dropdown">
      <a style="font-size: small;">{{ Auth::guard('penjamin')->user()->nama }}</a>
      </button>
      <div class="dropdown-menu">
        <a href="/penjamin/profile" class="dropdown-item">Profil</a>
        <form id="logout-form" action="{{ route('logout_penjamin') }}" method="post">
          @csrf  
          <a href="{{ route('logout_penjamin') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </form>
      </div>
    </div>
    @endif

    @if(Auth::guard('biro_kemahasiswaan')->check())
    <div class="btn-group">
      <button type="button" class="btn btn-light dropdown-toggle rounded-pill" st data-bs-toggle="dropdown">
        <a style="font-size: small;">{{ Auth::guard('biro_kemahasiswaan')->user()->nama }}</a>
      </button>
      <div class="dropdown-menu">
        <a href="/biro/profile" class="dropdown-item">Profil</a>
        <form id="logout-form" action="{{ route('logout_biro_kemahasiswaan') }}" method="post">
          @csrf  
          <a href="{{ route('logout_biro_kemahasiswaan') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        </form>
      </div>
    </div>
    @endif

    <!-- <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Admin</a>
        <div class="dropdown-menu dropdown-menu-end">
          <a href="#" class="dropdown-item">Logout</a>
        </div>
      </li>
    </ul> -->
  </div>
</nav>
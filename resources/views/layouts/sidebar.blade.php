<nav class="sidebar">
  <div class="sidebar-header" style="background-color: #38bbeb!important;">
    <a href="#" class="sidebar-brand">
      <!-- Outside<span>System</span> -->
      <img src="{{ asset('assets/images/LogoUNAI.webp') }}" alt="">
    </a>
    
    <div class="sidebar-toggler not-active" style="margin-left: 9px;">
      <span></span><span></span><span></span>
    </div>
  </div>
  
  <div class="sidebar-body" style="background-color: #38343c;">
    <ul class="nav" style="font-size: 14px">

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      {{-- MENU UNTUK PENJAMIN --}}

      {{-- @if ($auth_user->role == 'penjamin') --}}

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title"><small>Permohonan Tempat Tinggal</small></span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Persetujuan Mahasiswa</span>
        </a>
      </li>

      {{-- MENU UNTUK MAHASISWA --}}

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Permohonan Penjamin</span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Permohonan Tinggal</span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Absensi</span>
        </a>
      </li>

      {{-- MENU UNTUK MAHASISWA --}}

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Penjamin</span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
        <i class="link-icon" data-feather="user"></i>
          <span class="link-title"><small>Tempat Tinggal</small></span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Persetujuan Outside</span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Absensi Outside</span>
        </a>
      </li>

      {{-- LOGOUT --}}

      @if(Auth::guard('mahasiswa')->check())
      <form id="logout-form" action="{{ route('logout_mahasiswa') }}" method="post">
        @csrf
        <li class="nav-item py-3">
          <a href="{{ route('logout_mahasiswa') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
        </li>
      </form>
      @elseif(Auth::guard('penjamin')->check())
      <form id="logout-form" action="{{ route('logout_penjamin') }}" method="post">
        @csrf
        <li class="nav-item py-3">
          <a href="{{ route('logout_penjamin') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
        </li>
      </form>
      @elseif(Auth::guard('biro_kemahasiswaan')->check())
      <form id="logout-form" action="{{ route('logout_admin') }}" method="post">
        @csrf
        <li class="nav-item py-3">
          <a href="{{ route('logout_admin') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
          </a>
        </li>
      </form>
      @endif
    </ul>
  </div>
</nav>
<nav class="sidebar">
  <div class="sidebar-header" style="background-color: #38bbeb!important;">
    <a href="#" class="sidebar-brand">
      <!-- Outside<span>System</span> -->
      <img src="assets/images/LogoUNAI.webp " alt="">
    </a>
    <div class="sidebar-toggler not-active" style="margin-left: 9px;">
      <span></span><span></span><span></span>
    </div>
  </div>
  <div class="sidebar-body" style="background-color: #38343c;">
    <ul class="nav">

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
          <span class="link-title">Permohonan Tempat Tinggal</span>
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
          <span class="link-title">Persetujuan Tempat Tinggal</span>
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

      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="log-out"></i>
          <span class="link-title">Logout</span>
        </a>
      </li>
    </ul>
  </div>
</nav>
<nav class="sidebar">
  <div class="sidebar-header" style="background-color: #38bbeb!important;">
    <a href="#" class="sidebar-brand">
      <img src="{{ asset('assets/images/LogoUNAI.webp') }}" alt="">
    </a>
    
    <div class="sidebar-toggler not-active" style="margin-left: 2px; padding: 1px;">
      <span></span><span></span><span></span>
    </div>
  </div>
  
  <div class="sidebar-body" style="background-color: #38343c;">
    <ul class="nav">
      
      {{-- MENU UNTUK MAHASISWA --}}
      
      @if(Auth::guard('mahasiswa')->check())

      <li class="nav-item py-3">
        <a href="{{ url('/mhs/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="{{ url('/mhs/pengajuan-luar-asrama') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Pengajuan Luar Asrama</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="{{ url('/') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Permohonan Tinggal</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="{{ url('/mhs/absensi') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Absensi</span>
        </a>
      </li>
      
      <form id="logout-form" action="{{ route('logout_mahasiswa') }}" method="post">
        @csrf
        <li class="nav-item py-3">
          <a href="{{ route('logout_mahasiswa') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="link-icon" data-feather="log-out"></i>
            <span class="link-title">Logout</span>
          </a>
        </li>
      </form>
      
      {{-- MENU UNTUK PENJAMIN --}}
      
      @elseif(Auth::guard('penjamin')->check())

      <li class="nav-item py-3" style="font-size: 10px;">
        <a href="{{ url('/penjamin/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="/penjamin/permohonan-tempat-tinggal" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Data Permohonan</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="/penjamin/persetujuan-mahasiswa" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Persetujuan Mahasiswa</span>
        </a>
      </li>
      
      <form id="logout-form" action="{{ route('logout_penjamin') }}" method="post">
        @csrf
        <li class="nav-item py-3">
          <a href="{{ route('logout_penjamin') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="link-icon" data-feather="log-out"></i>
            <span class="link-title">Logout</span>
          </a>
        </li>
      </form>

      {{-- MENU UNTUK BIRO KEMAHASISWAAN --}}
      
      @elseif(Auth::guard('biro_kemahasiswaan')->check())

      <li class="nav-item py-3">
        <a href="{{ url('/biro/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="{{ route('biro_kemahasiswaan.daftar_penjamin') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Persetujuan Penjamin</span>
        </a>
      </li>

      <li class="nav-item py-3">
        <a href="/biro/persetujuan-luar-asrama" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Persetujuan Outside</span>
        </a>
      </li>
      
      <li class="nav-item py-3">
        <a href="/biro/absensi-tempat-tinggal" class="nav-link">
          <i class="link-icon" data-feather="edit"></i>
          <span class="link-title">Absensi Tempat Tinggal</span>
        </a>
      </li>
      
      <form id="logout-form" action="{{ route('logout_biro_kemahasiswaan') }}" method="post">
        @csrf
        <li class="nav-item py-3">
          <a href="{{ route('logout_biro_kemahasiswaan') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="link-icon" data-feather="log-out"></i>
            <span class="link-title">Logout</span>
          </a>
        </li>
      </form>

      @endif
    </ul>
  </div>
</nav>
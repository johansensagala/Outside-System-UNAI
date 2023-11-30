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

      <li class="nav-item py-3 {{ request()->is('mhs/dashboard') ? 'active' : '' }}">
        <a href="{{ url('/mhs/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item py-3 {{ request()->is('mhs/profile') ? 'active' : '' }}">
        <a href="{{ url('/mhs/profile') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Profile</span>
        </a>
      </li>
      
      @php
        $data_pengajuan = \App\Models\PengajuanLuarAsrama::where('id_mahasiswa', Auth::guard('mahasiswa')->id())->get();
        $data_pengajuan_terakhir = \App\Models\PengajuanLuarAsrama::where('id_mahasiswa', Auth::guard('mahasiswa')->id())
          ->latest('created_at')
          ->first();
      @endphp

      @if (!$data_pengajuan->isEmpty())
      <li class="nav-item py-3 {{ request()->is('data-pengajuan*') ? 'active' : '' }}">
        <a href="{{ url('/mhs/data-pengajuan') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Data Pengajuan</span>
        </a>
      </li> 
      @endif

      @if ($data_pengajuan->isEmpty() || 
          ($data_pengajuan_terakhir->status_penjamin == 'ditolak' && $data_pengajuan_terakhir->status != 'disetujui') ||
          $data_pengajuan_terakhir->status == 'ditolak')
          <li class="nav-item py-3 {{ request()->routeIs('pengajuan-luar-asrama*') ? 'active' : '' }}">
              <a href="{{ route('pengajuan-luar-asrama') }}" class="nav-link">
                  <i class="link-icon" data-feather="user"></i>
                  <span class="link-title">Pengajuan Luar Asrama</span>
              </a>
          </li>
      @endif
      
      @if ($data_pengajuan_terakhir->status == 'disetujui')
      <li class="nav-item py-3 {{ request()->is('mhs/absensi') ? 'active' : '' }}">
          <a href="{{ url('/mhs/absensi') }}" class="nav-link">
              <i class="link-icon" data-feather="clock"></i>
              <span class="link-title">Absensi</span>
          </a>
      </li>
      @endif

      @if(Auth::guard('mahasiswa')->user()->role == 1)

      <li class="nav-item py-3 {{ request()->is('mhs/daftar-absensi') ? 'active' : '' }}">
          <a href="{{ url('/mhs/daftar-absensi') }}" class="nav-link">
              <i class="link-icon" data-feather="clock"></i>
              <span class="link-title">Daftar Absensi</span>
          </a>
      </li>

      @endif
      
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
      
      <li class="nav-item py-3 {{ request()->is('penjamin/dashboard') ? 'active' : '' }}">
        <a href="{{ url('/penjamin/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item py-3 {{ request()->is('penjamin/profile') ? 'active' : '' }}">
        <a href="{{ url('/penjamin/profile') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Profile</span>
        </a>
      </li>

      @php
        $data_permohonan = \App\Models\PengajuanDataPenjamin::where('id_penjamin', Auth::guard('penjamin')->id())->get();
        $data_permohonan_terakhir = \App\Models\PengajuanDataPenjamin::where('id_penjamin', Auth::guard('penjamin')->id())
          ->latest('created_at')
          ->first();
      @endphp
      @if (!$data_permohonan->isEmpty())
      <li class="nav-item py-3 {{ request()->is('penjamin/data-permohonan*') ? 'active' : '' }}">
        <a href="/penjamin/data-permohonan" class="nav-link">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Data Permohonan</span>
        </a>
      </li>
      @endif

      @if ($data_permohonan->isEmpty() || $data_permohonan_terakhir->status == 'ditolak')
      <li class="nav-item py-3 {{ request()->is('penjamin/permohonan-tempat-tinggal*') ? 'active' : '' }}">
        <a href="/penjamin/permohonan-tempat-tinggal" class="nav-link">
          <i class="link-icon" data-feather="file"></i>
          <span class="link-title">Permohonan Penjamin</span>
        </a>
      </li>
      @endif
      
      <li class="nav-item py-3 {{ request()->is('penjamin/persetujuan-mahasiswa*') ? 'active' : '' }}">
        <a href="/penjamin/persetujuan-mahasiswa" class="nav-link">
          <i class="link-icon" data-feather="users"></i>
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

      <li class="nav-item py-3 {{ request()->is('biro/dashboard') ? 'active' : '' }}">
        <a href="{{ url('/biro/dashboard') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>

      <li class="nav-item py-3 {{ request()->is('biro/profile') ? 'active' : '' }}">
        <a href="{{ url('/biro/profile') }}" class="nav-link">
          <i class="link-icon" data-feather="table"></i>
          <span class="link-title">Profile</span>
        </a>
      </li>
      
      <li class="nav-item py-3 {{ request()->is('biro/formulir-penjamin*') ? 'active' : '' }}">
        <a href="{{ route('biro_kemahasiswaan.daftar_penjamin') }}" class="nav-link">
          <i class="link-icon" data-feather="user-check"></i>
          <span class="link-title">Persetujuan Penjamin</span>
        </a>
      </li>

      <li class="nav-item py-3 {{ request()->is('biro/daftar-mahasiswa*') ? 'active' : '' }}">
        <a href="{{ url('biro/daftar-mahasiswa') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Mahasiswa</span>
        </a>
      </li>
      
      <li class="nav-item py-3 {{ request()->is('biro/penjamin*') ? 'active' : '' }}">
        <a href="{{ url('biro/penjamin') }}" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">Penjamin</span>
        </a>
      </li>

      <li class="nav-item py-3 {{ request()->is('biro/persetujuan-luar-asrama*') ? 'active' : '' }}">
        <a href="{{ url('biro/persetujuan-luar-asrama') }}" class="nav-link">
          <i class="link-icon" data-feather="home"></i>
          <span class="link-title">Persetujuan Outside</span>
        </a>
      </li>
      
      {{-- <li class="nav-item py-3 {{ request()->is('biro/absensi-tempat-tinggal*') ? 'active' : '' }}">
        <a href="absensi-tempat-tinggal" class="nav-link">
          <i class="link-icon" data-feather="edit"></i>
          <span class="link-title">Absensi Tempat Tinggal</span>
        </a>
      </li> --}}
      
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
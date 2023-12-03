<div class="m-5 row" id="absensiTable">
    <div class="table-responsive col-md-8 mt-3">
        @if(Auth::guard('mahasiswa')->check())
        <form action="/mhs/daftar-absensi-mahasiswa" method="GET">
        @elseif(Auth::guard('biro_kemahasiswaan')->check())
        <form action="/biro/daftar-absensi-mahasiswa" method="GET">
        @endif
            @csrf
            <div class="row">
                <div class="col-md-10">
                    <input type="text" id="search" name="search" class="form-control mb-2" placeholder="Masukkan nama mahasiswa..."/>
                    @if (isset($tanggal_awal) && isset($tanggal_akhir))
                        <input type="hidden" name="tanggalAwal" value="{{ $tanggal_awal }}"/>
                        <input type="hidden" name="tanggalAkhir" value="{{ $tanggal_akhir }}"/>
                    @endif
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">
                        Cari
                    </button>
                </div>
            </div>
        </form>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = ($data_absen->currentPage() - 1) * $data_absen->perPage() + 1;
                @endphp
                @foreach ($data_absen as $absen)
                <tr>
                    <td class="align-middle">{{ $index }}</td>
                    <td class="align-middle">{{ $absen->mahasiswa->nim }}</td>
                    <td class="align-middle">{{ $absen->mahasiswa->nama }}</td>
                    <td class="align-middle">{{ $absen->created_at }}</td>
                    <td class="align-middle">
                        @if ($absen->kehadiran == 'Hadir')
                        <span class="bg-success p-2 rounded-3 text-white text-center">
                            Hadir
                        </span>
                        @elseif ($absen->kehadiran == 'Izin')
                        <span class="bg-warning p-2 rounded-3 text-white text-center">
                            Izin
                        </span>
                        @else
                        <span class="bg-danger p-2 rounded-3 text-white text-center">
                            Absen
                        </span>
                        @endif
                    </td>
                    @if(Auth::guard('mahasiswa')->check())
                    <td class="align-middle"><button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/daftar-absensi-mahasiswa/{{ $absen->id }}'">Detail</button></td>
                    @elseif(Auth::guard('biro_kemahasiswaan')->check())
                    <td class="align-middle"><button type="button" class="btn btn-primary" onclick="window.location.href='/biro/daftar-absensi-mahasiswa/{{ $absen->id }}'">Detail</button></td>
                    @endif
                </tr>
                @php
                    $index += 1;
                @endphp
                @endforeach
            </tbody>
        </table>
        <div class="mt-5 d-flex justify-content-center align-items-center">
            @if (isset($tanggal_awal) && isset($tanggal_akhir) && isset($search))
                {{ $data_absen->appends(['tanggalAwal' => $tanggal_awal, 'tanggalAkhir' => $tanggal_akhir, 'search' => $search])->links() }}
            @elseif (isset($tanggal_awal) && isset($tanggal_akhir))
                {{ $data_absen->appends(['tanggalAwal' => $tanggal_awal, 'tanggalAkhir' => $tanggal_akhir])->links() }}
            @elseif (isset($search))
                {{ $data_absen->appends(['search' => $search])->links() }}
            @else
                {{ $data_absen->links() }}
            @endif
        </div>
    </div>
    <div class="col-md-4 mt-3">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-center">Tanggal</h5>
                
                <div id="intervalTanggal">
                    @if(Auth::guard('mahasiswa')->check())
                    <form action="/mhs/daftar-absensi-mahasiswa" method="GET">
                    @elseif(Auth::guard('biro_kemahasiswaan')->check())
                    <form action="/biro/daftar-absensi-mahasiswa" method="GET">
                    @endif
                        @csrf
                        <label for="tanggalAwal" class="mb-1">Pilih Tanggal Awal Absensi</label>
                        <input type="text" name="tanggalAwal" id="tanggalAwal" class="form-control mb-2" value="{{ $tanggal_awal }}" placeholder="Pilih Tanggal"/>
                        <label for="tanggalAkhir" class="mb-1">Pilih Tanggal Akhir Absensi</label>
                        <input type="text" name="tanggalAkhir" id="tanggalAkhir" class="form-control mb-2" value="{{ $tanggal_akhir }}" placeholder="Pilih Tanggal"/>
                        <button type="submit" class="btn btn-primary" id="tetapkanIntervalTanggal">
                            Tetapkan
                        </button>
                    </form>
                </div>                                                            
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title text-center">Detail Absensi Semester</h5>
    
                <div id="grafik_absensi" class="row my-3 me-5 d-flex justify-content-center align-items-center">
                </div>
                
                <div>
                    <p>
                        Jumlah hadir: {{ $summary['hadir'] }}
                    </p>
                    <p>
                        Jumlah izin: {{ $summary['izin'] }}
                    </p>
                    <p>
                        Jumlah absen: {{ $summary['absen'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    
</div>

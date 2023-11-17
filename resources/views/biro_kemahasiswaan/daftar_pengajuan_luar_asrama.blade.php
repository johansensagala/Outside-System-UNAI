{{-- @extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
    
<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PERMOHONAN PENJAMINAN
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Detail</th>
                                        <th>Status Penjaminan</th>
                                        <th>Status Luar Asrama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($daftar_pengajuan_mahasiswa as $pengajuan_mahasiswa)
                                    <tr>
                                        <td class="align-middle">{{ $index }}</td>
                                        <td class="align-middle">{{ $pengajuan_mahasiswa->mahasiswa->nama }}</td>
                                        <td class="align-middle">{{ $pengajuan_mahasiswa->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td class="align-middle">
                                                <a href="/penjamin/persetujuan-mahasiswa/{{ $pengajuan_mahasiswa->id }}" class="btn btn-primary">Detail</a>
                                            </td>
                                            @if ($pengajuan_mahasiswa->status_penjamin == 'disetujui')
                                            <td class="align-middle">
                                                <span class="bg-success p-2 rounded-3 text-white text-center">
                                                    Disetujui
                                                    </span>
                                                </td>
                                            @elseif ($pengajuan_mahasiswa->status_penjamin == 'ditolak')
                                                <td class="align-middle">
                                                    <span class="bg-danger p-2 rounded-3 text-center">
                                                        Ditolak
                                                    </span>
                                                </td>
                                                @else
                                                <td class="align-middle">
                                                    <span class="bg-warning p-2 rounded-3 text-white text-center">
                                                        Pending
                                                    </span>
                                                </td>
                                                @endif
                                            @if ($pengajuan_mahasiswa->status == 'disetujui')
                                                <td class="align-middle">
                                                    <span class="bg-success p-2 rounded-3 text-white text-center">
                                                        Disetujui
                                                    </span>
                                                </td>
                                                @elseif ($pengajuan_mahasiswa->status == 'ditolak')
                                                <td class="align-middle">
                                                    <span class="bg-danger p-2 rounded-3 text-white text-center">
                                                        Ditolak
                                                    </span>
                                                </td>
                                                @else
                                                <td class="align-middle">
                                                    <span class="bg-warning p-2 rounded-3 text-white text-center">
                                                        Pending
                                                    </span>
                                                </td>
                                                @endif
                                            </tr>
                                            @php
                                            $index++;
                                            @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($daftar_pengajuan_mahasiswa->count() === 0)
                                <h4 class="my-4 text-center fw-bold">
                                    Belum ada mahasiswa
                                </h4>
                            @endif                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection --}}


@extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')

<div class="row common-font-color">
    <div class="stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PENGAJUAN LUAR ASRAMA
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                    <div class="row">
                            <div class="col-6">
                                <form action="/biro/formulir-penjamin">
                                    <div class="input-group mb-3">
                                        <!-- <input type="text" class="form-control" placeholder="Masukkan nama penjamin..." name="search" id="search" value="{{ request('search') }}"> -->
                                        <input type="text" class="form-control" placeholder="Masukkan nama penjamin..." name="search" id="search">
                                    </div>
                                </form>
                            </div>
                            <div class="col-2">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Status Tinggal</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Absen">Absen</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Status Persetujuan</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Absen">Absen</option>
                                </select>
                            </div>
                            <div class="col-2">
                                <input type="date" class="form-control" id="tanggal_absensi" name="tanggal_absensi">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jurusan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status Tinggal</th>
                                        <th>Status Penjaminan</th>
                                        <th>Status Luar Asrama</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle">1</td>
                                        <td class="align-middle">2081011</td>
                                        <td class="align-middle">Jacqueline Josephine Shita Sulistiono</td>
                                        <td class="align-middle">Teknik Informatika</td>
                                        <td class="align-middle">16/11/2023</td>
                                        <td class="align-middle">Bersama orang tua/wali</td>
                                        <td class="align-middle">
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Disetujui
                                            </span>        
                                        </td>
                                        <td class="align-middle">
                                            <span class="bg-warning p-2 rounded-3 text-white text-center">
                                                Menunggu Persetujuan
                                            </span>        
                                        </td>
                                        <td class="align-middle"><button type="button" class="btn btn-primary">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">2</td>
                                        <td class="align-middle">2081012</td>
                                        <td class="align-middle">Tika Panggabean</td>
                                        <td class="align-middle">Sistem Informasi</td>
                                        <td class="align-middle">15/11/2023</td>
                                        <td class="align-middle">Bersama saudara kandung</td>
                                        <td class="align-middle">
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Disetujui
                                            </span>        
                                        </td>
                                        <td class="align-middle">
                                            <span class="bg-warning p-2 rounded-3 text-white text-center">
                                                Menunggu Persetujuan
                                            </span>        
                                        </td>
                                        <td class="align-middle"><button type="button" class="btn btn-primary">Detail</button></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle">3</td>
                                        <td class="align-middle">2081061</td>
                                        <td class="align-middle">Choky Sitohang</td>
                                        <td class="align-middle">Filsafat</td>
                                        <td class="align-middle">12/11/2023</td>
                                        <td class="align-middle">Skripsi</td>
                                        <td class="align-middle"></td>
                                        <td class="align-middle">
                                            <span class="bg-warning p-2 rounded-3 text-white text-center">
                                                Menunggu Persetujuan
                                            </span>        
                                        </td>
                                        <td class="align-middle"><button type="button" class="btn btn-primary">Detail</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- <div class="col-md-4 grid-margin">
        <div class="card">
            <div class="card-header text-center">
                Tanggal         
    <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-header text-center">
                        Status Permohonan Tempat Tinggal
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">                            
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Disetujui
                            </div>

                            
                            <div class="bg-danger p-2 rounded-3 text-white text-center">
                                Ditolak
                            </div>


                            <div class="bg-warning p-2 rounded-3 text-white text-center">
                                Menunggu Persetujuan
                            </div>
                            
                        </li>
                    </ul>
                    <input type="date" class="form-control" id="tanggal_absensi" name="tanggal_absensi">
                </div>
            </div>
            <input type="date" class="form-control" id="tanggal_absensi" name="tanggal_absensi">
        </div>
    </div> -->
</div>

@endsection

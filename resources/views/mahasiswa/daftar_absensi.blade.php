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
                            Absensi Mahasiswa Outside
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        {{-- <div class="row">
                            <div class="col-10">
                                <form action="/biro/formulir-penjamin">
                                    <div class="input-group mb-3">
                                        <!-- <input type="text" class="form-control" placeholder="Masukkan nama penjamin..." name="search" id="search" value="{{ request('search') }}"> -->
                                        <input type="text" class="form-control" placeholder="NIM atau Nama Mahasiswa..." name="search" id="search">
                                    </div>
                                </form>
                            </div>
                            <div class="col-2">
                                <select name="status" id="status" class="form-control form-select">
                                    <option value="">Status Absensi</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Absen">Absen</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Detail</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1
                                    @endphp
                                    @foreach ($data_absen as $absen)
                                    <tr>
                                        <td class="align-middle">{{ $index }}</td>
                                        <td class="align-middle">{{ $absen->mahasiswa->nim }}</td>
                                        <td class="align-middle">{{ $absen->mahasiswa->nama }}</td>
                                        <td class="align-middle"><button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/daftar-absensi/{{ $absen->id }}'">Detail</button></td>
                                        <td class="align-middle">{{ $absen->created_at }}</td>
                                        <td class="align-middle">
                                            @if ($absen->kehadiran == 'hadir')
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>
                                            @else
                                            <span class="bg-danger p-2 rounded-3 text-white text-center">
                                                Absen
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @php
                                        $index += 1;
                                    @endphp
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

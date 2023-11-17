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
                    <div class="row">
                            <div class="col-8">
                                <form action="/biro/formulir-penjamin">
                                    <div class="input-group mb-3">
                                        <!-- <input type="text" class="form-control" placeholder="Masukkan nama penjamin..." name="search" id="search" value="{{ request('search') }}"> -->
                                        <input type="text" class="form-control" placeholder="NIM atau Nama Mahasiswa..." name="search" id="search">
                                    </div>
                                </form>
                            </div>
                            <div class="col-2">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Status Absensi</option>
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
                                        <th>Detail</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>2081011</td>
                                        <td>Jacqueline Josephine Shita Sulistiono</td>
                                        <td><button type="button" class="btn btn-primary" onclick="window.location.href='/biro/absensi-tempat-tinggal/1'">Detail</button></td>
                                        <td>16/11/2023</td>
                                        <td>
                                            <span class="bg-danger p-2 rounded-3 text-white text-center">
                                                Absen
                                            </span>        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2021001</td>
                                        <td>Wesley Suwanda Panjaitan</td>
                                        <td><button type="button" class="btn btn-primary" onclick="window.location.href='/biro/absensi-tempat-tinggal/1'">Detail</button></td>
                                        <td>10/11/2023</td>
                                        <td>
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>        
                                        </td>
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

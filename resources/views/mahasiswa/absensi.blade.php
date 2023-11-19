@extends('layouts.main')
<title>UNAI Outside System | Absensi</title>

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
                    <div class="row mx-auto">
    <div class="col-9 row d-flex justify-content-center align-items-center">
        <button type="button" class="btn btn-primary">Absen Sekarang</button>
    </div>
    <div class="col-3">
        <input type="date" class="form-control" id="tanggal_absensi" name="tanggal_absensi">
    </div>
</div>
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Detail</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>16/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
                                        <td>
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>15/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
                                        <td>
                                            <span class="bg-danger p-2 rounded-3 text-white text-center">
                                                Absen
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>14/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
                                        <td>
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>13/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
                                        <td>
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>12/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
                                        <td>
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>11/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
                                        <td>
                                            <span class="bg-success p-2 rounded-3 text-white text-center">
                                                Hadir
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>10/11/2023</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href='/mhs/absensi/1/1/1'">Detail</button>
                                        </td>
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

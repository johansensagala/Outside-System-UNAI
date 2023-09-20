@extends('layouts.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
            <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
            <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
        </div>
        <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="printer"></i>
            Print
        </button>
        <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
            <i class="btn-icon-prepend" data-feather="download-cloud"></i>
            Download Report
        </button>
    </div>
</div>

<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="col-md-8 grid-margin">

                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PERMOHONAN TEMPAT TINGGAL
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Alamat Domisili</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-floating">
                                    <textarea id="alamatDomisili" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">Alamat Domisili</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Foto Tempat Tinggal</label>
                            </div>
                            <div class="col-md-8">
                                <img id="preview" class="img-fluid my-3" src="#" alt="Preview" style="display: none; max-width: 200px; max-height: 200px;">
                                <input type="file" class="form-control" id="fotoTempatTinggal" name="image" onchange="previewImage(event)">                
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="gpsPenjamin">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Lokasi</label>
                            </div>
                            <div class="col-md-8">
                                <div class="loading text-center">
                                    <p>Melacak lokasi</p>
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                    <i class="fas fa-spinner fa-spin"></i>
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    
                                </div>
                                <div class="container">
                                    <h1 class="status"></h1>
                                    <!-- <button class="find-state">Find States</button> -->
                                </div>
                            
                                <div class="latitude d-none"></div>
                                <div class="longitude d-none"></div>
                            
                                <!-- <script src="https://maps.googleapis.com/maps/api/js?key=API_KEY"></script> -->
                            
                                <script src="{{ asset('js/location.js') }}"></script>
                            
                                <div id="googleMap" class="" style="width:100%;height:400px;"></div>
                            </div>                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <button id="simpanPermohonan" type="button" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"></path>
                                        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"></path>
                                    </svg>
                                    Simpan
                                </button>
                                <div>
                                    <small id="notAllowed" class="text-danger d-none">Anda harus menyalakan GPS untuk mengakses formulir ini!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-header text-center">
                        Status Permohonan Tempat Tinggal
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="bg-warning p-2 rounded-3 text-white text-center">
                                Belum Disetujui
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div> <!-- row -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTs7j_Y6pVttaqzlWJ9T-U98X40tWXnoc"></script>
<script src="{{ asset('js/location.js') }}"></script>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
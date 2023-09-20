@extends('layouts.main')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')

<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="col-md-8 grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PENJAMIN
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-end">
                                Nama Penjamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                Jay Idoan Sihotang
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-end">
                                Status Penjamin Penjamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                Staff/Dosen
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 text-end">
                                Nomor Telepon Penjamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                081234567890
                            </div>
                        </div>
                    </div><hr>
                </div>

                <div class="card bs-gray-200 fw-bold mt-5">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PERMOHONAN TEMPAT TINGGAL PENJAMIN
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-end">
                                Alamat Domisili
                            </div>
                            <div class="col-md-6 fw-bold">
                                Jay Idoan Sihotang
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-end">
                                Status Penjamin Penjamin
                            </div>
                            <div class="col-md-6 fw-bold">
                                Staff/Dosen
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-end">
                                Nomor Telepon Penjamin
                            </div>
                            <div class="col-md-6 fw-bold">
                                081234567890
                            </div>
                        </div>
                    </div><hr>
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
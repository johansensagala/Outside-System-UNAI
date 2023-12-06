@extends('layouts.main')
<title>UNAI Outside System</title>

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
                            <div class="col-md-4">
                                Nama Penjamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $penjamin->nama }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Telepon Penjamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $penjamin->nomor_telp }}
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
                            <div class="col-md-4">
                                Alamat Domisili
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $data_tempat_tinggal->alamat }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Foto Tempat Tinggal
                            </div>
                            <div class="col-md-8 fw-bold">
                                <button type="button" class="btn btn-warning fw-bold text-white" data-bs-toggle="modal" data-bs-target="#modalFotoTempatTinggal">
                                    <i class="link-icon" data-feather="eye"></i>
                                    &nbsp;Lihat Foto
                                </button>
                                 
                                <div class="modal fade" id="modalFotoTempatTinggal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Tempat Tinggal Penjamin</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if(file_exists(public_path('storage/' . $data_tempat_tinggal->foto_tempat_tinggal)))
                                                    <img id="myImg" src="{{ asset('storage/' . $data_tempat_tinggal->foto_tempat_tinggal) }}" alt="Foto Tempat penjamin" style="width: 100%; height: auto;">
                                                @else
                                                    {{-- HANYA INI YANG DIPAKAI DI PRODUCTION --}}
                                                    <img id="myImg" src="{{ $data_tempat_tinggal->foto_tempat_tinggal }}" alt="Foto Tempat penjamin" style="width: 100%; height: auto;">
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Foto Kartu Keluarga
                            </div>
                            <div class="col-md-8 fw-bold">
                                <button type="button" class="btn btn-warning fw-bold text-white" data-bs-toggle="modal" data-bs-target="#modalFotoKartuKeluarga">
                                    <i class="link-icon" data-feather="eye"></i>
                                    &nbsp;Lihat Foto
                                </button>
                                 
                                <div class="modal fade" id="modalFotoKartuKeluarga" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Tempat Tinggal Penjamin</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                @if(file_exists(public_path('storage/' . $data_tempat_tinggal->foto_kartu_keluarga)))
                                                    <img id="myImg" src="{{ asset('storage/' . $data_tempat_tinggal->foto_kartu_keluarga) }}" alt="Foto Tempat penjamin" style="width: 100%; height: auto;">
                                                @else
                                                    {{-- HANYA INI YANG DIPAKAI DI PRODUCTION --}}
                                                    <img id="myImg" src="{{ $data_tempat_tinggal->foto_kartu_keluarga }}" alt="Foto Tempat penjamin" style="width: 100%; height: auto;">
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Lokasi  
                            </div>
                            <div class="col-md-8 fw-bold">
                                <div class="container">
                                    <h1 class="status"></h1>
                                </div>
                            
                                <div class="latitude d-none"></div>
                                <div class="longitude d-none"></div>
                            
                                <div id="googleMap" class="" style="width:100%;height:400px;"></div>
                                <div>
                                    <a class="btn btn-primary mt-3" href="https://www.google.com/maps?q={{ $data_tempat_tinggal->latitude }},{{ $data_tempat_tinggal->longitude }}" target="_blank">Buka di Google Maps</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 fw-bold">
                                @if ($data_tempat_tinggal->status === 'pending')
                                    <form method="post" id="formSetujui" action="/biro/formulir-penjamin/{{ $data_tempat_tinggal->id }}/setujui" style="display: inline;">
                                        @csrf
                                        <button type="submit" id="btnSetujui" class="btn btn-success"><i class="link-icon" data-feather="check"></i>&nbsp;Setujui</button>
                                    </form>
                                    <button class="btn btn-danger" id="btnTampilkanTolak"><i class="link-icon" data-feather="x"></i>&nbsp;Tolak</button>
                                @else
                                    <form method="post" id="formBatalkan" action="/biro/formulir-penjamin/{{ $data_tempat_tinggal->id }}/batalkan" style="display: inline;">
                                        @csrf
                                        <button type="submit" id="btnBatalkan" class="btn btn-danger"><i class="link-icon" data-feather="slash"></i>&nbsp;Batalkan</button>
                                    </form>
                                @endif
                            </div>
                        </div><hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 fw-bold mb-4">
                            <div class="col-9" id="tolakForm" style="display: none;">
                                <form method="post" id="formTolak" action="/biro/formulir-penjamin/{{ $data_tempat_tinggal->id }}/tolak" style="display: inline;">
                                    @csrf
                                    <textarea class="form-control" name="comment" rows="3"></textarea>
                                    <button type="submit" id="btnTolak" class="btn btn-danger mt-3">Tolak</button>
                                </form>
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
                            @if ($data_tempat_tinggal->status === 'disetujui')
                            
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Disetujui
                            </div>

                            @elseif ($data_tempat_tinggal->status === 'ditolak')
                            
                            <div class="bg-danger p-2 rounded-3 text-white text-center">
                                Ditolak
                            </div>

                            @else

                            <div class="bg-warning p-2 rounded-3 text-white text-center">
                                Menunggu Persetujuan
                            </div>
                            
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="card mt-2">
                    @if($data_tempat_tinggal->status != 'pending')
                    <div class="card-header text-center">
                        Komentar
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($data_tempat_tinggal->status === 'disetujui')
                            
                            <div class="row">
                                <small>
                                    Data penjamin telah disetujui.
                                </small>
                                <small>
                                    Kode penjamin: <strong>{{ $data_tempat_tinggal->kode_penjamin }}</strong>
                                </small>
                            </div>

                            @elseif ($data_tempat_tinggal->status === 'ditolak')
                            
                            <small>
                                {{ $data_tempat_tinggal->comment }}
                            </small>

                            @endif
                        </li>
                    </ul>
                    @endif
                </div>

            </div>
            
            
        </div>   
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub2pKear-jyRCDPs60bPSWIUANAi3UCo"></script>
<script>
    let latitude = {{ $data_tempat_tinggal->latitude }};
    let longitude = {{ $data_tempat_tinggal->longitude }};

    initMap();

    function initMap() {
        let myLatLng = { lat: latitude, lng: longitude };

        let map = new google.maps.Map(document.getElementById('googleMap'), {
            zoom: 14,
            center: myLatLng
        });

        let marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Lokasi saya'
        });
    }

    // Tampilkan form Tolak

    document.addEventListener("DOMContentLoaded", function () {
        const btnTolak = document.getElementById("btnTampilkanTolak");
        const tolakForm = document.getElementById("tolakForm");

        btnTolak.addEventListener("click", function () {
            tolakForm.style.display = "block";
        });
    });

    // Sweet Alert

    window.addEventListener("load", function () {
        const btnSetujui = document.getElementById("btnSetujui");
        const formSetujui = document.getElementById("formSetujui");
        const btnTolak = document.getElementById("btnTolak");
        const formTolak = document.getElementById("formTolak");
        const btnBatalkan = document.getElementById("btnBatalkan");
        const formBatalkan = document.getElementById("formBatalkan");
        const tolakForm = document.getElementById("tolakForm");
        
        @if ($data_tempat_tinggal->status != 'pending')
        btnBatalkan.addEventListener("click", function (event) {
            event.preventDefault();
            
            Swal.fire({
                title: "Yakin Ingin Membatalkan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    formBatalkan.submit();
                }
            });
        });

        @else
        btnSetujui.addEventListener("click", function (event) {
            event.preventDefault();
            
            Swal.fire({
                title: "Yakin Ingin Menyetujui?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    formSetujui.submit();
                }
            });
        });

        btnTolak.addEventListener("click", function (event) {
            event.preventDefault();
            
            Swal.fire({
                title: "Yakin Ingin Menolak?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
            }).then((result) => {
                if (result.isConfirmed) {
                    formTolak.submit();
                }
            });
        });
        @endif

        // Tampilkan form Tolak

        const btnTampilkanTolak = document.getElementById("btnTampilkanTolak");

        btnTampilkanTolak.addEventListener("click", function () {
            tolakForm.style.display = "block";
            btnTampilkanTolak.style.display = "none";
        });
    });

</script>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
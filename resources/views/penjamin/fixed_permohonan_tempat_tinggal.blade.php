@extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
<div class="row common-font-color">
    <div class="col-md-12 stretch-card">
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
                                Alamat
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $data_tempat_tinggal->alamat }}
                            </div>
                        </div>
                    </div>
                    @if ($data_tempat_tinggal->status == 'disetujui')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Batas mahasiswa yang dijamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $data_tempat_tinggal->kapasitas }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Jumlah mahasiswa yang sudah dijamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $jumlah_pengajuan_penjamin_disetujui }}
                            </div>
                        </div>
                    </div>
                    @endif
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
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
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
                                <div>
                                    <a class="btn btn-danger mt-3" href="/penjamin/ubah-tempat-tinggal/{{ $data_tempat_tinggal->id }}">Ubah Data</a>
                                </div>
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
                                    Data anda telah disetujui, anda sekarang dapat menjamin mahasiswa, berikan kode ini ke mahasiswa yang ingin anda jamin.
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
<script src="{{ asset('js/imgPreview.js') }}"></script>
<script>
    document.getElementById('autoclose').addEventListener('change', function() {
        var simpanButton = document.getElementById('simpanButton');
        simpanButton.disabled = !this.checked;
    });
</script>

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
        const btnTolak = document.getElementById("btnTolak");
        const tolakForm = document.getElementById("tolakForm");

        btnTolak.addEventListener("click", function () {
            tolakForm.style.display = "block";
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
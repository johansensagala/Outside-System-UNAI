@extends('layouts.main')
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
                            DETAIL ABSENSI
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Nama
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $data_absen->mahasiswa->nama }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                NIM
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $data_absen->mahasiswa->nim }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Tanggal & Waktu Absen
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $data_absen->created_at }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Alamat Tempat Tinggal
                            </div>
                            <div class="col-md-8 fw-bold">
                                <div class="container">
                                    <h1 class="status"></h1>
                                </div>
                                
                                <div class="latitude d-none"></div>
                                <div class="longitude d-none"></div>
                                
                                <div id="googleMapAlamat" class="" style="width:100%;height:400px;"></div>
                                <div>
                                    <a class="btn btn-primary mt-3" href="https://www.google.com/maps" target="_blank">Buka di Google Maps</a>
                                </div>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub2pKear-jyRCDPs60bPSWIUANAi3UCo"></script>
                                <script>
                                    let latitudeAlamat = {{ $latitude}};
                                    let longitudeAlamat = {{ $longitude }};
                                
                                    initMapAlamat();
                                    
                                    function initMapAlamat() {
                                        let myLatLngAlamat = { lat: latitudeAlamat, lng: longitudeAlamat };
                                        let mapAlamat = new google.maps.Map(document.getElementById('googleMapAlamat'), {
                                            zoom: 14,
                                            center: myLatLngAlamat
                                        });
                                        
                                        let markerAlamat = new google.maps.Marker({
                                            position: myLatLngAlamat,
                                            map: mapAlamat,
                                            title: 'Lokasi Alamat Tempat Tinggal'
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Lokasi Absen
                            </div>
                            <div class="col-md-8 fw-bold">
                                <div class="container">
                                    <h1 class="status"></h1>
                                </div>
                                
                                <div class="latitude d-none"></div>
                                <div class="longitude d-none"></div>
                                
                                <div id="googleMapAbsen" class="" style="width:100%;height:400px;"></div>
                                <div>
                                    <a class="btn btn-primary mt-3" href="https://www.google.com/maps" target="_blank">Buka di Google Maps</a>
                                </div>
                                <script>
                                    let latitudeAbsen = {{ $data_absen->latitude }};
                                    let longitudeAbsen = {{ $data_absen->longitude }};

                                    initMapAbsen();
                                    
                                    function initMapAbsen() {
                                        let myLatLngAbsen = { lat: latitudeAbsen, lng: longitudeAbsen };
                                        let mapAbsen = new google.maps.Map(document.getElementById('googleMapAbsen'), {
                                            zoom: 14,
                                            center: myLatLngAbsen
                                        });
                                        
                                        let markerAbsen = new google.maps.Marker({
                                            position: myLatLngAbsen,
                                            map: mapAbsen,
                                            title: 'Lokasi Absen'
                                        });
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Foto Opsional
                            </div>
                            <div class="col-md-8 fw-bold">
                                <button type="button" class="btn btn-warning fw-bold text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="link-icon" data-feather="eye"></i>
                                    &nbsp;Lihat Foto
                                </button>
                                    
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Tempat Tinggal Penjamin</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img id="myImg" src="{{ asset('storage/' . $data_absen->foto) }}" alt="Snow" style="width: 100%; height: auto;">
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
                                Status Kehadiran
                            </div>
                            <div class="col-md-8 fw-bold">
                                <div class="form-check form-switch">
                                    <span class="bg-success p-2 rounded-3 text-white text-center">
                                        {{ $data_absen->kehadiran }}
                                    </span>
                                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" checked>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            
        </div>   
    </div>
</div> <!-- row -->

<script>
    // let latitude = -6.807741;
    // let longitude = 107.577888;
    // let latitude2 = -6.804674;
    // let longitude2 = 107.571838;

    // initMap();

    // function initMap() {
    //     let myLatLng = { lat: latitude, lng: longitude };

    //     let map = new google.maps.Map(document.getElementById('googleMap'), {
    //         zoom: 14,
    //         center: myLatLng
    //     });

    //     let marker = new google.maps.Marker({
    //         position: myLatLng,
    //         map: map,
    //         title: 'Lokasi saya'
    //     });
    // }

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
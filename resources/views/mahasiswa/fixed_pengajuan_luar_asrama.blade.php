@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')
    
<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="col-md-8 grid-margin">

                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PENGAJUAN LUAR ASRAMA
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="/mhs/pengajuan-luar-asrama" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Jurusan
                                </div>
                                <div class="col-md-8 fw-bold">
                                    {{ $data_pengajuan_outside->jurusan }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Status Tinggal
                                </div>
                                <div class="col-md-8 fw-bold">
                                    {{ $data_pengajuan_outside->status_tinggal }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Surat Pernyataan Ketersediaan
                                </div>
                                <div class="col-md-8 fw-bold">
                                    <a href="{{ asset('storage/' . $data_pengajuan_outside->surat_outside) }}" download>Klik untuk unduh</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Tahun Ajaran
                                </div>
                                <div class="col-md-8 fw-bold">
                                    {{ $data_pengajuan_outside->tahun_ajaran }}
                                </div>
                            </div>
                        </div>
                        @if ($data_pengajuan_outside->foto_tempat_tinggal)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Foto Tempat Tinggal
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
                                                    <img id="myImg" src="{{ asset('storage/' . $data_pengajuan_outside->foto_tempat_tinggal) }}" alt="Foto Tempat penjamin" style="width: 100%; height: auto;">
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
                        @endif
                        @if ($data_pengajuan_outside->alamat)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Alamat
                                </div>
                                <div class="col-md-8 fw-bold">
                                    {{ $data_pengajuan_outside->alamat }}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($data_pengajuan_outside->surat_kebenaran)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Surat Kebenaran Skripsi/Married Students/Profesi Ners
                                </div>
                                <div class="col-md-8 fw-bold">
                                    <a href="{{ asset('storage/' . $data_pengajuan_outside->surat_outside) }}" download>Klik untuk unduh</a>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($data_pengajuan_outside->latitude && $data_pengajuan_outside->longitude)
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
                                        <a class="btn btn-primary mt-3" href="https://www.google.com/maps?q={{ $data_pengajuan_outside->latitude }},{{ $data_pengajuan_outside->longitude }}" target="_blank">Buka di Google Maps</a>
                                    </div>
                                </div>
                            </div>
                        </div><hr>    
                        @endif
                        @if ($data_pengajuan_outside->id_penjamin)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Nama Penjamin
                                </div>
                                <div class="col-md-8 fw-bold">
                                    {{ $data_pengajuan_penjamin->penjamin->nama }}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Alamat
                                </div>
                                <div class="col-md-8 fw-bold">
                                    {{ $data_pengajuan_penjamin->alamat }}
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
                                    
                                    <div id="googleMapPenjamin" class="" style="width:100%;height:400px;"></div>
                                    <div>
                                        <a class="btn btn-primary mt-3" href="https://www.google.com/maps?q={{ $data_pengajuan_penjamin->latitude }},{{ $data_pengajuan_penjamin->longitude }}" target="_blank">Buka di Google Maps</a>
                                    </div>
                                </div>
                            </div>
                        </div><hr>    
                        @endif   
                    </form>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-header text-center">
                        Status Persetujuan Penjamin
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($data_pengajuan_outside->status_penjamin === 'disetujui')
                            
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Disetujui
                            </div>

                            @elseif ($data_pengajuan_outside->status_penjamin === 'ditolak')
                            
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

                <div class="card mt-3">
                    <div class="card-header text-center">
                        Status Persetujuan Luar Asrama
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($data_pengajuan_outside->status === 'disetujui')
                            
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Disetujui
                            </div>

                            @elseif ($data_pengajuan_outside->status === 'ditolak')
                            
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
            </div>
            
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub2pKear-jyRCDPs60bPSWIUANAi3UCo"></script>
@if ($data_pengajuan_outside->id_penjamin)
<script>
    let latitude = {{ $data_pengajuan_penjamin->latitude }};
    let longitude = {{ $data_pengajuan_penjamin->longitude }};

    initMap();

    function initMap() {
        let myLatLng = { lat: latitude, lng: longitude };

        let map = new google.maps.Map(document.getElementById('googleMapPenjamin'), {
            zoom: 14,
            center: myLatLng
        });

        let marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Lokasi saya'
        });
    }
</script>
@else
<script>
    let latitude = {{ $data_pengajuan_outside->latitude }};
    let longitude = {{ $data_pengajuan_outside->longitude }};

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
</script>
@endif

@endsection

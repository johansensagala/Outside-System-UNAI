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
                            DATA MAHASISWA
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
                                {{ $pengajuan_luar_asrama->mahasiswa->nama }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                NIM
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $pengajuan_luar_asrama->mahasiswa->nim }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Jurusan
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $pengajuan_luar_asrama->jurusan }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Angkatan
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $pengajuan_luar_asrama->mahasiswa->angkatan }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Pribadi
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $pengajuan_luar_asrama->mahasiswa->nomor_pribadi }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Orang Tua/Wali
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $pengajuan_luar_asrama->mahasiswa->nomor_ortu_wali }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Status Tinggal
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $pengajuan_luar_asrama->status_tinggal }}
                            </div>
                        </div>
                    </div>
                    @if ($pengajuan_luar_asrama->id_penjamin)
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
                    </div>
                    @endif
                    @if ($pengajuan_luar_asrama->surat_outside)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Surat Pernyataan Kesediaan
                            </div>
                            <div class="col-md-8 fw-bold">
                                <a href="{{ asset('storage/' . $pengajuan_luar_asrama->surat_outside) }}" download>Klik untuk unduh</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if ($pengajuan_luar_asrama->surat_kebenaran)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Surat Kebenaran Skripsi/Profesi Ners/Married Student 
                            </div>
                            <div class="col-md-8 fw-bold">
                                <a href="{{ asset('storage/' . $pengajuan_luar_asrama->surat_kebenaran) }}" download>Klik untuk unduh</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 fw-bold">
                                @if ($pengajuan_luar_asrama->status === 'pending' || $pengajuan_luar_asrama->status === 'ditolak')
                                    <form method="post" action="/biro/persetujuan-luar-asrama/{{ $pengajuan_luar_asrama->id }}/setujui" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Setujui</button>
                                    </form>
                                @endif
                                @if ($pengajuan_luar_asrama->status === 'pending')
                                    <button class="btn btn-danger" id="btnTolak">Tolak</button>
                                @endif
                            </div>
                        </div><hr>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                @if ($pengajuan_luar_asrama->id_penjamin)
                <div class="card">
                    <div class="card-header text-center">
                        Status Penjaminan
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($pengajuan_luar_asrama->status_penjamin == 'disetujui')
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Disetujui
                            </div>
                            @elseif ($pengajuan_luar_asrama->status_penjamin == 'ditolak')
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Ditolak
                            </div>
                            @else
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Pending
                            </div>
                            @endif
                        </li>
                    </ul>

                </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        Status Persetujuan Luar Asrama
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            @if ($pengajuan_luar_asrama->status == 'disetujui')
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Disetujui
                            </div>
                            @elseif ($pengajuan_luar_asrama->status == 'ditolak')
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Ditolak
                            </div>
                            @else
                            <div class="bg-success p-2 rounded-3 text-white text-center">
                                Pending
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
@if ($pengajuan_luar_asrama->id_penjamin)
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
@endif

@endsection
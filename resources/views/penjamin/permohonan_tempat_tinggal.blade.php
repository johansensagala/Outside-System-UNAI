@extends('layouts.main')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
    <title>UNAI Outside System</title>
@endpush

@section('content')
<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">

                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PERMOHONAN TEMPAT TINGGAL
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="/penjamin/permohonan-tempat-tinggal" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Alamat Domisili</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-floating">
                                        <textarea id="alamat" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder=""></textarea>
                                        <label for="alamat">Alamat Domisili</label>
                                    </div>
                                    @error('alamat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Kapasitas</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('kapasitas') is-invalid @enderror" type="radio" name="kapasitas" id="kapasitas1" value="1">
                                        <label class="form-check-label" for="kapasitas1">
                                            Satu
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input @error('kapasitas') is-invalid @enderror" type="radio" name="kapasitas" id="kapasitas2" value="2">
                                        <label class="form-check-label" for="kapasitas2">
                                            Dua
                                        </label>
                                    </div>
                                    @error('kapasitas')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                    <input type="file" class="form-control @error('foto_tempat_tinggal') is-invalid @enderror" id="foto_tempat_tinggal" name="foto_tempat_tinggal" onchange="previewImage(event)">
                                    @error('foto_tempat_tinggal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
                                        <div class="spinner-border mt-3" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <h1 class="status"></h1>
                                    </div>                                                                                        
                                    <div id="googleMap" class="" style="width:100%;height:400px;"></div>

                                    <input type="hidden" id="latitude" name="latitude" value="">
                                    <input type="hidden" id="longitude" name="longitude" value="">

                                    @error('latitude')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    @error('longitude')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input type="hidden" name="autoclose" value="0">
                                        <input type="checkbox" class="form-check-input" id="autoclose" name="autoclose" value="1" {{ old('autoclose') ? 'checked' : '' }}>
                                        <label class="form-check-label form-label" for="autoclose">
                                            Posisi yang tertera di peta sudah sesuai dengan alamat saya
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-success" id="simpanButton" disabled>
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
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub2pKear-jyRCDPs60bPSWIUANAi3UCo"></script>
<script src="{{ asset('js/locationDetector.js') }}"></script>
<script src="{{ asset('js/imgPreview.js') }}"></script>
<script>
    document.getElementById('autoclose').addEventListener('change', function() {
        var simpanButton = document.getElementById('simpanButton');
        simpanButton.disabled = !this.checked;
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
@extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
    <title>UNAI Outside System</title>
@endpush

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
                    <form action="/penjamin/permohonan-tempat-tinggal" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="jurusan">Jurusan</label>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <select id="jurusan" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih Jurusan Anda</option>
                                            <option value="Akuntansi">Akuntansi</option>
                                            <option value="Bisnis Digital">Bisnis Digital</option>
                                            <option value="Farmasi">Farmasi</option>
                                            <option value="Ilmu Filsafat">Ilmu Filsafat</option>
                                            <option value="Ilmu Keperawatan">Ilmu Keperawatan</option>
                                            <option value="Manajemen">Manajemen</option>
                                            <option value="Pendidikan Bahasa Inggris">Pendidikan Bahasa Inggris</option>
                                            <option value="Pendidikan Matematika">Pendidikan Matematika</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Teknik Informatika">Teknik Informatika</option>
                                        </select>
                                    </div>
                                    @error('jurusan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="status_tinggal">Status Tinggal</label>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <select id="status_tinggal" name="status_tinggal" class="form-control @error('status_tinggal') is-invalid @enderror">
                                            <option value="" disabled selected>Pilih Status Tinggal Anda</option>
                                            <option value="Orang Tua">Bersama Orang Tua/Wali</option>
                                            <option value="Saudara">Bersama Saudara Kandung</option>
                                            <option value="Dosen">Bersama Staff/Dosen/Pensiunan</option>
                                            <option value="Married">Married Student</option>
                                            <option value="Profesi Ners">Profesi/Ners</option>
                                            <option value="Skripsi">Skripsi</option>
                                        </select>
                                    </div>
                                    @error('status_tinggal')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="surat_outside">Surat Pernyataan Ketersediaan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control @error('surat_outside') is-invalid @enderror" id="surat_outside" name="surat_outside" onchange="previewImage(event)">
                                </div>
                                <small>
                                    Silakan unduh template surat disini
                                </small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-success" id="simpanButton">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
                                            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"></path>
                                            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"></path>
                                        </svg>
                                        Simpan
                                    </button>
                                </div>
                            </div>
                        </div>    
                    </form>
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
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTs7j_Y6pVttaqzlWJ9T-U98X40tWXnoc"></script>
<script src="{{ asset('js/locationDetector.js') }}"></script>
<script src="{{ asset('js/imgPreview.js') }}"></script>
<script>
    document.getElementById('autoclose').addEventListener('change', function() {
        var simpanButton = document.getElementById('simpanButton');
        simpanButton.disabled = !this.checked;
    });
</script>

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
@endsection

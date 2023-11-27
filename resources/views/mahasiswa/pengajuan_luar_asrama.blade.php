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

            <div class="grid-margin">

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
                                    <label for="status_tinggal">Status Tinggal</label>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        <select id="status_tinggal" name="status_tinggal" class="form-select @error('status_tinggal') is-invalid @enderror">
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
                                        <small class="text-danger">{{ $message }}</small>
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
                                    @error('surat_outside')
                                        <small class="text-danger">{{ $message }}</small><br>
                                    @enderror
                                    <small>
                                        Silakan unduh template surat <a href="{{ asset('storage/form-kegiatan-kampus-outside_Template.docx') }}" download>disini</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-success" id="simpanButton">
                                        Berikutnya
                                    </button>
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

{{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub2pKear-jyRCDPs60bPSWIUANAi3UCo"></script> --}}
{{-- <script src="{{ asset('js/locationDetector.js') }}"></script> --}}
<script src="{{ asset('js/imgPreview.js') }}"></script>
{{-- <script>
    document.getElementById('autoclose').addEventListener('change', function() {
        var simpanButton = document.getElementById('simpanButton');
        simpanButton.disabled = !this.checked;
    });
</script> --}}

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
@endsection

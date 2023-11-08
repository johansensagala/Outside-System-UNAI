@extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
@endpush

@section('content')

<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="col-12 col-xl-12 stretch-card d-flex justify-content-between align-items-baseline">
              <div class="card" style="background-color: #FCF8E3; color: #9A8163; text-align:center; padding: 15">
                  <p style="font-size: 150%;">Selamat Datang di New Online System</p>
                  <p style="font-size: 125%;">UNIVERSITAS ADVENT INDONESIA</p>
                  <p style="font-size: 100%;">SEMESTER GANJIL 2023/2024</p>
              </div>
            </div>
          </div>
        </div>    
      </div>
      <div class="stretch-card">
        <div class="card">
          <div class="card-body" style="color: #767676;">
            <div class="row">
              <div class="item text-center mb-4">
                <h5 class="fw-bolder">INFORMASI PERIZINAN TINGGAL DI LUAR ASRAMA</h5>
              </div>
              <div class="content">
                <p>Mahasiswa yang diperbolehkan untuk tinggal diluar asrama hanya bagi mereka yang tinggal bersama dengan :</p>
                <ol>
                <li>Orang tua kandung.</li>
                <li>Saudara kandung.</li>
                <li>Staff atau dosen.</li>
                <li>Pensiunan staff atau dosen.</li>
                <li>Mahasiswa yang statusnya sudah menikah.</li>
                <li>Mahasiswa jurusan perawat yang sedang mengikuti profesi ners.</li>
                <li>Mahasiswa tingkat akhir yang tidak mempunyai mata kuliah selain skripsi.</li></ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->
@endsection

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
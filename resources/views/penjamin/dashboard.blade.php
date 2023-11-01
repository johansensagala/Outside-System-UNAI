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
      <div class="col-12 col-xl-6 stretch-card">
      <div class="card">
  <div class="card-body">
  <div class="item text-center">
                                    <h3>Visi</h3>
                                    <p>Menjadi universitas yang unggul di bidang pengajaran, penelitian, dan pengabdian
                                        kepada masyarakat, berdasarkan falsafah pendidikan Kristen Advent se
                                        Asia-Tenggara pada tahun 2025.</p>
                                </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
  </div>
</div>
</div>
    </div>
  </div>
</div> <!-- row -->
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
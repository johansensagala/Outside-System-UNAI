@extends('layouts.main')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
  <title>UNAI Outside System</title>
@endpush

@section('content')
<!-- Card 1 -->
<div class="row">
  <div class="col-12 col-xl-12 stretch-card">
    <div class="row flex-grow-1">
<!-- Card 1 -->
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card" style="border-left: 10px solid #31810E;">
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-12 col-xl-7 text-center">
                <h5 class="mb-0">Angkatan 2023</h6>
                <h3>{{ $mahasiswa_2023 }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #31810E">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Card 2 -->
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card" style="border-left: 10px solid #B71F1A;">
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-12 col-xl-7 text-center">
                <h5 class="mb-0">Angkatan 2022</h6>
                <h3>{{ $mahasiswa_2022 }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #B71F1A">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Card 3 -->
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card" style="border-left: 10px solid #f9c003;">
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-12 col-xl-7 text-center">
                <h5 class="mb-0">Angkatan 2021</h6>
                <h3>{{ $mahasiswa_2021 }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #f9c003">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
<!-- Card 4 -->
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card" style="border-left: 10px solid #1C4DBF;">
          <div class="card-body">
            <div class="row">
              <div class="col-6 col-md-12 col-xl-7 text-center">
                <h5 class="mb-0">2017-2020</h6>
                <h3>{{ $mahasiswa_2020 }}</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #1C4DBF">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> <!-- row -->

<div class="row">
  <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Mahasiswa Outside</h6>
        </div>
        <div id="grafik_jumlah_mahasiswa"></div>
      </div> 
    </div>
  </div>
  <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-center align-items-center mb-2 row">
          <h6 class="card-title mb-0 text-center fw-bold mb-3">Presentase Absensi</h6>
          <div id="grafik_kehadiran" class="row my-5 me-5 d-flex justify-content-center align-items-center">
          </div>
        </div>
        <div id="storageChart"></div>
        <div class="d-grid">
          <div>
              <select id="angkatan" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror">
                  <option value="" disabled selected>Pilih Angkatan</option>
                  <option value="2023">2023</option>
                  <option value="2022">2022</option>
                  <option value="2021">2021</option>
                  <option value="2017-2020">2017-2020</option>
              </select>
          </div>
          @error('angkatan')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      </div>
    </div>
  </div>  
</div>

<script>
        var options = {
          series: [{
          // Female

          name: 'Perempuan',
          data: [{{ $mahasiswa_2020_perempuan }}, {{ $mahasiswa_2021_perempuan }}, {{ $mahasiswa_2022_perempuan }}, {{ $mahasiswa_2023_perempuan }}]
        }, {
          // Male
          name: 'Laki-laki',
          data: [{{ $mahasiswa_2020_lakilaki }}, {{ $mahasiswa_2021_lakilaki }}, {{ $mahasiswa_2022_lakilaki }}, {{ $mahasiswa_2023_lakilaki }}]
        }],
          chart: {
          type: 'bar',
          height: 430
        },
        colors: ['#FF38A2', '#1472FF'],
        plotOptions: {
          bar: {
            horizontal: false,
            dataLabels: {
              position: 'top',
            },
          }
        },
        dataLabels: {
          enabled: true,
          style: {
            fontSize: '12px',
            colors: ['#fff']
          }
        },
        stroke: {
          show: true,
          width: 1,
          colors: ['#fff']
        },
        tooltip: {
          shared: true,
          intersect: false
        },
        xaxis: {
          categories: [2023, 2022, 2021, "2017-2020"],
        },
        labels: ['Laki-laki', 'Perempuan'],
        };

        var chart = new ApexCharts(document.querySelector("#grafik_jumlah_mahasiswa"), options);
        chart.render();

        var options = {
          series: [44, 55],
          chart: {
          width: 380,
          type: 'pie',
        },
        labels: ['Hadir', 'Absen'],
        colors:['#0f0', '#f00'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 360
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#grafik_kehadiran"), options);
        chart.render();
        </script>
@endsection
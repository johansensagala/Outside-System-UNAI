@extends('layouts.main')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
  <title>UNAI Outside System</title>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
  </div>
</div>

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
                <h3>250</h3>
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
                <h3>250</h3>
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
                <h3>250</h3>
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
                <h5 class="mb-0">Senior</h6>
                <h3>250</h3>
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
          <h6 class="card-title mb-0">Monthly sales</h6>
        </div>
        <p class="text-muted">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
        <div id="grafik_jumlah_mahasiswa"></div>
      </div> 
    </div>
  </div>
  <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-2 row">
          <h6 class="card-title mb-0 text-center fw-bold mb-3">Cloud storage</h6>
          <div id="grafik_kehadiran" class="my-5 d-flex justify-content-center align-items-center">
          </div>
        </div>
        <div id="storageChart"></div>
        <div class="d-grid">
          <button class="btn btn-primary">Upgrade storage</button>
        </div>
      </div>
    </div>
  </div>  
</div>

<script>
        var options = {
          series: [{
          // Female
          name: 'Laki-laki',
          data: [33, 34, 48, 56]
        }, {
          // Male
          name: 'Perempuan',
          data: [69, 29, 53, 61]
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
          categories: [2020, 2021, 2022, 2023],
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
              width: 200
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
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
      <!-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">New Customers</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">3,897</h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-success">
                    <span>+3.3%</span>
                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7 text-center">
              <span class="material-symbols-outlined" style="font-size: 50px; color:#6FD626">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<!-- Card 2 -->
      <!-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">New Orders</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">35,084</h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-danger">
                    <span> -2.8%</span>
                    <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7 text-center">
              <span class="material-symbols-outlined" style="font-size: 50px; color:#3AA3FF">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<!-- Card 3 -->
      <!-- <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Growth</h6>
            </div>
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
                <h3 class="mb-2">89.87%</h3>
                <div class="d-flex align-items-baseline">
                  <p class="text-success">
                    <span>+2.8%</span>
                    <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                  </p>
                </div>
              </div>
              <div class="col-6 col-md-12 col-xl-7 text-center">
              <span class="material-symbols-outlined" style="font-size: 50px; color:#FFB247">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div> -->
<!-- Card 4 -->
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Senior</h6>
            </div> -->
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
              <h6 class="card-title mb-0">Senior</h6>
                <h3 class="mb-">89.87%</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7 ps-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #6571FF">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Senior</h6>
            </div> -->
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
              <h6 class="card-title mb-0">Senior</h6>
                <h3 class="mb-">89.87%</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7 ps-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #6571FF">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <!-- <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Senior</h6>
            </div> -->
            <div class="row">
              <div class="col-6 col-md-12 col-xl-5">
              <h6 class="card-title mb-0">Senior</h6>
                <h3 class="mb-">89.87%</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-7 ps-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #6571FF">groups</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 grid-margin stretch-card">
        <div class="card border-start border-5">
          <div class="card-body">
            <!-- <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0">Senior</h6>
            </div> -->
            <div class="row">
              <div class="col-6 col-md-12 col-xl-7 text-center">
                <h5 class="mb-0">Angkatan 2023</h6>
                <h3>250</h3>
              </div>
              <div class="col-6 col-md-12 col-xl-5 text-center">
                <span class="material-symbols-outlined" style="font-size: 50px; color: #6571FF">groups</span>
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
        <div id="monthlySalesChart"></div>
      </div> 
    </div>
  </div>
  <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Cloud storage</h6>
          <div class="dropdown mb-2">
            <button class="btn btn-link p-0" type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
            </button>
          </div>
        </div>
        <div id="storageChart"></div>
        <div class="row mb-3">
          <div class="col-6 d-flex justify-content-end">
            <div>
              <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
              <h5 class="fw-bolder mb-0 text-end">8TB</h5>
            </div>
          </div>
          <div class="col-6">
            <div>
              <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
              <h5 class="fw-bolder mb-0">~5TB</h5>
            </div>
          </div>
        </div>
        <div class="d-grid">
          <button class="btn btn-primary">Upgrade storage</button>
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
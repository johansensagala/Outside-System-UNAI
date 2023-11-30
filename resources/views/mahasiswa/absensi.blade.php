@extends('layouts.main')
<title>UNAI Outside System | Absensi</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')

<div class="row common-font-color">
    <div class="stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            Absensi Mahasiswa Outside
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div id="mainAbsensi" class="row">
                            @include('mahasiswa._absensi')
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</div>

<script>

let grafik_absensi_semester;
let grafik_absensi_bulanan;
let chart_semester;
let chart_bulanan;

</script>

@endsection

@extends('layouts.main')
<title>UNAI Outside System</title>

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
                <div class="card" id="content">
                    @include('mahasiswa._daftar_absensi')
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    flatpickr("#tanggalAwal", {
        enableTime: false,
        dateFormat: "Y-m-d",
        onChange: function (selectedDates, dateStr, instance) {
            if (selectedDates.length > 0) {
                flatpickr("#tanggalAkhir").set("minDate", selectedDates[0]);
            }
        }
    });

    flatpickr("#tanggalAkhir", {
        enableTime: false,
        dateFormat: "Y-m-d",
    });
});

// Untuk grafik absensi

let grafik_absensi = {
    series: [{{ $summary['hadir'] }}, {{ $summary['izin'] }}, {{ $summary['absen'] }}],
    chart: {
        width: 300,
        type: 'pie',
    },
    labels: ['Hadir', 'Izin', 'Absen'],
    colors:['#0f0', '#ff0', '#f00'],
    responsive: [{
        breakpoint: 480,
        options: {
            chart: {
                width: 300
            },
            legend: {
                position: 'bottom'
            }
        }
    }]
};

chart = new ApexCharts(document.querySelector("#grafik_absensi"), grafik_absensi);
chart.render();
</script>

@endsection

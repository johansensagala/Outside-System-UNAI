<div id="absensiContent" class="col-md-8 table-responsive mt-3">
    {!! $absensi_content !!}                                
</div>
<div class="col-md-4 mt-3">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title text-center">Detail Absensi Semester</h5>

            <div id="grafik_absensi_semester" class="row my-3 me-5 d-flex justify-content-center align-items-center">
            </div>
            
            <div>
                <p>
                    Jumlah hadir: {{ $summary['hadir'] }}
                </p>
                <p>
                    Jumlah izin: {{ $summary['izin'] }}
                </p>
                <p>
                    Jumlah absen: {{ $summary['absen'] }}
                </p>
                <p class="text-danger">
                    Selalu ingat untuk melakukan absensi, tidak melakukan absensi akan terhitung sebagai absen
                </p>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title text-center">Detail Absensi Bulan </h5>

            @if (!is_null($selectedDate))
            <div id="absensiBulanan">
                <div id="grafik_absensi_bulanan" class="row my-3 me-5 d-flex justify-content-center align-items-center">
                </div>
                <div>
                    <p>
                        Jumlah hadir: {{ $summary_bulanan['hadir'] }}
                    </p>
                    <p>
                        Jumlah izin: {{ $summary_bulanan['izin'] }}
                    </p>
                    <p>
                        Jumlah absen: {{ $summary_bulanan['absen'] }}
                    </p>
                </div>
            </div>
            @endif

            <div class="my-3">
                <label for="bulanFilter" class="form-label">Pilih bulan:</label>
                <select id="bulanFilter" class="form-select">
                    @php
                        $sortedBulanTahun = $bulan_tahun_combinations->sortByDesc(function($item) {
                            return \Carbon\Carbon::createFromDate($item->tahun, $item->bulan, 1)->timestamp;
                        });
                    @endphp
            
                    @if (!is_null($selectedDate))
                        <option value="semua">Tampilkan semua</option>
                        @foreach($sortedBulanTahun as $bulan)
                            @php
                                $formattedDate = \Carbon\Carbon::createFromDate($bulan->tahun, $bulan->bulan, 1)->format('F Y');
                                $isSelected = ($bulan->tahun == $selectedDate->year && $bulan->bulan == $selectedDate->month);
                            @endphp
                            <option value="{{ $formattedDate }}" {{ $isSelected ? 'selected' : '' }}>{{ $formattedDate }}</option>
                        @endforeach
                    @else
                        <option value="semua" selected>Tampilkan semua</option>
                        @foreach($sortedBulanTahun as $bulan)
                            @php
                                $formattedDate = \Carbon\Carbon::createFromDate($bulan->tahun, $bulan->bulan, 1)->format('F Y');
                            @endphp
                            <option value="{{ $formattedDate }}">{{ $formattedDate }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
                        
        </div>
    </div>
</div>

<script>
grafik_absensi_semester = {
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

grafik_absensi_bulanan = {
    series: [{{ $summary_bulanan['hadir'] }}, {{ $summary_bulanan['izin'] }}, {{ $summary_bulanan['absen'] }}],
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

chart_semester = new ApexCharts(document.querySelector("#grafik_absensi_semester"), grafik_absensi_semester);
chart_bulanan = new ApexCharts(document.querySelector("#grafik_absensi_bulanan"), grafik_absensi_bulanan);
chart_semester.render();
chart_bulanan.render();

$(document).ready(function () {
    $('#bulanFilter').on('change', function () {
        let selectedMonth = $(this).val();

        $.ajax({
            url: '/mhs/absensi/filter',
            method: 'GET',
            data: { month: selectedMonth },
            success: function (data) {
                $('#mainAbsensi').html(data);
            },
            error: function (error) {
                console.log(error);
            }
        });
    });
});

</script>
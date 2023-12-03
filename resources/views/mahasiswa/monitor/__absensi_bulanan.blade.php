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

<script>
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

chart_bulanan = new ApexCharts(document.querySelector("#grafik_absensi_bulanan"), grafik_absensi_bulanan);

chart_bulanan.render();

</script>
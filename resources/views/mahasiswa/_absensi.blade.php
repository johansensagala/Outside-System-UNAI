<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($data_absen_bulanan as $absen)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $absen->created_at }}</td>
            <td>
                @if ($absen->kehadiran == 'Hadir')
                <span class="bg-success p-2 rounded-3 text-white text-center">
                    Hadir
                </span>
                @elseif ($absen->kehadiran == 'Izin')
                <span class="bg-warning p-2 rounded-3 text-white text-center">
                    Izin
                </span>                                            
                @else
                <span class="bg-danger p-2 rounded-3 text-white text-center">
                    Absen
                </span>
                @endif
            </td>
        </tr>
        @php
            $i++;
        @endphp
        @endforeach
    </tbody>
</table>

<div id="search-results">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Detail</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($daftar_data_penjamin as $data_penjamin)
                    <tr>
                        <td>{{ $index }}</td>
                        <td class="align-middle">{{ $data_penjamin->penjamin->nama }}</td>
                        <td class="align-middle">{{ $data_penjamin->created_at->format('d/m/Y') }}</td>
                        <td class="align-middle">
                            <a href="/biro/formulir-penjamin/{{ $data_penjamin->id }}" class="btn btn-primary">Detail</a>
                        </td>
                        @if ($data_penjamin->status == 'disetujui')
                            <td class="align-middle">
                                <span class="bg-success p-2 rounded-3 text-white text-center">
                                    Disetujui
                                </span>
                            </td>
                        @elseif ($data_penjamin->status == 'ditolak')
                            <td class="align-middle">
                                <span class="bg-danger p-2 rounded-3 text-white text-center">
                                    Ditolak
                                </span>
                            </td>
                        @else
                            <td class="align-middle">
                                <span class="bg-warning p-2 rounded-3 text-white text-center">
                                    Pending
                                </span>
                            </td>
                        @endif
                    </tr>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        @if ($daftar_data_penjamin->count() === 0)
            <h4 class="my-4 text-center fw-bold">
                Tidak ada penjamin
            </h4>
        @endif                                
    </div>
</div>

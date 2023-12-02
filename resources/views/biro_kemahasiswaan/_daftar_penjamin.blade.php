<div id="search-results">
    <div class="table-wrapper card bs-gray-100 fw-bold">
        <table class="table table-responsive card-list-table table-bordered table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($daftar_data_penjamin as $data_penjamin)
                    <tr>
                        <td class="align-middle text-center number">{{ $index }}</td>
                        <td class="align-middle name">{{ $data_penjamin->penjamin->nama }}</td>
                        <td class="align-middle text-center">{{ $data_penjamin->created_at->format('d/m/Y') }}</td>
                        @if ($data_penjamin->status == 'disetujui')
                            <td class="align-middle fw-bolder text-center" style="color: green;">
                                 Disetujui
                            </td>
                        @elseif ($data_penjamin->status == 'ditolak')
                            <td class="align-middle fw-bolder text-center" style="color: red;">
                                 Ditolak
                            </td>
                        @else
                            <td class="align-middle fw-bolder text-center" style="color: #f3c022;">
                                <i>Pending</i>
                            </td>
                        @endif
                        <td class="align-middle text-center">
                            <a href="/biro/formulir-penjamin/{{ $data_penjamin->id }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></i>&nbsp; Detail </a>
                        </td>
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

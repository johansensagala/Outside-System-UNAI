<div id="search-results">
    <div class="table-wrapper card bs-gray-100 fw-bold">
        <table class="table table-responsive card-list-table table-bordered table-striped">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIM</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jurusan</th>
                <th class="text-center">Tanggal Pengajuan</th>
                <th class="text-center">Status Tinggal</th>
                <th class="text-center">Status Penjaminan</th>
                <th class="text-center">Status Luar Asrama</th>
                <th class="text-center">Detail</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($daftar_pengajuan_luar_asrama as $pengajuan_luar_asrama)
            <tr>
                <td class="align-middle text-center">{{ $i++ }}</td>
                <td class="align-middle">{{ $pengajuan_luar_asrama->mahasiswa->nim }}</td>
                <td class="align-middle">{{ $pengajuan_luar_asrama->mahasiswa->nama }}</td>
                <td class="align-middle text-center">{{ $pengajuan_luar_asrama->mahasiswa->jurusan }}</td>
                <td class="align-middle">{{ $pengajuan_luar_asrama->created_at }}</td>
                <td class="align-middle text-center">{{ $pengajuan_luar_asrama->status_tinggal }}</td>
                
                @if ($pengajuan_luar_asrama->status_penjamin == 'disetujui')
                <td class="align-middle fw-bolder text-center" style="color: green">
                    Disetujui
                </td>
                
                @elseif ($pengajuan_luar_asrama->status_penjamin == 'ditolak')
                <td class="align-middle fw-bolder text-center" style="color: red">
                    Ditolak
                </td>
                
                @else
                <td class="align-middle fw-bolder text-center" style="color: yellow">
                   <i>Pending</i>
                </td>
                @endif
                
                @if ($pengajuan_luar_asrama->status == 'disetujui')
                <td class="align-middle fw-bolder text-center" style="color: green">
                    Disetujui
                </td>
                
                @elseif ($pengajuan_luar_asrama->status == 'ditolak')
                <td class="align-middle fw-bolder text-center" style="color: red">
                    Ditolak
                </td>
                                        
                @else
                <td class="align-middle fw-bolder text-center" style="color: #f3c022">
                    <i>Pending</i>
                </td>
                                        
                @endif
                    <td class="align-middle">
                        <a href="/biro/persetujuan-luar-asrama/{{ $pengajuan_luar_asrama->id }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>&nbsp;Detail</a>
                    </td>
                </tr>
                @endforeach
                @php
                    $i++;
                @endphp
            </tbody>
        </table>
        @if ($daftar_pengajuan_luar_asrama->count() === 0)
            <h4 class="my-4 text-center fw-bold">
                Belum ada mahasiswa
            </h4>
        @endif                                
    </div>
</div>
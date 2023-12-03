<div id="search-results">
    <div class="table-wrapper card bs-gray-100 fw-bold">
        <table class="table table-responsive card-list-table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Angkatan</th>
                    <th class="text-center">Nomor Telepon</th>
                    <th class="text-center">Detail Absensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_mahasiswa_outside as $key => $data_outside)
                    <tr>
                        <td class="text-center number">{{ ($daftar_mahasiswa_outside->currentPage() - 1) * $daftar_mahasiswa_outside->perPage() + $key + 1 }}</td>
                        <td class="align-middle text-center">{{ $data_outside->mahasiswa->nim }}</td>
                        <td class="align-middle">{{ $data_outside->mahasiswa->nama }}</td>
                        <td class="align-middle text-center">{{ $data_outside->mahasiswa->angkatan }}</td>
                        <td class="align-middle text-center">{{ $data_outside->mahasiswa->nomor_pribadi }}</td>
                        <td class="align-middle text-center">
                            <a href="/mhs/daftar-mahasiswa-outside/{{ $data_outside->mahasiswa->id }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></i>&nbsp; Detail </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>                                
    </div>
</div>
<div id="search-results">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">NIM</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Angkatan</th>
                    <th class="text-center">Nomor Telfon</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Ubah Role</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $index = 1;
                @endphp
                @foreach ($daftar_data_mahasiswa as $data_mahasiswa)
                    <tr>
                        <td class="text-center">{{ $index }}</td>
                        <td class="align-middle text-center">{{ $data_mahasiswa->nim }}</td>
                        <td class="align-middle">{{ $data_mahasiswa->nama }}</td>
                        <td class="align-middle text-center">{{ $data_mahasiswa->angkatan }}</td>
                        <td class="align-middle text-center">{{ $data_mahasiswa->nomor_pribadi }}</td>
                        <td class="align-middle text-center">{{ $data_mahasiswa->role ? 'monitor' : 'mahasiswa' }}</td>
                        <td class="align-middle">
                            <div class="form-switch text-center">
                                <input class="form-check-input" type="checkbox" role="switch" id="toggle" data-item-id="{{ $data_mahasiswa->id }}" {{ $data_mahasiswa->status ? 'checked' : '' }}>
                            </div>
                        </td>
                    </tr>
                    @php
                        $index++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        @if ($daftar_data_mahasiswa->count() === 0)
            <h4 class="my-4 text-center fw-bold">
                Belum ada mahasiswa
            </h4>
        @endif                                
    </div>
</div>
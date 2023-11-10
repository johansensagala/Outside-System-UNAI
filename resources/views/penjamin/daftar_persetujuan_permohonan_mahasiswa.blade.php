@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')

<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PERMOHONAN PENJAMINAN
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Detail</th>
                                        <th>Status Penjaminan</th>
                                        <th>Status Luar Asrama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($daftar_pengajuan_mahasiswa as $pengajuan_mahasiswa)
                                    <tr>
                                        <td>{{ $index }}</td>
                                        <td class="align-middle">{{ $pengajuan_mahasiswa->mahasiswa->nama }}</td>
                                        <td class="align-middle">{{ $pengajuan_mahasiswa->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td class="align-middle">
                                            <a href="/penjamin/persetujuan-mahasiswa/{{ $pengajuan_mahasiswa->id }}" class="btn btn-primary">Detail</a>
                                        </td>
                                        @if ($pengajuan_mahasiswa->status_penjamin == 'disetujui')
                                        <td class="align-middle">
                                                <span class="bg-success p-2 rounded-3 text-white text-center">
                                                    Disetujui
                                                </span>
                                            </td>
                                        @elseif ($pengajuan_mahasiswa->status_penjamin == 'ditolak')
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
                                        @if ($pengajuan_mahasiswa->status == 'disetujui')
                                            <td class="align-middle">
                                                <span class="bg-success p-2 rounded-3 text-white text-center">
                                                    Disetujui
                                                </span>
                                            </td>
                                        @elseif ($pengajuan_mahasiswa->status == 'ditolak')
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
                            @if ($daftar_pengajuan_mahasiswa->count() === 0)
                                <h4 class="my-4 text-center fw-bold">
                                    Belum ada mahasiswa
                                </h4>
                            @endif                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

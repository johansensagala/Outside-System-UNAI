@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

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
                        <div class="table-wrapper card bs-gray-100 fw-bold">
                            <table class="table table-responsive card-list-table table-bordered table-striped">
                                <thead>
                                <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status Penjaminan</th>
                                        <th>Status Luar Asrama</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $index = 1;
                                    @endphp
                                    @foreach ($daftar_pengajuan_mahasiswa as $pengajuan_mahasiswa)
                                    <tr>
                                        <td class="align-middle number text-center">{{ $index }}</td>
                                        <td class="align-middle">{{ $pengajuan_mahasiswa->mahasiswa->nama }}</td>
                                        <td class="align-middle text-center">{{ $pengajuan_mahasiswa->created_at->format('d/m/Y H:i:s') }}</td>
                                        @if ($pengajuan_mahasiswa->status_penjamin == 'disetujui')
                                        <td class="align-middle fw-bolder text-center" style="color: Green;">
                                            Disetujui
                                        </td>
                                        @elseif ($pengajuan_mahasiswa->status_penjamin == 'ditolak')
                                        <td class="align-middle fw-bolder text-center" style="color: red;">
                                            Ditolak
                                        </td>
                                        @else
                                        <td class="align-middle fw-bolder text-center" style="color: #fbbc00">
                                            <i>Pending</i>
                                        </td>
                                        @endif
                                        @if ($pengajuan_mahasiswa->status == 'disetujui')
                                        <td class="align-middle fw-bolder text-center" style="color: Green;">
                                            Disetujui
                                        </td>
                                        @elseif ($pengajuan_mahasiswa->status == 'ditolak')
                                        <td class="align-middle fw-bolder text-center" style="color: red;">
                                            Ditolak
                                        </td>
                                        @else
                                        <td class="align-middle fw-bolder text-center" style="color: #fbbc00">
                                            <i>Pending</i>
                                        </td>
                                        @endif
                                        <td class="align-middle text-center">
                                            <a href="/penjamin/persetujuan-mahasiswa/{{ $pengajuan_mahasiswa->id }}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>&nbsp;&nbsp;Detail</a>
                                        </td>
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

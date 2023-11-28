@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')
@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>

    <style>
    @media (max-width: 767px) {
        .table-responsive.card-list-table {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .table-responsive.card-list-table table {
            display: block;
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            white-space: nowrap;
        }

        .table-responsive.card-list-table tbody tr .number {
            display: none;
        }

        .table-responsive.card-list-table tbody tr .name {
            font-size: 16px;
        }

        .table-responsive.card-list-table thead {
            display: none;
        }

        .table-responsive.card-list-table tbody {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        .table-responsive.card-list-table tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 8px solid #ddd;
            width: 100%;
            box-sizing: border-box;
        }

        .table-responsive.card-list-table tbody td {
            display: flex;
            align-items: baseline;
            justify-content:center;
            text-align: left;
            font-size: 14px;
            padding: 8px;
            box-sizing: border-box;
            width: 100%;
        }
    }
</style>

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
                                        <td class="align-middle number">{{ $index }}</td>
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

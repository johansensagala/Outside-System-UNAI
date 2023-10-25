@extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')
<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">

                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA PERMOHONAN TEMPAT TINGGAL
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

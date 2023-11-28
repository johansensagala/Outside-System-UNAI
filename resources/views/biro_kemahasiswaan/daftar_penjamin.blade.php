@extends('layouts.main')
@section('title', 'UNAI Outside System')

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

@section('content')
    <!-- <body class="large-screen">
        <div class="row common-font-color wrap common-font-color">
            <div class="table-wrapper card bs-gray-200 fw-bold ">
                <table class="table-responsive card-list-table">
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
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                        <tr>
                            <td data-title="Column #1">Value #1</td>
                            <td data-title="Column #2">Value #2</td>
                            <td data-title="Column #3">Value #3</td>
                            <td data-title="Column #4">Value #4</td>
                            <td data-title="Column #5">Value #5</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body> -->

    <div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DAFTAR PENGAJUAN PENJAMIN
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="row">
                            <div class="col-10">
                                <form action="/biro/formulir-penjamin">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukkan nama penjamin..." name="search" id="search" value="{{ request('search') }}">
                                    </div>
                                </form>
                            </div>
                            <div class="col-2">
                                <select name="status" id="status" class="form-control form-select">
                                    <option value="">Semua</option>
                                    <option value="pending">Menunggu Persetujuan</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="disetujui">Diterima</option>
                                </select>
                            </div>
                        </div>
                        @include('biro_kemahasiswaan._daftar_penjamin')
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </script>
@endsection


<script>
    $(document).ready(function () {
        $('#search').on('keyup', function () {
            let search = $(this).val();

            if (search.length >= 3 || search.length === 0) { 
                $.get("{{ route('biro_kemahasiswaan.search_penjamin') }}", { search: search }, function (data) {
                    $('#search-results').html(data);
                });
            }
        });
        
        $('#status').on('change', function () {
            let status = $(this).val();

            if (status !== "") {
                $.get("{{ route('biro_kemahasiswaan.status_penjamin') }}", { status: status }, function (data) {
                    $('#search-results').html(data);
                });
            } else {
                $.get("{{ route('biro_kemahasiswaan.search_penjamin') }}", function (data) {
                    $('#search-results').html(data);
                });
            }
        });
    });
</script>
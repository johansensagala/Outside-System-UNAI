@extends('layouts.main')
<title>UNAI Outside System</title>

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

        .table-responsive.card-list-table thead {
            display: none;
        }

        .table-responsive.card-list-table tbody tr .number {
            display: none;
        }

        .table-responsive.card-list-table tbody tr .name {
            font-size: 16px;
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
<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">
            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DAFTAR PENJAMIN
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="row">
                            <div class="col-9">
                                <form action="/biro/daftar-mahasiswa">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukkan nama mahasiswa..." name="search" id="search" value="{{ request('search') }}">
                                    </div>
                                </form>
                            </div>
                            <div class="col-3">
                                <a href="/biro/penjamin/create" class="btn btn-primary mb-3 align-left fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>&nbsp;&nbsp;Tambah Penjamin</a>
                            </div>
                        </div>
                        @include('biro_kemahasiswaan.penjamin._daftar_penjamin')
                    </div>
                    @if ($penjamins->total() > $penjamins->perPage())
                        <div class="pagination">
                            {{ $penjamins->links() }}
                        </div>
                    @endif
                    @if ($penjamins->count() === 0)
                        <h4 class="my-4 text-center fw-bold">
                            Belum ada Penjamin
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        
        $('#search').on('keyup', function () {
            let search = $(this).val();
            updateSearchResults(search);
        });

        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            let search = $('#search').val();
            updateSearchResults(search, page);
        });

        $('form').submit(function (event) {
            event.preventDefault();
            let search = $('#search').val();
            updateSearchResults(search);
        });

        function updateSearchResults(search, page = 1) {
            if (search.length >= 3 || search.length == 0) {
                $.get("{{ route('biro_kemahasiswaan.search_penjamin') }}", { search: search, page: page }, function (data) {
                    $('#search-results').html(data);
                });
            }
        }
    });
</script>
@endsection
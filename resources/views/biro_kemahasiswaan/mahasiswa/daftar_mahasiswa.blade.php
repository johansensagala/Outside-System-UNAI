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
                            DATA MAHASISWA
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="/biro/daftar-mahasiswa">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukkan nama mahasiswa..." name="search" id="search" value="{{ request('search') }}">
                                    </div>
                                </form>                                
                            </div>
                        </div>
                        @include('biro_kemahasiswaan.mahasiswa._daftar_mahasiswa')
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $(document).ready(function () {
    //     $('#search').on('keyup', function () {
    //         let search = $(this).val();

    //         if (search.length >= 3 || search.length === 0) { 
    //             $.get("{{ route('biro_kemahasiswaan.search_mahasiswa') }}", { search: search }, function (data) {
    //                 $('#search-results').html(data);
    //             });
    //         }
    //     });
    // });

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
            $.get("{{ route('biro_kemahasiswaan.search_mahasiswa') }}", { search: search, page: page }, function (data) {
                $('#search-results').html(data);
            });
        }
    }
});

</script>
@endsection
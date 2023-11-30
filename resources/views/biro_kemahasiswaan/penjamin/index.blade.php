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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Penjamin</h1>
    </div>
    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <a href="/biro/penjamin/create" class="btn btn-primary mb-3">Tambah Penjamin</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nomor Telfon</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjamins as $penjamin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penjamin->username }}</td>
                        <td>{{ $penjamin->nama }}</td>
                        <td class="text-center">{{ $penjamin->nomor_telp }}</td>
                        <td class="text-center">{{ $penjamin->role }}</td>
                        <td class="text-center">
                            <a href="/biro/penjamin/{{ $penjamin->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/biro/penjamin/{{ $penjamin->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach         
            </tbody>
        </table>
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
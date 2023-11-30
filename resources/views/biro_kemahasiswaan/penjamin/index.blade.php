@extends('layouts.main')
<title>UNAI Outside System</title>

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
                <tr>
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
                        <td>{{ $penjamin->nomor_telp }}</td>
                        <td>{{ $penjamin->role }}</td>
                        <td>
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
@endsection
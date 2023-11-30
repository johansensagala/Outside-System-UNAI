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
        <span>
        <a href="/biro/penjamin/create" class="btn btn-primary mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>&nbsp;&nbsp;Tambah Penjamin</a>
        </span>
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
                            <a href="/biro/penjamin/{{ $penjamin->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>&nbsp;&nbsp;
                            <form action="/biro/penjamin/{{ $penjamin->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
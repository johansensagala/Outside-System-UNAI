@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Penjamin</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/biro/penjamin/{{ $penjamin->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $penjamin->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama', $penjamin->nama) }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            <div class="mb-3">
                <label for="repassword" class="form-label">Re-Password</label>
                <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword">
            </div>
            <div class="mb-3">
                <label for="nomor_telp" class="form-label">Nomor Telfon</label>
                <input type="integer" class="form-control @error('nomor_telp') is-invalid @enderror" id="nomor_telp" name="nomor_telp" required value="{{ old('nomor_telp', $penjamin->nomor_telp) }}">
                @error('nomor_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" name="role">
                    <option value="nondosen" {{ $penjamin->role == 'nondosen' ? 'selected' : '' }}>Non Dosen</option>
                    <option value="dosen" {{ $penjamin->role == 'dosen' ? 'selected' : '' }}>Dosen</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Ubah Penjamin</button>
        </form>  
    </div>
@endsection
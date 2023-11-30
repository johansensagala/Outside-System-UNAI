@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Membuat Penjamin</h1>
    </div>
    <div class="col-lg-11">
        <form method="POST" action="/biro/penjamin" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autofocus value="{{ old('username') }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                @error('password')
                <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            <div class="mb-3">
                <label for="repassword" class="form-label">Re-Password</label>
                <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword" required>
                @error('repassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nomor_telp" class="form-label">Nomor Telfon</label>
                <input type="integer" class="form-control @error('nomor_telp') is-invalid @enderror" id="nomor_telp" name="nomor_telp" required value="{{ old('nomor_telp') }}">
                @error('nomor_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" name="role">
                    <option value="nondosen">Non Dosen</option>
                    <option value="dosen">Dosen</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Penjamin</button>
        </form>  
    </div>
@endsection
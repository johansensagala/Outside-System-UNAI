@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')

<div class="row common-font-color">
    <div class="col-12 col-xl-12 stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            EDIT PENJAMIN
                        </div>
                    </div>
                </div>
                <div class="card p-4">

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
                        <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>&nbsp;&nbsp;Tambah Penjamin</button>
                    </form>  
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
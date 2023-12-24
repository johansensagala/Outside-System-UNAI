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
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Re-Password</label>
                            <input type="password" class="form-control @error('repassword') is-invalid @enderror" id="repassword" name="repassword">
                            @error('repassword')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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
            </div>
        </div>
    </div>
</div>
@endsection

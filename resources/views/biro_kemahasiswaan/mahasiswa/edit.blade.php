@extends('layouts.main')
<title>UNAI Outside System</title>

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Role Mahasiswa</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/biro/daftar-mahasiswa/{{ $mahasiswa->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            Nama
                        </div>
                        <div class="col-md-8 fw-bold">
                            {{ $mahasiswa->nama }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            NIM
                        </div>
                        <div class="col-md-8 fw-bold">
                            {{ $mahasiswa->nim }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Angkatan
                        </div>
                        <div class="col-md-8 fw-bold">
                            {{ $mahasiswa->angkatan }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Nomor Telfon
                        </div>
                        <div class="col-md-8 fw-bold">
                            {{ $mahasiswa->nomor_pribadi }}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                Role
                            </div>
                            <div class="col-md-8">
                            <select class="form-select" name="role">
                                <option value="0" {{ $mahasiswa->role == 0 ? 'selected' : '' }}>Mahasiswa</option>
                                <option value="1" {{ $mahasiswa->role == 1 ? 'selected' : '' }}>Monitor</option>
                            </select>
                        </div>
                        </div>
                    </div>
                 </div>
                 <button type="submit" class="btn btn-warning fw-bold">Update Mahasiswa</button>
            </div>
        </form>  
    </div>
@endsection
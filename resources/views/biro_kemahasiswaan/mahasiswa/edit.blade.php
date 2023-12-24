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
                            DATA MAHASISWA
                        </div>
                    </div>
                </div>
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
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                NIM
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $mahasiswa->nim }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Jurusan
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $mahasiswa->jurusan }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Angkatan
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $mahasiswa->angkatan }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Pribadi
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $mahasiswa->nomor_pribadi }}
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="/biro/daftar-mahasiswa/{{ $mahasiswa->id }}" class="mb-5" enctype="multipart/form-data">
                    @method('put')
                    @csrf            
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Role
                            </div>
                            <div class="col-md-8 fw-bold">
                                <select class="form-select" name="role">
                                    <option value="0" {{ $mahasiswa->role == 0 ? 'selected' : '' }}>Mahasiswa</option>
                                    <option value="1" {{ $mahasiswa->role == 1 ? 'selected' : '' }}>Monitor</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8 fw-bold">
                                <button type="submit" class="btn btn-warning fw-bold">Ubah</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>   
    </div>
</div>

@endsection
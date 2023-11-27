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
                            PROFIL MAHASISWA
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
                                Jenis Kelamin
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $mahasiswa->jenis_kelamin }}
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
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                Nomor Orang Tua/Wali
                            </div>
                            <div class="col-md-8 fw-bold">
                                {{ $mahasiswa->nomor_ortu_wali }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

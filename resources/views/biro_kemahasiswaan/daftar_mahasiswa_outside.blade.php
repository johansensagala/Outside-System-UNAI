@extends('layouts.main')
<title>UNAI Outside System</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')

<div class="row common-font-color">
    <div class="stretch-card">
        <div class="row flex-grow-1">
            @if (session()->has('success'))
                <div class="alert alert-success col-lg-12" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            DATA MAHASISWA
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="row">
                            <div class="col-12">
                                <form action="/biro/daftar-mahasiswa">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Masukkan nama mahasiswa..." name="search" id="search" value="{{ request('search') }}">
                                    </div>
                                </form>                                
                            </div>
                        </div>
                        @include('biro_kemahasiswaan._daftar_mahasiswa_outside')
                        @if ($daftar_mahasiswa_outside->total() > $daftar_mahasiswa_outside->perPage())
                        <div class="pagination mt-4">
                            {{ $daftar_mahasiswa_outside->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
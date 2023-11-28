@extends('layouts.main')
<title>UNAI Outside System | Absensi</title>

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet"/>
@endpush

@section('content')

<div class="row common-font-color">
    <div class="stretch-card">
        <div class="row flex-grow-1">

            <div class="grid-margin">
                <div class="card bs-gray-200 fw-bold">
                    <div class="card-body">
                        <div class="text-center">
                            MAHASISWA BELUM MENDAPAT PERSETUJUAN OUTSIDE
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

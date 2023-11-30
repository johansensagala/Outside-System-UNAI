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
                        <div class="d-flex justify-content-between align-items-baseline">
                            Absensi Mahasiswa Outside
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="m-5">
                        <div class="row">
                            <div class="row">
                                @if ($belum_absen == True && $absen_time == True)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#absentModal" onclick="isPresent()">Absen Sekarang</button>
                                @elseif ($belum_absen == False)
                                    <div class="text-success">Anda sudah melakukan absen hari ini. Absen dibuka besok pada pukul 19.30 - 21.00 WIB.</div>
                                    <div class="modal fade" id="modalAbsensi" tabindex="-1" aria-labelledby="modalAbsensiLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalAbsensiLabel">Sudah Hadir</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda sudah mengisi kehadiran hari ini.
                                                </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            let modal = new bootstrap.Modal(document.getElementById('modalAbsensi'));
                                            modal.show();
                                        });
                                    </script>
                                @else
                                <div class="text-danger">Absen dibuka pada pukul 19.30 - 21.00 WIB.</div>
                                    <div class="modal fade" id="modalAbsensi" tabindex="-1" aria-labelledby="modalAbsensiLabel">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modalAbsensiLabel">Absen Ditutup</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Absen dibuka pada pukul 19.30 - 21.00 WIB.
                                                </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            let modal = new bootstrap.Modal(document.getElementById('modalAbsensi'));
                                            modal.show();
                                        });
                                    </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>
  
<div class="modal fade" id="absentModal" tabindex="-1" aria-labelledby="absentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="absentModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/mhs/absensi" method="post" enctype="multipart/form-data">
        @csrf
            <div class="modal-body">
                <div>Lokasi</div>
                <div class="loading text-center">
                    <p>Melacak lokasi</p>
                    <div class="spinner-border mt-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="container">
                    <h1 class="status"></h1>
                </div>
                <div id="googleMap" class="" style="width: 100%; height: 300px;"></div>

                <input type="hidden" id="latitude" name="latitude" value="">
                <input type="hidden" id="longitude" name="longitude" value="">

                @error('latitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('longitude')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mt-3">Keterangan</div>

                <div class="bg-success p-2 rounded-3 text-white text-center">
                    Hadir
                </div>
                <input type="hidden" id="kehadiran" name="kehadiran" value="hadir">
                
                <label for="alasan" class="mt-3">Keterangan (Jika tidak hadir)</label>
                <textarea class="form-control" id="alasan" name="alasan" rows="3"></textarea>

                <label for="foto" class="mt-3">Foto Bukti (Jika tidak hadir)</label>
                <input class="form-control" type="file" id="foto" name="foto" id="formFile">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="width: 50%">Absen</button>
            </div>

        </form>
      </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBub2pKear-jyRCDPs60bPSWIUANAi3UCo"></script>
<script>
let latitude = null;
let longitude = null;

const success = (position) => {
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;
    document.querySelector("#latitude").value = latitude;
    document.querySelector("#longitude").value = longitude;

    initMap();
}

const error = () => {
    const alamatDomisili = document.getElementById('alamatDomisili');
    const fotoTempatTinggal = document.getElementById('fotoTempatTinggal');
    const simpanPermohonan = document.getElementById('simpanPermohonan');
    const gpsPenjamin = document.getElementById('gpsPenjamin');
    const notAllowed = document.getElementById('notAllowed');

    alamatDomisili.disabled = true;
    fotoTempatTinggal.disabled = true;
    simpanPermohonan.disabled = true;
    gpsPenjamin.hidden = true;
    notAllowed.classList.remove('d-none');
}

const showLoading = () => {
  document.querySelector('.loading').style.display = 'block';
}

const hideLoading = () => {
  document.querySelector('.loading').style.display = 'none';
}

showLoading();

navigator.geolocation.getCurrentPosition((position) => {
  success(position);
  hideLoading();
}, error);

async function initMap() {
  if (latitude === null || longitude === null) {
      return;
  }
  
  let myLatLng = { lat: latitude, lng: longitude };

  let map = new google.maps.Map(document.getElementById('googleMap'), {
    zoom: 14,
    center: myLatLng
  });

  let marker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    title: 'Lokasi saya'
  });
}

function toRadians(degrees) {
    return degrees * Math.PI / 180;
}
  
function haversineDistance(lat1, lon1, lat2, lon2) {
    const R = 6371;
    const dLat = toRadians(lat2 - lat1);
    const dLon = toRadians(lon2 - lon1);

    const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const distance = R * c;

    return distance;
}

function isPresent() {
    const lat1 = latitude;
    const lon1 = longitude;
    const lat2 = {{ $latitude }};
    const lon2 = {{ $longitude }};

    const distanceInKilometers = haversineDistance(lat1, lon1, lat2, lon2);
    const distanceInMeters = distanceInKilometers * 1000;

    console.log(lat1);
    console.log(lon1);
    console.log(lat2);
    console.log(lon2);
    console.log(distanceInMeters);
    console.log(`Jarak antara kedua titik adalah ${distanceInMeters.toFixed(2)} meter.`);

    const statusElement = document.querySelector('.modal-body .bg-success');
    const hiddenInputElement = document.querySelector('#kehadiran');

    if (distanceInMeters <= 50.0) {
        statusElement.innerHTML = 'Hadir';
        hiddenInputElement.value = 'Hadir';
        statusElement.classList.add('bg-success');
        statusElement.classList.remove('bg-danger');
    } else {
        statusElement.innerHTML = 'Absen';
        hiddenInputElement.value = 'Absen';
        statusElement.classList.remove('bg-success');
        statusElement.classList.add('bg-danger');
    }
}

</script>

@endsection

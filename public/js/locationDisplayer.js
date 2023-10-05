let latitude = {{ $data_tempat_tinggal->latitude }};
let longitude = {{ $data_tempat_tinggal->latitude }};

// Panggil fungsi initMap() setelah variabel latitude dan longitude ditetapkan
initMap();

function initMap() {
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
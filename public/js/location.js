let latitude = null;
let longitude = null;

const success = (position) => {
    console.log(position)
    latitude = position.coords.latitude;
    longitude = position.coords.longitude;
    document.querySelector(".latitude").innerHTML = latitude;
    document.querySelector(".longitude").innerHTML = longitude;

    initMap();
}

const error = () => {
    // document.querySelector('.status').textContent = 'Tidak dapat menampilkan lokasi'
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

navigator.geolocation.getCurrentPosition(success, error);

function initMap() {
    if (latitude === null || longitude === null) {
      return;
    }
    
    var myLatLng = {lat: latitude, lng: longitude};
  
    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 14,
      center: myLatLng
    });
  
    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Lokasi saya'
    });
}
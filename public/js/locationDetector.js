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
    const alamat = document.getElementById('alamat');
    const foto_tempat_tinggal = document.getElementById('foto_tempat_tinggal');
    const foto_kartu_keluarga = document.getElementById('foto_kartu_keluarga');
    const autoclose = document.getElementById('autoclose');
    const position_check = document.getElementById('position_check');
    const notAllowed = document.getElementById('notAllowed');

    alamat.disabled = true;
    foto_tempat_tinggal.disabled = true;
    foto_kartu_keluarga.disabled = true;
    autoclose.hidden = true;
    position_check.classList.add('d-none');
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

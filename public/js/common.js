console.log("TEST");

function previewImage(event, previewId) {
    const input = event.target;
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const previewElement = document.getElementById(previewId);
            previewElement.src = e.target.result;
            previewElement.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
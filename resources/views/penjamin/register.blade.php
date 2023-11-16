<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.links')
  <title>Registrasi akun</title>
</head>

<body>

  <div class="page-content d-flex justify-content-center" style="background-color: #32323a; min-height: 100vh;">
    <div class="row mx-0 auth-page">
      <div class="mx-auto" style="margin-top: 75px">
        <div class="card mx-auto" style="border: none; width: 350px;">
          <div class="row">
            <div>
              <div style="border-radius: 10px" class="auth-form-wrapper justify-content-center">
                <div class="text-center py-4" style="background-color: #38BBEB; border-bottom: 10px solid #2D9DC6">
                  <h4 class="d-block text-white">Registrasi</h4>
                  <h5 class="fw-normal text-white">Akun penjamin</h5>
                </div>
                <div>
                  <form class="forms-sample" id="registrationForm" action="/penjamin/register" method="POST">
                    {{-- <form class="forms-sample" id="registrationForm"> --}}
                    @csrf
                    <div class="p-4" style="background-color: #EAEAEC">
                      <div class="mb-3">
                        <input type="username" class="form-control" id="username" name="username" placeholder="Username">
                        <small class="text-danger" id="username-error"></small>
                      </div>
                      <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        <small class="text-danger" id="password-error"></small>
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                        <small class="text-danger" id="nama-error"></small>
                      </div>
                      <div class="mb-3">
                        <input type="integer" class="form-control" id="nomor_telp" name="nomor_telp" placeholder="Nomor Telepon">
                        <small class="text-danger" id="nomor-telp-error"></small>
                      </div>
                    </div>
                    <div class="bg-white pt-3 pb-4">
                      <div class="px-4">
                        <button class="w-100 btn btn-lg d-flex text-white justify-content-center fw-bold" style="background-color: #E5BC37" type="submit">Daftar</button>
                      </div>
                    </div>
                  </form>
                  <div class="modal fade" id="OTPModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 mx-auto">Masukkan Kode OTP</h1>
                        </div>
                        <div class="modal-body row justify-content-center">
                          <input type="text" id="1" class="form-control otp-input mx-1 fw-bolder text-center" style="max-width: 50px; height: 60px; font-size: 20px;" maxlength="1" oninput="moveToNextInput(event)" onkeypress="checkInput(event)">
                          <input type="text" id="2" class="form-control otp-input mx-1 fw-bolder text-center" style="max-width: 50px; height: 60px; font-size: 20px;" maxlength="1" oninput="moveToNextInput(event)" onkeypress="checkInput(event)">
                          <input type="text" id="3" class="form-control otp-input mx-1 fw-bolder text-center" style="max-width: 50px; height: 60px; font-size: 20px;" maxlength="1" oninput="moveToNextInput(event)" onkeypress="checkInput(event)">
                          <input type="text" id="4" class="form-control otp-input mx-1 fw-bolder text-center" style="max-width: 50px; height: 60px; font-size: 20px;" maxlength="1" oninput="moveToNextInput(event)" onkeypress="checkInput(event)">
                          <input type="text" id="5" class="form-control otp-input mx-1 fw-bolder text-center" style="max-width: 50px; height: 60px; font-size: 20px;" maxlength="1" oninput="moveToNextInput(event)" onkeypress="checkInput(event)">
                          <input type="text" id="6" class="form-control otp-input mx-1 fw-bolder text-center" style="max-width: 50px; height: 60px; font-size: 20px;" maxlength="1" oninput="moveToNextInput(event)" onkeypress="checkInput(event)">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function moveToNextInput(event) {
      const currentInput = event.target;
      const maxLength = parseInt(currentInput.getAttribute('maxlength'));
      const inputValue = currentInput.value;

      if (inputValue.length >= maxLength) {
        const currentId = parseInt(currentInput.getAttribute('id'))
        const nextId = currentId + 1;
        const nextInput = document.getElementById(nextId);

        if (nextInput) {
          nextInput.focus();
        }
      } else {
        const currentId = parseInt(currentInput.getAttribute('id'))
        const previousId = currentId - 1;
        const previousInput = document.getElementById(previousId);

        if (previousInput) {
          previousInput.focus();
        }
      }
    }

    function checkInput(event) {
      const charCode = event.which || event.keyCode;

      if (!(charCode >= 48 && charCode <= 57)) {
        event.preventDefault();
      }
    }

    document.querySelector('form#registrationForm').addEventListener('submit', function(event) {
      event.preventDefault();
      const formData = new FormData(this);

      fetch(this.action, {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        // console.log(data.errors);
        if (data.errors) {
          // console.log(data.errors);
          if (data.errors['username']) {
            document.getElementById('username-error').textContent = data.errors['username'][0];
          } else {
            document.getElementById('username-error').textContent = '';
          }    
          if (data.errors['password']) {
            document.getElementById('password-error').textContent = data.errors['password'][0];
          } else {
            document.getElementById('password-error').textContent = '';
          }         
          if (data.errors['nama']) {
            document.getElementById('nama-error').textContent = data.errors['nama'][0];
          } else {
            document.getElementById('nama-error').textContent = '';
          }        
          if (data.errors['nomor_telp']) {
            document.getElementById('nomor-telp-error').textContent = data.errors['nomor_telp'][0];
          } else {
            document.getElementById('nomor-telp-error').textContent = '';
          }        
        } 
        else {
          document.getElementById('username-error').textContent = '';
          document.getElementById('password-error').textContent = '';
          document.getElementById('nama-error').textContent = '';
          document.getElementById('nomor-telp-error').textContent = '';
          const myModal = new bootstrap.Modal(document.getElementById('OTPModal'));
          myModal.show();
        }
      })
      .catch(error => console.error(error));
    });

  </script>

</body>

</html>

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
                <form class="forms-sample" action="/penjamin/register" method="POST">
                  @csrf
                  <div class="p-4" style="background-color: #EAEAEC">
                    <div class="mb-3">
                      <input type="username" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username">
                      @error('username')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                      @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama">
                      @error('nama')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <input type="integer" class="form-control @error('nomor_telp') is-invalid @enderror" id="nomor_telp" name="nomor_telp" placeholder="Nomor Telepon">
                      @error('nomor_telp')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>
                  <div class="bg-white pt-3 pb-4">
                    <div class="px-4">
                      <button class="w-100 btn btn-lg d-flex text-white justify-content-center fw-bold" style="background-color: #E5BC37" type="submit">Send OTP</button>
                    </div>
                  </div>
                </form>
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5 mx-auto" id="exampleModalToggleLabel">Masukkan Kode OTP</h1>
                    </div>
                    <div class="modal-body row">
                      <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); handleInput(this, document.getElementById('input2'));">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); handleInput(this, document.getElementById('input3'));">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); handleInput(this, document.getElementById('input2'));">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); handleInput(this, document.getElementById('input3'));">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); handleInput(this, document.getElementById('input2'));">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" maxlength="1" oninput="this.value = this.value.replace(/[^0-9]/g, ''); handleInput(this, document.getElementById('input3'));">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Open first modal</button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function handleInput(inputField, nextInputField) {
    var maxLength = inputField.maxLength;
    var currentValue = inputField.value;

    if (currentValue.length === maxLength) {
      nextInputField.focus();
    }
  }
</script>

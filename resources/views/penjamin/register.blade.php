<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.links')
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
                <h4 class="d-block text-white">Universitas Advent Indonesia</h4>
                <h5 class="fw-normal text-white">OUTSIDE SYSTEM FOR STUDENTS</h5>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
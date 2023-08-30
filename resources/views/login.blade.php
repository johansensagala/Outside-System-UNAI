@extends('layouts.main')
@section('content')

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
                <form class="forms-sample">
                  <div class="p-4" style="background-color: #EAEAEC">
                    <div class="mb-3">
                      <input type="email" class="form-control" id="userEmail" placeholder="NIM">
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control" id="userPassword" autocomplete="current-password" placeholder="Password">
                    </div>
                  </div>
                  <div class="bg-white pt-3 pb-4">
                    <div class="form-check mb-3">
                      <a href="#" style="color: #1cb4ac; text-decoration: none;" class="link-underline-opacity-100-hover">
                          <small>
                            Forgot Password?
                          </small>
                      </a>
                    </div>
                    <div class="px-4">
                      <a href="{{ url('/') }}" class="btn d-flex text-white justify-content-center fw-bold" style="background-color: #E5BC37">LOGIN</a>
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
@endsection

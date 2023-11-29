<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.links')
    <title>Login | VPSA UNAI Outside System</title>
</head>
<body>

<div class="page-content d-flex justify-content-center" style="background-color: #32323a; min-height: 100vh;">
  <div class="row mx-0 auth-page">
    <div class="mx-auto" style="margin-top: 75px">
    <div class="card mx-auto" style="border: none; width: 350px; border-top-left-radius: 20px;border-top-right-radius: 20px">
        <div class="row">
          <div>
          <div class="text-center py-5" style="background-color: #38BBEB; border-bottom: 10px solid #2D9DC6; border-top-left-radius: 10px; border-top-right-radius: 10px; border-top-left-radius: 10px;border-top-right-radius: 10px">
                <h4 class="fw-bolder d-block text-white">Universitas Advent Indonesia</h4>
                <h5 class="fw-normal text-white" style="font-family: 'Open Sans',sans-serif;">Outside System for Student Affairs</h5>
              </div>
              <div>
                @if (session()->has('success'))  
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                @if (session()->has('loginError'))  
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <form class="forms-sample" action="/biro/login" method="POST">
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
                  </div>
                  <div class="bg-white pt-3 pb-4" style="border-bottom-left-radius: 20px;border-bottom-right-radius: 20px">
                    <div class="form-check mb-2" style="align-items: first baseline;">
                    <button type="button" style="color: #1cb4ac" class="btn btn-sm btn-white" data-toggle="popover" title="Forgot Password?" data-content="Silahkan datang ke BAA untuk reset password anda!" id="forgotPasswordBtn">Forgot Password?</button>
                    </div>
                    <div class="px-4">
                      <button class="w-100 btn btn-lg d-flex text-white justify-content-center fw-bold" style="background-color: #E5BC37" type="submit">Login</button>
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
     <!-- Optional JavaScript -->
        <!-- Popper.js first, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
        
        <script>
            var popoverTriggerList = [].slice.call( document.querySelectorAll( '[data-toggle="popover"]' ) );
            var popoverList = popoverTriggerList.map( function( popoverTrigger )
            {
                return new bootstrap.Popover( popoverTrigger );
            } );
        </script>
</body>


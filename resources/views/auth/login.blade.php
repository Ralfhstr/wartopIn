@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #ff953c;;
    }
</style>
    <div class="container-sm my-5 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card " style="background-color:#d8d8d8">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block" style="background-color: #ffffff">
                <img src="https://ypt.or.id/wp-content/uploads/2019/01/Logo-Primer-Vertikal-ITTelkom-Surabaya-White-300x300.png"
                    alt="login form" class="h-100" style="padding-left: 0px; padding-right: 0px;" />

              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h2 fw-bold mb-0">Wartop.in</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <div class="row mb-3">
                        <div class="col-md-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Your Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-10">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Your Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">
                        {{__('Login')}}</button>
                    </div>

                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="{{route('register')}}"
                        style="color: #393f81;">Register here</a></p>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

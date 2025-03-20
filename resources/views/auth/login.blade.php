@extends('layouts.guest')

@section('auth')

<div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Sa</b>lon</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Sign in to start your session</p>
            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group @error('email') is-invalid @enderror">
                <input type="email" class="form-control" name="email" placeholder="Email" />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3"></div>
            <div class="input-group @error('password') is-invalid @enderror">
                <input type="password" class="form-control" name="password" placeholder="Password" />
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3"></div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me"> Remember Me </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">LogIn</button>
                </div>
                </div>
                <!-- /.col -->
            </div>
            <!--end::Row-->
            </form>
            {{-- <div class="social-auth-links text-center mb-3 d-grid gap-2">
            <p>- OR -</p>
            <a href="#" class="btn btn-primary">
                <i class="bi bi-facebook me-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-danger">
                <i class="bi bi-google me-2"></i> Sign in using Google+
            </a>
            </div> --}}
            <!-- /.social-auth-links -->
            @if (Route::has('password.request'))
            <p class="mb-0">
            <a href="{{ route('password.request') }}" class="text-center"> I forgot my password </a>
            </p>
            @endif
            <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center"> Register a new membership </a>
            </p>
        </div>
    </div>
  </div>

@endsection
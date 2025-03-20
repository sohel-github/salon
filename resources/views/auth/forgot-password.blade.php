@extends('layouts.guest')

@section('auth')

<div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Sa</b>lon</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="register-box-msg">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="input-group @error('email') is-invalid @enderror">
                    <input type="email" class="form-control" name="email" placeholder="Email" />
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                </div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="mb-3"></div>
                <!--begin::Row-->
                <div class="row">
                    <div class="col-12">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Email Password Reset Link</button>
                    </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </form>

            <div class="mb-3"></div>
            
            <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center"> I know my credentials </a>
            </p>
            
            <p class="mb-0">
            <a href="{{ route('register') }}" class="text-center"> Register a new membership </a>
            </p>
        </div>
    </div>
  </div>

@endsection

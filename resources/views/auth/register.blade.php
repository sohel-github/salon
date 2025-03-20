@extends('layouts.guest')

@section('auth')

<div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Sa</b>lon</a>
    </div>
    <!-- /.register-logo -->
    <div class="card">
        <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group @error('name') is-invalid @enderror">
                <input type="text" class="form-control" name="name" placeholder="Full Name" />
                <div class="input-group-text"><span class="bi bi-person"></span></div>
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3"></div>
            <div class="input-group @error('email') is-invalid @enderror">
                <input type="email" class="form-control" name="email" placeholder="Email" />
                <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            </div>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3"></div>
            <div class="input-group @error('phone') is-invalid @enderror">
                <input type="text" class="form-control" name="phone" placeholder="Phone" />
                <div class="input-group-text"><span class="bi bi-telephone"></span></div>
            </div>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3"></div>
            <div class="input-group">
                <select name="role" class="form-control">
                    <option value="">Select the Role</option>
                    {{-- <option value="admin">Admin</option> --}}
                    <option value="customer">Customer</option>
                    <option value="salon_owner">Salon Owner</option>
                </select>
                <div class="input-group-text"><span class="bi bi-people"></span></div>
            </div>
            @error('role')
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
            <div class="input-group">
                <input type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" />
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3"></div>
            <!--begin::Row-->
            <div class="row">
                <div class="col-8">
                    {{-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    <label class="form-check-label" for="flexCheckDefault">
                        I agree to the <a href="#">Terms & Condition</a>
                    </label>
                    </div> --}}
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Register</button>
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
        <p class="mb-0">
            <a href="{{ route('login') }}" class="text-center"> I already have a membership </a>
        </p>
        </div>
    </div>
  </div>

@endsection
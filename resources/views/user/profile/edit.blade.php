@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <!--begin::Container-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xs-12 col-sm-3"></div>
            <div class="col-xs-12 col-sm-6">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Profile</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf 
                                @method('PUT')
    
                                <div class="mb-3">
                                    <label for="image" class="form-label">Profile Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @if($profile && $profile->image)
                                        <img src="{{ asset('storage/' . $profile->image) }}" width="100" class="mt-2 user-image rounded-circle shadow" alt="{{ Auth::user()->name }}">
                                    @endif
                                </div>
                        
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" name="address">{{ $profile->address ?? '' }}</textarea>
                                </div>
                        
                                <div class="mb-3">
                                    <label for="social_link" class="form-label">Social Page Link</label>
                                    <input type="url" class="form-control" name="social_link" value="{{ $profile->social_link ?? '' }}">
                                </div>
                        
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" name="birthday" value="{{ $profile->birthday ?? '' }}">
                                </div>
                        
                                <div class="mb-3">
                                    <label for="blood_group" class="form-label">Blood Group</label>
                                    <input type="text" class="form-control" name="blood_group" value="{{ $profile->blood_group ?? '' }}">
                                </div>
                        
                                <button type="submit" class="btn btn-success">Update Profile</button>
                            </form>
                        
                        
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-3"></div>
        </div>
    </div>
</div>

@endsection

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
                        <h3 class="card-title">User Profile</h3>
                        <div class="card-tools">
                            <a href="{{ route('profile.edit') }}" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i> Edit Profile</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="text-center mb-2">
                            @if($profile && $profile->image)
                                <img src="{{ asset('storage/' . $profile->image) }}" width="100" class="user-image rounded-circle shadow" alt="{{ Auth::user()->name }}">
                            @else
                                <img src="{{ asset('admin/img/user2-160x160.jpg') }}" width="100" class="user-image rounded-circle shadow" alt="{{ Auth::user()->name }}">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{ Auth::user()->name }} <b>({{ ucwords(Auth::user()->role) }})</b></h3>
                        <p class="text-muted text-center">{{ Auth::user()->email }}</p>

                        <hr/>
                        <div>
                            <h4>Address</h4>
                            <p>{{ $profile->address ?? '' }}</p>
                        </div>
                        <div>
                            <h4>Social Link</h4>
                            <p><a href="{{ $profile->social_link }}" target="_blank">{{ $profile->social_link ?? '' }}</a></p>
                        </div>
                        <div>
                            <h4>Phone</h4>
                            <p>{{ Auth::user()->phone ?? '' }}</p>
                        </div>
                        <div>
                            <h4>Birthday</h4>
                            <p>{{ $profile->birthday ?? '' }}</p>
                        </div>
                        <div>
                            <h4>Blood Group</h4>
                            <p>{{ $profile->blood_group ?? '' }}</p>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-xs-12 col-sm-3"></div>
        </div>
    </div>
</div>

@endsection

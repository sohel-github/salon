@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Salons</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.salons.update') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Salon Owner</label>
                                <select class="form-select form-select-sm" name="owner_id" id="" required="">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ $salon->owner_id == $owner->id ? 'selected' : '' }}>
                                            {{ $owner->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Salon Name</label>
                                <input type="text" name="name" class="form-control form-control-sm" value="{{ $salon->name }}" required="">
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="name" class="form-control form-control-sm" value="{{ $salon->phone }}" required="">
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <textarea name="address" class="form-control form-control-sm" rows="5" required>{{ $salon->address }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Opening Hours (JSON Format)</label>
                                <input type="text" name="opening_hours" class="form-control form-control-sm" value="{{ $salon->opening_hours }}" required="">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Update Salon</button>
                            <a href="{{ route('admin.salons.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Add Service</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.services.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label>Salon Name</label>
                                <select class="form-select form-select-sm" name="salon_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($salons as $salon)
                                        <option value="{{ $salon->id }}">{{ $salon->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Service Name</label>
                                <input type="text" name="name" class="form-control form-control-sm" id="" required="">
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control form-control-sm" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control form-control-sm" required>
                            </div>
                            <div class="mb-3">
                                <label>Duration</label>
                                <input type="text" name="duration" class="form-control form-control-sm" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Create Service</button>
                            <a href="{{ route('admin.services.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

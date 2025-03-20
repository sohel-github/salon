@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Update Category</button>
                            <a href="{{ route('admin.categories.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

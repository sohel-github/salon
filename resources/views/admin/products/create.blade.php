@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Add Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.products.store') }}" method="POST" enctype='multipart/form-data'>
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control form-select-sm @error('name') is-invalid @enderror" name="name" required>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label>Category</label>
                                <select class="form-select form-select-sm @error('category_id') is-invalid @enderror" name="category_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control form-control-sm @error('image') is-invalid @enderror" />
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" name="description" required></textarea>
                            </div>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" required>
                            </div>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label>Stock</label>
                                <input type="text" class="form-control form-control-sm @error('stock') is-invalid @enderror" name="stock" required>
                            </div>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Create Product</button>
                            <a href="{{ route('admin.products.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

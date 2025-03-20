@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype='multipart/form-data'>
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Category</label>
                                <select class="form-select form-select-sm" name="category_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control form-control-sm" />
                                <img src="{{ $product->name }}" style="width:80px;height:80px" class="img=fluid" />
                            </div>
                            <div class="mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required>{{ $product->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock" value="{{ $product->stock }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Update Product</button>
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

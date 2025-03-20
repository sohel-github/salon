@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Add Inventory</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.inventories.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label>Product</label>
                                <select class="form-select form-select-sm" name="product_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="text" class="form-control form-control-sm" name="quantity" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Transaction type</label>
                                <select class="form-select form-select-sm" name="transaction_type" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="add">Add</option>
                                    <option value="remove">Remove</option>
                                    <option value="sale">Sale</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Notes</label>
                                <textarea class="form-control form-control-sm" rows="5" name="notes" required></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Create Inventory</button>
                            <a href="{{ route('admin.inventories.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Review</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.reviews.update') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label>User</label>
                                <select class="form-select form-select-sm" name="user_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $review->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Salon Name</label>
                                <select class="form-select form-select-sm" name="salon_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($salons as $salon)
                                        <option value="{{ $salon->id }}" {{ $review->user_id == $salon->id ? 'selected' : '' }}>{{ $salon->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label>Rating</label>
                                <input type="text" class="form-control" name="rating" value="{{ $review->rating }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Comments</label>
                                <textarea class="form-control" name="comment" required>{{ $review->comment }}</textarea>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Update Review</button>
                            <a href="{{ route('admin.reviews.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

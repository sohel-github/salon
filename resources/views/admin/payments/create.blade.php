@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Add Payment</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.payments.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            <div class="mb-3">
                                <label>Appointment Name</label>
                                <select class="form-select form-select-sm" name="appointment_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($appointments as $appointment)
                                        <option value="{{ $appointment->id }}">#{{ $appointment->id }} - {{ $appointment->service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>User</label>
                                <select class="form-select form-select-sm" name="user_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Amount</label>
                                <input type="text" class="form-control" name="amount" required>
                            </div>
                            <div class="mb-3">
                                <label>Payment Method</label>
                                <select class="form-select form-select-sm" name="payment_method" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="card">Card</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="upi">Upi</option>
                                    <option value="cash">Cash</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select form-select-sm" name="status" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="pending">Pending</option>
                                    <option value="successful">Successful</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_id" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Create Payment</button>
                            <a href="{{ route('admin.payments.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection

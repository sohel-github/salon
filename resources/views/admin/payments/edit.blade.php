@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Payment</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.payments.update') }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Appointment Name</label>
                                <select class="form-select form-select-sm" name="appointment_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($appointments as $appointment)
                                        <option value="{{ $appointment->id }} {{ $appointment->id == $payment->appointment_id ? 'selected' : '' }}" {{ $appointment->appointment_id == $appointment->id ? 'selected' : '' }}>#{{ $appointment->id }} - {{ $appointment->service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>User Name</label>
                                <select class="form-select form-select-sm" name="user_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $payment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label>Amount</label>
                                <input type="datetime-local" name="amount" class="form-control form-control-sm" value="{{ $payment->amount }}" required="">
                            </div>
                            <div class="mb-3">
                                <label>Payment Method</label>
                                <select class="form-select form-select-sm" name="payment_method" id="" required="">
                                    <option value="card" {{ $payment->payment_method == 'card' ? 'selected' : '' }}>Card</option>
                                    <option value="paypal" {{ $payment->payment_method == 'paypal' ? 'selected' : '' }}>Paypal</option>
                                    <option value="upi" {{ $payment->payment_method == 'upi' ? 'selected' : '' }}>Upi</option>
                                    <option value="cash" {{ $payment->payment_method == 'cash' ? 'selected' : '' }}>Cash</option>
                                    <option value="other" {{ $payment->payment_method == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select form-select-sm" name="status" id="" required="">
                                    <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="successful" {{ $payment->status == 'successful' ? 'selected' : '' }}>Successful</option>
                                    <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Transaction ID</label>
                                <input type="text" class="form-control" name="transaction_id" value="{{ $payment->transaction_id }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Update Payment</button>
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
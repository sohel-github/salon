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
                                <select class="form-select form-select-sm @error('salon_id') is-invalid @enderror" name="appointment_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($appointments as $appointment)
                                        <option value="{{ $appointment->id }}">#{{ $appointment->id }} - {{ $appointment->service->name }}</option>
                                    @endforeach
                                </select>
                                @error('salon_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>User</label>
                                <select class="form-select form-select-sm @error('user_id') is-invalid @enderror" name="user_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Amount</label>
                                <input type="text" class="form-control form-select-sm @error('amount') is-invalid @enderror" name="amount" required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Payment Method</label>
                                <select class="form-select form-select-sm @error('payment_method') is-invalid @enderror" name="payment_method" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="card">Card</option>
                                    <option value="paypal">Paypal</option>
                                    <option value="upi">Upi</option>
                                    <option value="cash">Cash</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('payment_method')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select form-select-sm @error('status') is-invalid @enderror" name="status" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="pending">Pending</option>
                                    <option value="successful">Successful</option>
                                    <option value="paid">Paid</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Transaction ID</label>
                                <input type="text" class="form-control form-select-sm @error('transaction_id') is-invalid @enderror" name="transaction_id" required>
                                @error('transaction_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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

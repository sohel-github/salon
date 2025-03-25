@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Appointment</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
                        <div class="card-body">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>User Name</label>
                                <select class="form-select form-select-sm @error('user_id') is-invalid @enderror" name="user_id" id="" required="">
                                    <option selected="" value="">Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ $appointment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Salon Name</label>
                                <select class="form-select form-select-sm @error('salon_id') is-invalid @enderror" name="salon_id" id="" required="">
                                    <option selected="" value="">Choose...</option>
                                    @foreach($salons as $salon)
                                        <option value="{{ $salon->id }}" {{ $service->salon_id == $salon->id ? 'selected' : '' }}>{{ $salon->name }}</option>
                                    @endforeach
                                </select>
                                @error('salon_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Service Name</label>
                                <select class="form-select form-select-sm @error('service_id') is-invalid @enderror" name="service_id" id="" required="">
                                    <option selected="" value="">Choose...</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ $appointment->service_id == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Appointment Time</label>
                                <input type="datetime-local" name="appointment_time" class="form-control form-control-sm @error('appointment_time') is-invalid @enderror" value="{{ $appointment->appointment_time }}" required="">
                                @error('appointment_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select form-select-sm @error('status') is-invalid @enderror" name="status" id="" required="">
                                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="canceled" {{ $appointment->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label>Payment Status</label>
                                <select class="form-select form-select-sm @error('payment_status') is-invalid @enderror" name="payment_status" id="" required="">
                                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="paid" {{ $appointment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                    <option value="pay_later" {{ $appointment->status == 'pay_later' ? 'selected' : '' }}>Pay Later</option>
                                </select>
                                @error('payment_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Update Appointment</button>
                            <a href="{{ route('admin.appointments.index') }}" class="float-end btn btn-sm">Cancel</a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
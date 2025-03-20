@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Add Appointment</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ route('admin.appointments.store') }}" method="POST">
                        <div class="card-body">
                            @csrf
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
                                <select class="form-select form-select-sm" name="service_id" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Appointment Time</label>
                                <input type="datetime-local" class="form-control" name="appointment_time" required>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <select class="form-select form-select-sm" name="status" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Confirmed</option>
                                    <option value="completed">Completed</option>
                                    <option value="canceled">Canceled</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Payment Status</label>
                                <select class="form-select form-select-sm" name="payment_status" id="" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="pay_later">Pay Later</option>
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-primary btn-sm">Create Appointment</button>
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

@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <!--begin::Container-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">All Payments</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.payments.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> Add Payments</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Appointment Name</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Transaction ID</th>
                                <th style="width: 40px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment)
                                    <tr class="align-middle">
                                        <td>{{ $payment->id }}.</td>
                                        <td>{{ $payment->appointment->service->name }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->payment_method }}</td>
                                        <td>{{ $payment->status }}</td>
                                        <td>{{ $payment->transaction_id }}</td>
                                        <td>
                                            <div style="display: flex;">
                                                <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-info btn-sm" title="edit"><i class="bi bi-pen"></i></a> &nbsp;
                                                <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="delete"><i class="bi bi-trash"></i></a></button>
                                                </form> &nbsp;
                                                {{-- <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-success btn-sm" title="view"><i class="bi bi-eye"></i></a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger" role="alert">
                                       There are no payments data added yet:( 
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $payments->links() }}
                        {{-- <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul> --}}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection

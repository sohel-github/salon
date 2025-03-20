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
                        <h3 class="card-title">Service Report for {{ $month }}</h3>
                        <div class="card-tools">
                            {{-- <a href="{{ route('admin.reviews.create') }}" class="btn btn-success btn-sm"><i class="bi bi-plus"></i> Add Reviews</a> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th style="width: 10px">#</th>
                                <th>Service</th>
                                <th>Appointments</th>
                                <th>Total Revenue</th>
                                <th>Date</th>
                                <th style="width: 40px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr class="align-middle">
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ $service->id }}</td>
                                        <td>${{ $service->price }}</td>
                                        <td>{{ $service->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div style="display: flex;">
                                                {{-- <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-info btn-sm" title="edit"><i class="bi bi-pen"></i></a> &nbsp;
                                                <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="delete"><i class="bi bi-trash"></i></a></button>
                                                </form> &nbsp; --}}
                                                {{-- <a href="{{ route('admin.appointments.show', $appointment->id) }}" class="btn btn-success btn-sm" title="view"><i class="bi bi-eye"></i></a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger" role="alert">
                                       There are no month report data added yet:( 
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $sales->links() }}
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

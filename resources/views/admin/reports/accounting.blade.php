@extends('admin.layouts.app')

@section('content')

<div class="app-content mt-4">
    <!--begin::Container-->
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Accounting Report</h3>
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
                                <th>Income</th>
                                <th>Expenses</th>
                                <th>Profit</th>
                                <th style="width: 40px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${{ $income }}</td>
                                    <td>${{ $expenses }}</td>
                                    <td>${{ $profit }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ route('admin.downloadReport', 'csv') }}" class="btn btn-success">Download CSV</a>
                        <a href="{{ route('admin.downloadReport', 'excel') }}" class="btn btn-primary">Download Excel</a>
                        <a href="{{ route('admin.downloadReport', 'pdf') }}" class="btn btn-danger">Download PDF</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>

@endsection

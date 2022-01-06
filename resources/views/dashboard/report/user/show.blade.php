@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
    <a href="{{ route('report_user.index') }}">User Reports</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')

    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">All Reports For User: <span class="text-green"> {{ $reportUser->account->full_name }} </span></h3>
            {{--            <a data-target="#modal-create-category" data-toggle="modal" class="btn btn-sm btn-primary ml-auto" > Create New Category </a>--}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th> Time </th>

                </tr>
                </thead>
                <tbody>

                @forelse ($reportUser->reports_user as $report)
                    <tr class="text-center">

                        <td>{{ $loop->iteration }}</td>
                        <td>Report by  <span class="badge bg-danger">{{ $report->reporter->account->full_name }}</span> </td>
                        <td>
                            {{$report->created_at->toDayDateTimeString()}}
                        </td>
                    </tr>

                @empty
                    <tr class="text-center">
                        <td colspan="3">
                            <h5>
                                <i class="far fa-frown"></i>   Sorry There No Reports For This product
                            </h5>
                        </td>
                    </tr>
                @endforelse


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>

@endsection

@section('scripts')

@endsection

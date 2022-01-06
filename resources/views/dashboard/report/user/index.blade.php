@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">User Reports</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th style="width: 10px">#</th>
                    <th>User Name</th>
                    <th>
                        Count of Reports
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->account->full_name }}</td>
                        <td >
                            {{$user->reports_user_count}}
                        </td>
                        <td> <a class="btn btn-success btn-sm" href="{{ route('report_user.show' , $user) }}">
                            <i class="fas fa-eye"></i>
                        </a></td>
                    </tr>
                    {{-- @include('dashboard.category.modals._categoryModal' , $category) --}}
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>

    {{-- @include('dashboard.category.modals._categoryModalCreate') --}}
@endsection

@section('scripts')

@endsection

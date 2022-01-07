@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">Product Reports</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th style="width: 10px">#</th>
                    <th>Product Name</th>
                    <th>
                        Count of Reports
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>

                @foreach ($products as $product)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td >
                            {{$product->reports_count}}
                        </td>
                        <td> <a class="btn btn-success btn-sm" href="{{ route('report_product.show' , $product) }}">
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

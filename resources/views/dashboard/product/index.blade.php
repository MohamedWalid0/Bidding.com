@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
    <a href="{{ route('category.index') }}">categories</a>
    <li class="breadcrumb-item active"></li>
@endsection


@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-header  ">
        <h3 class="card-title">Products</h3>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product name</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach ( $products as $product )

                        <tr>
                            <td>
                                <p>
                                    {{ $product->name }}
                                </p>
                            </td>
                            <td>
                                {{ $product->status }}
                            </td>

                            <td>
                                <button data-target="#modal-{{ $product->id }}" data-toggle="modal"
                                    class="btn btn-primary btn-sm" >
                                    Stop Product <i class="fas fa-edit"></i>
                                </button>
                            </td>

                        </tr>

                    @include('dashboard.product.models._modifyProductStatus')


                @endforeach

            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->



{{-- @include('dashboard.roles.modals._RoleModalCreate') --}}






@endsection



@section('scripts')



@endsection

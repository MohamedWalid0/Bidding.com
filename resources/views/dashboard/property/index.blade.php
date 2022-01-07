@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">Properties</h3>
            <a data-target="#modal-create-category" data-toggle="modal" class="btn btn-sm btn-primary ml-auto" > Create New Property </a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>
                        Actions
                    </th>

                </tr>
                </thead>
                <tbody>

                @foreach ($properties as $property)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $property->name }}</td>
                        <td >
                            <button data-target="#modal-{{ $property->id }}" data-toggle="modal"  class="btn btn-warning btn-sm" >
                                <i class="fas fa-edit"></i>
                            </button>

                            <a class="btn btn-success btn-sm" href="{{ route('property.show' , $property) }}">
                                <i class="fas fa-eye"></i>
                            </a>


                            <form
                                action="{{ route('property.destroy' , $property) }}"
                                method="post"
                                style="display: inline-block;"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('{{ __('Are you sure?') }}')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @include('dashboard.property.modals._propertyModal' , $property)
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>

    @include('dashboard.property.modals._propertyModalCreate')
@endsection

@section('scripts')

@endsection

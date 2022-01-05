@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
    <a href="{{ route('category.index') }}">categories</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Add New Value to <span class="text-green"> {{ $property->name }} </span> </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('property.property_value.store' , $property) }}" method="post">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-group">
                    <label for="subCategory">Name</label>
                    <input type="text" class="form-control" id="subCategory" name="value" value="{{ old('name') }}"
                           placeholder="Enter name">
                </div>
                @if ($errors->storePropertyValue->any())
                    @foreach ($errors->storePropertyValue->all() as $error)
                        <div class="text-danger">{{$error}}</div>
                    @endforeach
                @endif
            </div>


            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>



    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">All Values For : <span class="text-green"> {{ $property->name }} </span></h3>
            {{--            <a data-target="#modal-create-category" data-toggle="modal" class="btn btn-sm btn-primary ml-auto" > Create New Category </a>--}}
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

                @forelse ($property->values as $value)
                    <tr class="text-center">

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->value }}</td>
                        <td>
                            <button data-target="#modal-{{ $value->id }}" data-toggle="modal"
                                    class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form
                                action="{{ route('category.sub_category.destroy' , [$property , $value]) }}"
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
                    {{-- @include('dashboard.subCategory.modals._subCategoryModal' , $subCategory) --}}
                @empty
                    <tr class="text-center">
                        <td colspan="3">
                            <h5>
                                <i class="far fa-frown"></i>   Sorry There No Values For This Property
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

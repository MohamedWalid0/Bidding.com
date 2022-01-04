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
            <h3 class="card-title"> Assign New Property to <span class="text-green"> {{ $subCategory->name }} </span> </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('subcategory.assign' , [$category , $subCategory]) }}" method="post">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-group">
                    <label for="subCategory">Name</label>
                    <select class="custom-select my-1 mr-sm-2" name="property_id" id="inlineFormCustomSelectPref">
                        <option selected>Choose Property...</option>
                        @foreach ($properties as $property )
                            <option value="{{$property->id}}"> {{$property->name}} </option>
                        @endforeach
                    </select>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
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
            <h3 class="card-title">All Properties For Subcategory : <span class="text-green"> {{ $subCategory->name }} </span></h3>
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

                @forelse ($subCategory->properties as $property)
                    <tr class="text-center">

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $property->name }}</td>
                        <td>

                            <a class="btn btn-success btn-sm"
                            href="{{ route('property.show' , $property) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form
                                action="{{ route('subcategory.unassign' , [$category , $subCategory]) }}"
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
                                <i class="far fa-frown"></i>   Sorry There No Subcategory For This Category
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

@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
    <a href="{{ route('category.index') }}">categories</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('css')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"
    />
@endsection

@section('content')
    @can('create' , \App\Models\SubCategory::class)
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Add New Sub Category </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('category.sub_category.store' , $category) }}" method="post">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="subCategory">Name</label>
                        <input type="text" class="form-control" id="subCategory" name="name" value="{{ old('name') }}"
                               placeholder="Enter name">
                    </div>
                    @if ($errors->storeSubcategory->any())
                        @foreach ($errors->storeSubcategory->all() as $error)
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
    @endcan



    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">All Sub Categories For : <span class="text-green"> {{ $category->name }} </span></h3>
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

                @forelse ($category->subCategories as $subCategory)
                    <tr class="text-center">

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $subCategory->name }}</td>
                        <td>
                            @can('update' , \App\Models\SubCategory::class)
                                <button data-target="#modal-{{ $subCategory->id }}" data-toggle="modal" data-subCategory-id="{{ $subCategory-> id}}"
                                        class="btn btn-warning btn-sm photoFilepond">
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endcan

                            @can('view' ,\App\Models\SubCategory::class )
                                <a class="btn btn-success btn-sm"
                                   href="{{ route('category.sub_category.show' , [$category , $subCategory]) }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            @endcan

                            @can('delete' ,\App\Models\SubCategory::class )
                                <form
                                    action="{{ route('category.sub_category.destroy' , [$category , $subCategory]) }}"
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
                            @endcan
                        </td>
                    </tr>
                    @include('dashboard.subCategory.modals._subCategoryModal' , $subCategory)
                @empty
                    <tr class="text-center">
                        <td colspan="3">
                            <h5>
                                <i class="far fa-frown"></i> Sorry There No Subcategory For This Category
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
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        // Get a reference to the file input element
        const inputElement = document.querySelectorAll('input[type="file"]');
        inputElement.forEach( input => {
            FilePond.create(input)
        })

        $(document).on('click', '.photoFilepond', function (e) {
            // e.preventDefault();
            var subCategoryId = $(this).attr('data-subCategory-id');
            var    response =    FilePond.setOptions({
                server: {
                    url: 'http://ebid.test/dashboard/upload/SubCategory/' + subCategoryId ,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            });
            console.log(response.server.url)
        });


    </script>
@endsection

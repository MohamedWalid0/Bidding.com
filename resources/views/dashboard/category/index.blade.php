@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
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
    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">Categories</h3>
            <a data-target="#modal-create-category" data-toggle="modal" class="btn btn-sm btn-primary ml-auto" > Create New Category </a>
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

                @foreach ($categories as $category)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            @if( $category->images()->exists() )
                                <img
                                    src="{{ asset('img/front/categories/'.$category->id . '/thump-' . $category->images->first()->image_path ) }}"
                                    class="rounded-circle " alt="">
                            @else
                                <img
                                    src="https://source.unsplash.com/random"
                                    class="rounded-circle " alt="">
                            @endif
                        </td>
                        <td >

                            @can('viewAny' , \App\Models\Category::class)
                                <button data-target="#modal-{{ $category->id }}" data-toggle="modal"  class="btn btn-warning btn-sm photoFilepond"  data-category-id="{{ $category-> id}}" >
                                    <i class="fas fa-edit"></i>
                                </button>
                            @endcan

                            @can('view' , \App\Models\Category::class)
                                    <a class="btn btn-success btn-sm" href="{{ route('category.show' , $category) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                @endcan

                            @can('delete' , \App\Models\Category::class)
                                    <form
                                        action="{{ route('category.destroy' , $category) }}"
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
                    @include('dashboard.category.modals._categoryModal' , $category)
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->

    </div>

    @include('dashboard.category.modals._categoryModalCreate')
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
            var categoryId = $(this).attr('data-category-id');
            FilePond.setOptions({
                server: {
                    url: 'http://ebid.test/dashboard/upload/Category/' + categoryId ,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }
            });
        });


    </script>
@endsection

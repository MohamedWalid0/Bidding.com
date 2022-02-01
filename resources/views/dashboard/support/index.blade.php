@extends('layouts.master')

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>

@endsection

@section('content')




    <div class="card">
        <div class="card-header d-flex justify-content-between ">
            <h3 class="card-title">All Support Messages </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th style="width: 10px">#</th>
                    <th>message</th>
                    <th>
                        Actions
                    </th>

                </tr>
                </thead>
                <tbody>

                @forelse ($supports as $support)
                    <tr class="text-center">

                        <td>{{ $loop->iteration }}</td>
                        <td class="w-75">
                            <p>
                                {{ $support->message }}
                            </p>
                            From : <span class="badge bg-danger"> <i class="fas fa-user"></i> {{ $support->user->account->full_name }}</span>


                        </td>
                        <td>

                            <div class="mt-4">
                                @can( 'reply', \App\Models\Support::class)
                                    <button data-target="#modal-{{ $support->id }}" data-toggle="modal"
                                            class="btn btn-warning btn-sm">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                @endcan
                                @can( 'delete', \App\Models\Support::class)
                                    <form
                                        action="{{ route('support.delete' ,$support ) }}"
                                        method="post"
                                        style="display: inline-block;"
                                    >
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('{{ __('Are you sure?') }}')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endcan


                            </div>


                        </td>
                    </tr>
                    @include('dashboard.support.modals._replayModal' , $support)
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

@endsection

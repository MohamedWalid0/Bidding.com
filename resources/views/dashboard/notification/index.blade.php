@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href=" {{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection

@section('navigation')
    <a href="{{ route('dashboard') }}">Home</a>
    <li class="breadcrumb-item active"></li>
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"> Send Notification to users </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('notification.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="card-body">


                @csrf
                <div class="form-group">
                    <label for="message">Enter message</label>
                    <input type="text" class="form-control" name="message" id="message" placeholder="Enter message">
                </div>

                <div class="form-group" data-select2-id="30">
                    <label> Select Users </label>
                    <div class="select2-purple" data-select2-id="29">
                        <select class="select2 select2-hidden-accessible" name="ids[]" multiple
                                data-placeholder="Select a State" data-dropdown-css-class="select2-purple"
                                style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                            @foreach ($users as $user)
                                <option data-select2-id="{{ $user->id }}"
                                        value="{{ $user->id }}">{{ $user->account->full_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <!-- /.form-group -->
                </div>


                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                @endif

            </div>


            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Send</button>
            </div>
        </form>

    </div>



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Recently Notifications</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <ul class="products-list product-list-in-card pl-2 pr-2">
                @forelse(auth()->user()->notifications as $notification)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{ auth()->user()->avatarUrl() }}" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{ $notification->data['title'] }}
                                <span class="badge badge-info float-right">new</span></a>
                            <span class="product-description">
                       {{ $notification->data['body'] }}
                      </span>
                        </div>
                    </li>
                @empty

                @endforelse

            </ul>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }} "></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endsection

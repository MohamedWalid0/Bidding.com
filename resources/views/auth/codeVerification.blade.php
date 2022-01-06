@extends('layouts.auth')

@section('content')
    <div class="login-page">

        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <a class="h1"><b>eBid</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Please enter the verification code send to phone number :</p>

                    <form action="{{ route('verifyUserPhone') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input id="code" type="code" class="form-control @error('code') is-invalid @enderror"
                                name="code"  autocomplete="current-code" placeholder="code">
                            @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- /.col -->
                            <div class="col-4 m-auto">
                                <button type="submit" class="btn btn-primary btn-block">Confirm</button>

                            </div>
                            <!-- /.col -->
                        </div>
                    </form>


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

    </div>
@endsection

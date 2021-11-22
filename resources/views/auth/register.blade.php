@extends('layouts.auth')

@section('content')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a class="h1"><b>Bido</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('register') }}" method="post">
                    @csrf
                    @error('name')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="name" type="text" class="form-control "
                               name="name"
                               value="{{ old('name') }}"  autocomplete="name" placeholder="Full Name">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                    </div>

                    @error('email')
                        <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control "
                               name="email" value="{{ old('email') }}"  autocomplete="email"
                               placeholder="Email">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    {{-- phone --}}
                    @error('phone')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="phone" type="number" class="form-control "
                               name="phone"
<<<<<<< HEAD
                               value="{{ old('phone') }}" required autocomplete="name" placeholder="phone">


=======
                               value="{{ old('phone') }}"  autocomplete="name" placeholder="phone">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
>>>>>>> 54fd90c2e8a7f623f333b9aec54e7d19dce825ea
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    {{-- address --}}
                    @error('address')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="address" type="text" class="form-control "
                               name="address"
<<<<<<< HEAD
                               value="{{ old('address') }}" required autocomplete="address" placeholder="Address">

=======
                               value="{{ old('address') }}"  autocomplete="address" placeholder="Address">
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
>>>>>>> 54fd90c2e8a7f623f333b9aec54e7d19dce825ea
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>


                    {{-- age --}}
<<<<<<< HEAD
                    @error('age')
                    <span class="text-danger" role="alert">
=======
                    <div class="input-group mb-3">
                        <input id="age" type="number" class="form-control" name="age"
                               value="{{ old('age') }}"  autocomplete="name" placeholder="age">
                        @error('age')
                        <span class="invalid-feedback" role="alert">
>>>>>>> 54fd90c2e8a7f623f333b9aec54e7d19dce825ea
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age"
                               value="{{ old('age') }}" required autocomplete="name" placeholder="age">

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>

                    @error('password')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input id="password" type="password"
<<<<<<< HEAD
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password" placeholder="Password">

=======
                               class="form-control "
                               name="password"  autocomplete="new-password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
>>>>>>> 54fd90c2e8a7f623f333b9aec54e7d19dce825ea
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required autocomplete="new-password" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    @error('city')
<<<<<<< HEAD
                    <span class="text-danger" role="alert">
=======
                        <span class="invalid-feedback" role="alert">
>>>>>>> 54fd90c2e8a7f623f333b9aec54e7d19dce825ea
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">

<<<<<<< HEAD
                        <select class="custom-select rounded-0" id="exampleSelectRounded0" name="city">
                            <option selected hidden>Select your City</option>
                            @foreach (\App\Models\City::all() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach

=======
                        <select  class="custom-select rounded-0" id="city" name="city">
                            <option selected hidden >Select your City</option>
                            @foreach (\App\Models\City::all() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
>>>>>>> 54fd90c2e8a7f623f333b9aec54e7d19dce825ea
                        </select>

                    </div>


                    <input type="hidden" name="role_id" value="{{ \App\Models\Role::getAdminRoleId() }}">
                    {{-- gender --}}
                    @error('gender_id')
                    <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender_id" value="{{ \App\Models\Gender::getMaleId() }}">
                            <label class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender_id" value="{{ \App\Models\Gender::getFemaleId() }}">
                            <label class="form-check-label">Female</label>
                        </div>

                    </div>


                    {{-- city --}}


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i>
                        Sign up using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i>
                        Sign up using Google+
                    </a>
                </div>

                <a href="{{ asset('login') }}" class="text-center">I already have a membership</a>
            </div>

        </div>
    </div>

@endsection

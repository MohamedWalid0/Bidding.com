@extends('layouts.auth')

@section('css')
    <link rel="stylesheet" href="{{asset( 'css/auth/register.css' ) }}">

@endsection


@section('content')


    <section class="home">

        <div class="left-section">

            <div class="left-part">

            </div>

        </div>
        <div class="right-section">

            <div class="right-part">

                <div class="left-form p-3">


                    <div>
                        <p class="infoTitle">
                            Register
                        </p>
                    </div>

                    <div>
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="role_id" value="{{ \App\Models\Role::getAdminRoleId() }}">
                            <input type="hidden" name="oAuthToken" value="{{ $callback->token ?? NULL}}">


                            @error('name')
                            <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-item">
                                <label id="nameLable" class="LableNonActive" >Full Name</label>
                                <input id="nameInput" type="text" class=" textNonActive"
                                       name="name"
                                       value="{{ $callback->name ?? old('name')}}"  autocomplete="name" placeholder="Full Name">
                            </div>


                            @error('email')
                                <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-item">
                                <label id="emailLable" class="LableNonActive px-3" >Email</label>

                                <input type="email" placeholder="Email" name="email"  id="emailInput"
                                    value="{{ $callback->email ?? old('email') }}"  autocomplete="email" class="textNonActive">
                            </div>


                            @error('phone')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-item">
                                <label id="phoneLable" class="LableNonActive px-3" >Phone</label>

                                <input type="text" placeholder="Phone" name="phone"
                                    value="{{ old('phone') }}" required autocomplete="name" id="phoneInput" class="textNonActive">
                            </div>




                            @error('address')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-item">
                                <label id="addressLable" class="LableNonActive px-2" >Address</label>

                                <input type="text" placeholder="Address" name="address"
                                value="{{ old('address') }}" required autocomplete="address"  id="addressInput" class="textNonActive">
                            </div>



                            @error('age')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-item">
                                <label id="nameLable"  class="LableNonActive px-4" >Age</label>

                                <input type="number" placeholder="Age" name="age"  id="age"
                                class="textNonActive  @error('age') is-invalid @enderror"
                                value="{{ old('age') }}" required autocomplete="name" >
                            </div>



                            @error('city')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="form-item">
                                <label id="placeLable" class="LableNonActive px-4" >City</label>
                                <select name="city" id="placeInput">
                                    <option selected hidden >Select your City</option>
                                    @foreach (\App\Models\City::all() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach


                                </select>
                            </div>




                            @error('gender_id')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-item d-flex justify-content-between pb-2">
                                <div class="form-item ">
                                    <label id="addressLable" class="LableNonActive px-2 pb-4" >Gender</label>

                                </div>

                                <div class="m-auto  d-flex">

                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="radio" name="gender_id" value="{{ \App\Models\Gender::getMaleId() }}">
                                        <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender_id" value="{{ \App\Models\Gender::getFemaleId() }}">
                                        <label class="form-check-label">Female</label>
                                    </div>

                                </div>
                            </div>



                    </div>

                </div>

                <div class="right-form p-3">


                        @error('password')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-item">
                            <label id="passwordLable" class="LableNonActive" >Password</label>

                            <input type="password" placeholder="Password"
                            required autocomplete="new-password" name="password" id="passwordInput" class="textNonActive @error('password') is-invalid @enderror">
                        </div>

                        <div class="form-item">
                            <label id="confirmPasswordLable" class="LableNonActive" >Password</label>

                            <input type="password" placeholder="Confirm Password"
                            required autocomplete="new-password" name="password_confirmation" id="confirmPasswordInput" class="textNonActive @error('password') is-invalid @enderror">
                        </div>



                        <div>

                            <div class="btn-container">
                                <button name="submit"> Submit </button>
                            </div>

                        </div>




                    </form>

                    <div class="social-auth-links text-center " >
                        <a href="{{ route('facebookLogin') }}" class="btn btn-block btn-primary text-sm">
                            <i class="fab fa-facebook mr-2"></i>
                            Sign up by Facebook
                        </a>
                        <a href="{{route('gitLogin')}}" class="btn btn-block btn-warning text-sm">
                            <i class="fab fa-github mr-2"></i>
                            Sign up by Github
                        </a>
                        <a href="{{ route('twitterLogin') }}" class="btn btn-block btn-outline-secondary text-sm">
                            <i class="fab fa-twitter mr-2"></i>
                            Sign up by Twitter
                        </a>
                    </div>

                    <a href="{{ asset('login') }}" class="text-center">I already have a membership</a>


                </div>


            </div>

        </div>

    </section>









@endsection


@section('scripts')
    <script src="{{ asset('js/auth/register.js') }}"></script>
@endsection

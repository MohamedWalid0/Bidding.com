@extends('layouts.layout')

@section('title')
    {{ $account->full_name }}
@endsection

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile/profile.css') }}"/>

    {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"> --}}

    <link rel="stylesheet" href="{{ asset('css/profile/ratingStar.css') }}">



    @livewireStyles
    {{-- alpineJs script --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

@endsection

@section('content')

    @include('layouts.header')

    <section class="pt-5 mt-5">

        <div class="container">
            <div class="row mb-5">
                <div class="col-md-3">
                    @include('front.profile.includes._asside')
                </div>
                <!-- start right side -->
                <div class="col-md-9 ">

                    <div class=" row">

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="p-4 text-center bg-white  shadow">
                                    <i class="fas fa-trophy text-muted icon-style"></i>
                                    <h1 class="mt-2">{{ $itemWonCount }}</h1>
                                    <h3 class="text-muted">Items Won</h3>


                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="p-4 text-center bg-white  shadow">
                                    <i class="fas fa-gavel text-warning icon-style"></i>
                                    <h1 class="mt-2">{{ $activeBidsCount }}</h1>
                                    <h3 class="text-warning">Active Bids</h3>


                                </div>
                            </div>
                        </div>


                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="p-4 text-center bg-white  shadow">
                                    <i class="fas fa-star text-danger icon-style"></i>
                                    <h1 class="mt-2">{{ $reviewsCount }}</h1>
                                    <h3 class="text-danger">Reviews Count</h3>


                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- start Dashboard Link -->
                    <div class="page" id="dashboard">
                        <div class="bg-white   shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>Purchasing</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Larry</td>
                                        <td>the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    <!-- end Dashboard Link -->


                    <!-- start Personal Data Link -->
                    @can('action' , \App\Models\User::class)
                        <div class="page" id="PersonalData">
                            @livewire('personal-data-profile' , ['account' => $account , 'user' => $user ] )
                        </div>
                    @endcan
                    <!-- end Personal Data Link -->
                    <div class="page" id="Reviews">
                        <h4 class="py-2">Reviews</h4>
                        <div class="media-block">
                            @forelse ($user->reviews as $review)


                                <div class="review">
                                    <a class="media-left" href="#"><img class="img-circle img-sm"
                                                                        alt="Profile Picture"
                                                                        src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
                                    <div class="media-body">
                                        <div class="mar-btm ml-3">
                                            <a href="#" class="btn-link text-semibold media-heading box-inline">
                                                {{$review->rate->userRated->account->full_name}}
                                            </a>

                                            <?php $rate = number_format($review->rate->rate) ?>
                                            <div class="rating">
                                                @for ($i = 1 ; $i<=$rate ; $i++ )
                                                    <i class="fa fa-star checked"></i>
                                                @endfor
                                                @for ($j = $rate+1  ; $j<=5 ; $j++ )
                                                    <i class="fa fa-star "></i>
                                                @endfor
                                            </div>
                                            <p class="text-muted text-sm">
                                                {{$review->created_at->diffForHumans()}}</p>
                                        </div>
                                        <p> {{$review->review}} </p>
                                    </div>

                                </div>
                                <hr>

                            @empty
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title text-center"> There Are No Reviews</h1>
                                    </div>
                                </div>
                            @endforelse

                        </div>
                    </div>

                    <!-- start My Bids Link -->
                    <div class="page" id="MyBids">
                        <div class="bg-white   shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>My Bids</h4>


                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($user->product_bids->load('user_bids') as $product )
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->bid->updated_at->toDayDateTimeString()}}</td>
                                            <td>
                                                @if ($product->last_bid === $user)
                                                    Winner Until now
                                                @else
                                                    Someone else bid
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end My Bids Link -->

                    <!-- start Notification Link -->
                    <div class="page" id="Notification">


                        @forelse (auth()->user()->notifications as $notification)
                            <div class="mb-2 bg-white   shadow">
                                <div class="card-body">
                                    <p class=" card-text"><i class="fas fa-bell text-success fa-lg"></i>
                                        <span class="ml-2"> {{ $notification->data['title'] }}  <span
                                                class="text-muted"> {{ $notification->created_at->diffForHumans() }}</span> </span>
                                        <br>
                                        <span class="ml-4"> --> {{ $notification->data['body'] }}</span>
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="mb-2 bg-white   shadow">
                                <div class="card-body">
                                    <p class=" card-text"><i class="fas fa-bell text-warning fa-lg"></i>
                                        <span class="ml-2"> There no notification </span>
                                    </p>
                                </div>
                            </div>
                        @endforelse


                    </div>
                    <!-- end Notification Link -->


                </div>
                <!-- end right side -->

            </div>
            <!-- end row -->

        </div>
        <!-- end container -->

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <livewire:update-profile/>

                    </div>
                </div>
            </div>
        </div>


    </section>


@endsection


@section('scripts')

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts/>
    <script>

        $(document).ready(function () {
            window.livewire.on('ProfileUpdated', () => {

                setTimeout(function () {
                    $(".alert-success").fadeOut('fast');
                }, 3000); // 3 secs
            });
        });

    </script>
@endsection


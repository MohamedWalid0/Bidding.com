@extends('layouts.layout')


@section('title')
    View Product
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">

    <link rel="stylesheet" href="{{asset('css/product/show-post.css')}}">

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    @livewireStyles
@endsection

@section('content')

    @include('layouts.header')

    <section class="py-5">

        <div class="container py-5">

            <div class="product-header mb-3">
                <p class="product-header--subtitle">
                    {{ $product->subCategory->category->name }} / {{$product->subCategory->name}}
                </p>
                <h2 class="product-header--title">{{$product->name}}</h2>
                <p class="product-header--subtitle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="16"
                         height="16" viewBox="0 0 24 24" stroke-width="2.5" stroke="#9e9e9e" fill="none"
                         stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="2"/>
                        <path
                            d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"/>
                    </svg>
                    3250 views
                </p>
            </div>
            <div class="product--underline"></div>
            <div class="row pt-5">
                <div class="col-md-5">
                    <div class="product-img zoom" id='ex1'>
                        @if (  $product->images()->exists() )
                            <img class="w-100 mainImage" id="zoom_01"
                                 src="{{ asset('img/front/products/'. $product->id . '/thump-' . $product->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}"
                                 alt="">
                        @else
                            <img class="w-100 mainImage" id="zoom_01"
                                 src="https://source.unsplash.com/random"
                                 alt="">
                        @endif
                    </div>
                    <div class="row pt-3">
                        @forelse($product->images as $image)
                            <div class="col-3">
                                <img class="w-100 pointer imageItem"
                                     src="{{ asset('img/front/products/'. $product->id . '/thump-' . $image->image_path)?? 'https://source.unsplash.com/random' }}"
                                     alt="">
                            </div>
                        @empty
                            <div class="col-3">
                                <img class="w-100 pointer imageItem"
                                     src="https://source.unsplash.com/random"
                                     alt="">
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-7">

                    <livewire:bid-deadline :product="$product"/>
                    <livewire:bid :product="$product"/>
                    @livewire('likable', ['modelType' => 'App\Models\Product' , 'model' => $product])
                    <p class="product-header--subtitle py-3">
                        Categories: <span class="span-bold"> {{$product->subCategory->category->name}} </span>
                    </p>

                    <livewire:bidding-users :product="$product">
                    {{-- <livewire:likable :modelType ="App\Models\Product" :modelId="$product->id"> --}}

                </div>
            </div>


            <button class="btn btn-primary p-0 pt-2">
                <!-- Button trigger modal -->
                <a type="button" data-toggle="modal" data-target="#reportModel">
                    <div class="profile-tabs container-fluid">
                        <p>
                            <i class="fas fa-flag text-danger"></i>
                            <span class="ml-2">Report Product ?</span>
                        </p>
                    </div>
                </a>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="reportModel" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ route('products.report') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p> Are you sure to report this Product ? </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary ">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <button class="btn btn-primary p-0 pt-2">
                <!-- Button trigger modal -->
                <a type="button" href="{{ route('products.generate',$product) }}">
                    <div class="profile-tabs container-fluid">
                        <p class="text-light">
                            <i class="fas fa-flag text-danger"></i>
                            <span class="ml-2">QR Code ?</span>
                        </p>
                    </div>
                </a>
            </button>


            {{-- <div class="card mt-5">
            <div class="card-header">
                <div class="nav nav-tabs nav-pills nav-justified" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">
                        Informations</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">
                        Descreption</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">
                        Comments</a>

            </div>
            </div>
            <div class="card-body">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                    <div class="page" id="dashboard">
                        <div class="bg-white rounded-lg shadow">
                            <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>Info</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table">
                                    <thead class="thead-dark bg-custom">
                                    <tr>
                                        <th scope="col">Property</th>
                                        <th scope="col">Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($product->propertiesValues as $value )
                                        <tr class="text-center">
                                            <th scope="row"> {{$value->property->name}} </th>
                                            <td> {{$value->value}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p> {{$product->description}} </p>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                    <!-- Comments -->

                    <livewire:comment :product="$product">

                </div>
                </div>
            </div>


            </div> --}}

            <div class="card mt-5">
                <div class="card-header">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                <i class="fas fa-info-circle"></i> Information
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#comments" role="tab">
                                <i class="far fa-comments"></i> Comments
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <!-- Tab panes -->
                    <div class="tab-content ">
                        <div class="tab-pane active" id="home" role="tabpanel">

                            <div class="page" id="dashboard">
                                <div class="bg-white rounded-lg shadow">

                                    <div class="card-body">
                                        <table class="table" id="table">
                                            <thead class="thead-dark bg-custom">
                                            <tr>
                                                <th scope="col">Property</th>
                                                <th scope="col">Value</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($product->propertiesValues as $value )
                                                <tr class="text-center">
                                                    <th scope="row"> {{$value->property->name}} </th>
                                                    <td> {{$value->value}}</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="comments" role="tabpanel">
                            <livewire:comment :product="$product">
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                            <p>
                                "I will be the leader of a company that ends up being worth billions of dollars, because
                                I got the answers. I understand culture. I am the nucleus. I think that’s a
                                responsibility that I have, to push possibilities, to show people, this is the level
                                that things could be at."
                            </p>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </section>



@endsection


@section('scripts')


    @livewireScripts
    <script>
        let card = document.querySelector('.countdown');

        const intrvl = setInterval(function () {
            let countDownDate = new Date(card.dataset.date).getTime();

            let now = new Date().getTime();
            let timeleft = countDownDate - now;


            let days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
            let hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

            if (days < 0 || hours < 0 || minutes < 0 || seconds < 0) {
                clearInterval(intrvl);
                days = 0;
                hours = 0;
                minutes = 0;
                seconds = 0;
                card.innerHTML = '<p class="bid-blastoff text-center">' + "Closed, You can't bid right now" + '</p>';
            }
            card.querySelector(".bid-days").innerHTML = days
            card.querySelector(".bid-hours").innerHTML = hours
            card.querySelector(".bid-mins").innerHTML = minutes
            card.querySelector(".bid-secs").innerHTML = seconds


        }, 1000)


        $(document).on('click', '.toggleProductinWishlist', function (e) {

            e.preventDefault();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let productId = $(this).attr('data-product-id');

            $.ajax({
                type: 'GET',
                url: "/wishlist/" + $(this).attr('data-product-id'),
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
                    $("a[data-product-id=" + productId + "]").toggleClass("wishlistActive");
                    $("svg[data-product-icon-id=" + productId + "]").toggleClass("wishlistIconActive");

                    if ((data.wished) && (data.status)) {
                        toastr.success(data.message);
                    } else {
                        toastr.error(data.message);
                    }
                },
                error: function (jqXHR) {
                    toastr.warning(jqXHR.responseJSON.message);
                }

            });
        });

    </script>

    <script>
        let animations = []
        Livewire.on('echo:bid.{{ $product->id }},BidEvent', () => {
                Livewire.hook('message.received', () => {
                    let things = Array.from(document.querySelectorAll('[animate-move]'))

                    animations = things.map(thing => {
                        let oldTop = thing.getBoundingClientRect().top

                        return () => {
                            let newTop = thing.getBoundingClientRect().top

                            thing.animate([
                                {transform: `translateY(${oldTop - newTop}px)`},
                                {transform: `translateY(0px)`},
                            ], {duration: 1500, easing: 'ease'})
                        }
                    })

                    things.forEach(thing => {
                        thing.getAnimations().forEach(animation => animation.finish())
                    })
                })
                Livewire.hook('message.processed', () => {
                    while (animations.length) {
                        animations.shift()()
                    }
                })

                // var year =  {!! $product->deadline->year !!};
                // var month =   {!! $product->deadline->month !!};
                // var day =   {!! $product->deadline->day !!};
                // var hour =   {!! $product->deadline->hour !!};
                // var min =   {!! $product->deadline->minute  !!};

                //     var countdown = new SV.Countdown('.countdown', {
                //         year: year,
                //         month: month,
                //         day: day,
                //         hour: hour,
                //         min: min
                //     });
            }
        )

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('js/product/zoom.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('#ex1').zoom();
        });
    </script>

@endsection

@extends('layouts.layout')

@section('title')
    Wishlist
@endsection


@section('content')
    @extends('layouts.header')

    <!-- hot products -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Wishlist
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>

        <div class="productsSectionContainer pb-5">
            <div class="mx-0 row">
                @foreach ($wishlist->products as $product)
                    <div class="p-2  col-sm-6 col-md-3">

                        <div class="productsWrapper my-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    <img src="{{ asset('img/home/mobile.jpg ')}}"
                                         onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                         onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                         class="w-100" alt="">
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-gavel"></i>
                                    </div>
                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('wishlist.delete' ,  $product->id) }}">
                                            <i class="far fa-heart"></i>
                                        </a>
                                    </div>
                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-search"></i>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1">70</h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1">70</h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="text-primary my-0 pt-1">70</h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="text-primary my-0 pt-1">70</h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <footer class="productDetails text-center pb-2 pt-4">

                                <h5>{{ $product->name }}</h5>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary"> 15,125.00$ </span>
                                </p>

                            </footer>


                        </div>

                    </div>

                @endforeach

            </div>
        </div>

    </section>
    <!-- end hot products -->







@endsection

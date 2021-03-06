@extends('layouts.layout')

@section('title')
    Home
@endsection


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">


@endsection

@section('content')


    @include('layouts.header')

    <section class="slider">

        <!-- Swiper slider -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slideContiner">
                        <div class="slideImageContiner">
                            <img src="{{ asset('img/home/slideshow-1.jpg') }}" alt="">
                        </div>
                        <div class="slideContentContiner">
                            <div class="slideContentOverlay">
                                <div class="slideContentContainer p-4">

                                    <h2>Bidding.com</h2>
                                    <p class="py-3">We give you the best product with the best price ever!</p>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Buy</button>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Details</button>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="swiper-slide">
                    <div class="slideContiner">
                        <div class="slideImageContiner">
                            <img src="{{ asset('img/home/slideshow-0.jpg') }}" alt="">
                        </div>
                        <div class="slideContentContiner">
                            <div class="slideContentOverlay">
                                <div class="slideContentContainer p-4">

                                    <h2>Bidding.com</h2>
                                    <p class="py-3">We give you the best product with the best price ever!</p>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Buy</button>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Details</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="slideContiner">
                        <div class="slideImageContiner">
                            <img src="{{ asset('img/home/slideshow-2.jpg') }}" alt="">
                        </div>
                        <div class="slideContentContiner">
                            <div class="slideContentOverlay">
                                <div class="slideContentContainer p-4">

                                    <h2>Bidding.com</h2>
                                    <p class="py-3">We give you the best product with the best price ever!</p>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Buy</button>
                                    <button type="button" class="btn btn-outline-light mx-1 rounded-0">Details</button>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
        <!-- end Swiper slider -->


    </section>


    <!-- slider categories overlay -->
    <section class="sliderOverlayContainer">
        <div class="sliderCategories pb-5 container">
            <div class="row">
             @foreach ($randCategories as $category )

                <div class="col-md-3 col-sm-6 px-0">
                    <div class="sliderCategoryImageContainer">
                        <img src="{{ asset('img/home/project-1.jpg ')}}" class="w-100" alt="">
                        <div class="categoryTitle py-4">
                            <p>New Arrivals</p>
                            <h5>{{$category->name}} </h5>
                            <div class="categoryTitleOverlay ">
                                <div>
                                    <p>Explore popular devices</p>
                                </div>
                                <div>
                                    <a href="{{route('categories.viewCategory' , $category->id)}}" class="btn btn-outline-light rounded-0">
                                        Shop Now
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>

        </div>

    </section>
    <!--end  slider categories overlay -->



    <section class="latestActions">


        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Random Categories
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="latestActionsCategories">

            <div class="row ">

                <div class="col-md-6 px-0 wow fadeInLeft " data-wow-duration="2s">
                    <div class="category latestActionsCategoryOne my-2 mx-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Bullets Wireless </h3>
                            <button class="viewMore my-4">
                                <a href="{{route('categories.viewCategory' , 1)}}" class="text-light my-4 rounded-0">
                                    Shop Now
                                </a>
                            </button>
                        </div>
                    </div>
                    <div class="category latestActionsCategoryTwo my-2 mx-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Drones </h3>
                                <button class="viewMore my-4">
                                    <a href="{{route('categories.viewCategory' , 2)}}" class="text-light my-4 rounded-0">
                                        Shop Now
                                    </a>
                                </button>
                            </div>
                    </div>
                </div>

                <div class="col-md-6 px-0 wow fadeInRight  " data-wow-duration="2s">
                    <div class="category latestActionsCategoryThree my-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Headphones </h3>
                                <button class="viewMore my-4">
                                    <a href="{{route('categories.viewCategory' , 3)}}" class="text-light my-4 rounded-0">
                                        Shop Now
                                    </a>
                                </button>
                            </div>
                    </div>
                    <div class="category latestActionsCategoryFour my-2 p-4">
                        <div class="categoryContent p-3">
                            <h3 class="categoryName"> Charger Wireless </h3>
                            <button class="viewMore my-4">
                                <a href="{{route('categories.viewCategory' , 4)}}" class="text-light my-4 rounded-0">
                                    Shop Now
                                </a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>


        </div>


    </section>


    <!-- end recommended products -->

    <section class="my-5">


        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Shop By Subcategory
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="recommendedSection ">

            @foreach ($randSubCategories as $subCategory)

            <div class="row px-0 mx-0 ">
                <div class="col-md-12 row py-4 px-0 mx-0">

                    <div class="col-md-3 col-sm-12  ">

                        <div class="sideCategory text-center d-flex justify-content-center align-items-center">
                            <div class="py-4">
                                <h3>{{$subCategory->name}}</h3>
                                <p> {{$subCategory->products->count()}} products</p>
                                <a href="{{route('subCategories.viewSubCategory' , $subCategory->id)}}"><button class="viewMore   my-4"> View More</button></a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-9 col-sm-12 row m-0 ">
                    @foreach ($subCategory->products->take(4) as $product )
                    <div class="col-md-6 col-sm-6 d-flex  ">

                        <div class="productItemDetails p-4 m-1  row ">
                            <div class="col-lg-4 col-md-12">
                                <img src="{{ asset('img/home/microsoft-tablet-1-400x400.jpg') }}" class="w-100"
                                     alt="">
                            </div>
                            <div class="col-lg-8 col-md-12 mt-3">
                                <h5>{{$product->name}}</h5>
                                <p class="my-2">Current bid : {{$product->last_bid->bid->cost ?? $product->start_price }} LE </p>
                                <div class="d-flex">
                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.index' , $product) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="{{ $product -> id }}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                           href="#" data-product-id="{{$product -> id}}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.generate' , $product) }}" class="text-dark">
                                            <i class="fas fa-qrcode "></i>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>
                    @endforeach
                    </div>


                </div>



        </div>

        @endforeach


        </div>


    </section>

    <!-- end recommended products -->











    <section class="my-5">


        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Categories
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class=" owl-carousel owl-theme my-5">


            @foreach ($categories  as $category)
                <div class="text-center">
                    <div class=" p-3 ">

                        <img
                            src="{{ $category->ImageUrl() }}"
                            class="rounded-circle " alt="">

                        <h4 class="my-3 text-dark ">{{ $category->name }}</h4>
                    </div>
                </div>
            @endforeach


        </div>


    </section>












    <!-- latest products -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Latest Products
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="productsSectionContainer pb-5">
            <div class="mx-0 tesssst owl-carousel owl-theme">

                @foreach ( $latest_products as $latest_product)

                    <div class="p-2">

                        <div class="productsWrapper my-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    @if($latest_product->images()->exists())
                                            <img src="{{ asset('img/front/products/'. $latest_product->id . '/thump-' . $latest_product->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}"
                                                 onmouseover="this.src='{{ asset('img/front/products/'. $latest_product->id . '/thump-' . $latest_product->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}'"
                                                 onmouseout="this.src='{{ asset('img/front/products/'. $latest_product->id . '/thump-' . $latest_product->images[1]->image_path) ?? 'https://source.unsplash.com/random'}}'"
                                                 class="w-100" alt="">
                                    @else
                                        <img src="{{ asset('img/home/electronic.jpg') }}"
                                                 onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                                 onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"
                                             class="w-100" alt="">
                                      @endif
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.index' , $latest_product) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($latest_product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="{{$latest_product -> id}}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($latest_product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                           href="#" data-product-id="{{$latest_product -> id}}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>
                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.generate' , $latest_product) }}" class="text-dark">
                                            <i class="fas fa-qrcode "></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="productBidTimer">


                                    <div
                                        data-date="{{ \Carbon\Carbon::parse($latest_product->deadline)->format('M d, y h:i:s') }}"
                                        class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 days"></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 hours"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 mins"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="my-0 pt-1 secs"></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5>{{ $latest_product->name }}</h5>
                                <p class="text-muted">
                                    Current Bid :
                                    <span>
                                 {{ $latest_product->last_bid->bid->cost ?? $latest_product->start_price }} LE
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>
                @endforeach


            </div>
        </div>

    </section>
    <!-- end latest products -->




    <!-- hot products -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Hot Products
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="productsSectionContainer pb-5">
            <div class="mx-0 tesssst owl-carousel owl-theme">

                @forelse ( $hot_products as $hot_product)
                    <div class="p-2">

                        <div class="productsWrapper my-3">

                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    @if($hot_product->images()->exists())
                                        <img src="{{ asset('img/front/products/'. $hot_product->id . '/thump-' . $hot_product->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}"
                                             onmouseover="this.src='{{ asset('img/front/products/'. $hot_product->id . '/thump-' . $hot_product->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}'"
                                             onmouseout="this.src='{{ asset('img/front/products/'. $hot_product->id . '/thump-' . $hot_product->images[1]->image_path) ?? 'https://source.unsplash.com/random'}}'"
                                             class="w-100" alt="">
                                    @else
                                        <img src="{{ asset('img/home/electronic.jpg') }}"
                                             onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                             onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"
                                             class="w-100" alt="">
                                    @endif
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.index' , $hot_product) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($hot_product->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="{{ $hot_product -> id }}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($hot_product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                           href="#" data-product-id="{{$hot_product -> id}}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.generate' , $hot_product) }}" class="text-dark">
                                            <i class="fas fa-qrcode "></i>
                                        </a>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div
                                        data-date="{{ \Carbon\Carbon::parse($hot_product->deadline)->format('M d, y h:i:s') }}"
                                        class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 days"></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 hours"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 mins"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="my-0 pt-1 secs"></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5>{{ $hot_product->name }}</h5>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary">
                                        {{ $hot_product->last_bid->bid->cost ?? $hot_product->start_price  }} LE
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>
                @empty
                    <div class="p-2">

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
                                        <i class="far fa-heart"></i>
                                    </div>
                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <i class="fas fa-search"></i>
                                    </div>

                                </div>

                                <div class="productBidTimer">

                                    <div class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 days"></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 hours"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 mins"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="my-0 pt-1 secs"></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5>Smartphone Earbuds</h5>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary"> 15,125.00$ </span>
                                </p>

                            </footer>

                        </div>

                    </div>
                @endforelse


            </div>
        </div>

    </section>
    <!-- end hot products -->






    <!-- Most Of View products -->
    <section class="my-5">

        <div class="titleSubtileHolder">
            <div class="sectionTitleContainer pt-3">

                <h2 class="sectionTitle">
                    Most Of View Products
                </h2>
                <div class="bidIconContainer">
                    <i class="fas fa-gavel bidIcon"></i>
                </div>

            </div>

        </div>


        <div class="productsSectionContainer pb-5">
            <div class="mx-0 tesssst owl-carousel owl-theme">

                @forelse ( $mostOfViewProducts as $mostOfViewProduct)
                    <div class="p-2">

                        <div class="productsWrapper my-3">


                            <div class="productContainer pb-2">
                                <div class="productImageContainer">
                                    @if($mostOfViewProduct->images()->exists())
                                        <img src="{{ asset('img/front/products/'. $mostOfViewProduct->id . '/thump-' . $mostOfViewProduct->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}"
                                             onmouseover="this.src='{{ asset('img/front/products/'. $mostOfViewProduct->id . '/thump-' . $mostOfViewProduct->images->first()->image_path) ?? 'https://source.unsplash.com/random' }}'"
                                             onmouseout="this.src='{{ asset('img/front/products/'. $mostOfViewProduct->id . '/thump-' . $mostOfViewProduct->images[1]->image_path) ?? 'https://source.unsplash.com/random'}}'"
                                             class="w-100" alt="">
                                    @else
                                        <img src="{{ asset('img/home/electronic.jpg') }}"
                                             onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                             onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"
                                             class="w-100" alt="">
                                    @endif
                                </div>

                                <div class="productOptions ">

                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.index' , $mostOfViewProduct) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>


                                    <div
                                        class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($mostOfViewProduct->id)) wishlistActive @else wishlistNotActive @endif  "
                                        id="wishlistIconContainer" data-product-icon-id="{{$mostOfViewProduct -> id}}">

                                        <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($mostOfViewProduct->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                           href="#" data-product-id="{{$mostOfViewProduct -> id}}">
                                            <i class="far fa-heart"></i>
                                        </a>

                                    </div>


                                    <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                        <a href="{{ route('products.generate' , $mostOfViewProduct) }}" class="text-dark">
                                            <i class="fas fa-qrcode "></i>
                                        </a>
                                    </div>

                                </div>


                                <div class="productBidTimer">

                                    <div
                                        data-date="{{ \Carbon\Carbon::parse($mostOfViewProduct->deadline)->format('M d, y h:i:s') }}"
                                        class="d-flex  text-center w-100 p-2">
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 days"></h6>
                                            <p class="text-muted">Days</p>
                                        </div>
                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 hours"></h6>
                                            <p class="text-muted">Hours</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem rightBorder">
                                            <h6 class="my-0 pt-1 mins"></h6>
                                            <p class="text-muted">Minutes</p>
                                        </div>

                                        <div class="col-3 px-0 counterItem">
                                            <h6 class="my-0 pt-1 secs"></h6>
                                            <p class="text-muted">Seconds</p>
                                        </div>
                                    </div>


                                </div>


                            </div>

                            <footer class="productDetails text-center pb-2 pt-4">
                                <h5>{{ $mostOfViewProduct->name }}</h5>
                                <p class="text-muted">
                                    Current Bid :
                                    <span class="text-primary">
                                         {{ $mostOfViewProduct->last_bid->bid->cost ?? $mostOfViewProduct->start_price }} LE
                                    </span>
                                </p>

                            </footer>

                        </div>

                    </div>
                @empty

                @endforelse


            </div>
        </div>

    </section>
    <!-- end most Of View Products products -->






@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            // rtl: true,
            loop: true,
            margin: 0,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: true
                }
            }
        })


    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        @if (\Session::has('emailOrPhoneUpdated'))
        Swal.fire({
            title: 'warning!',
            text: "{{ \Session::get('emailOrPhoneUpdated') }}",
            icon: 'warning',
            confirmButtonText: 'Ok'
        })
        @endif

        let cards = document.querySelectorAll('div.d-flex.text-center.w-100.p-2');
        cards.forEach(card => {
            let countDownDate = new Date(card.dataset.date).getTime();

            const intrvl = setInterval(function () {
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
                }
                card.querySelector(".days").innerHTML = days
                card.querySelector(".hours").innerHTML = hours
                card.querySelector(".mins").innerHTML = minutes
                card.querySelector(".secs").innerHTML = seconds


            }, 1000)

        })


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
                url: "wishlist/" + $(this).attr('data-product-id'),
                data: {
                    'productId': $(this).attr('data-product-id'),
                },
                success: function (data) {
                    $("div[data-product-icon-id=" + productId + "]").toggleClass("wishlistNotActive wishlistActive");
                    $("a[data-product-id=" + productId + "]").toggleClass("wishlistIconNotActive wishlistIconActive");
                    let count = Number($('#WishlistCount').text())
                    if ((data.wished) && (data.status)) {
                        toastr.success(data.message);
                        count++;
                        $('#WishlistCount').text(count)
                    } else {
                        toastr.error(data.message);
                        count--;
                        $('#WishlistCount').text(count)
                    }
                },
                error: function (jqXHR) {
                    Swal.fire({
                        title: 'ERORR!',
                        text: jqXHR.responseJSON.message,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }

            });
        });
    </script>

@endsection

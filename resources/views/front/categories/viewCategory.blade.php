@extends('layouts.layout')

@section('title')
    {{ $category->name }}
@endsection


@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('css/product/filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/category/viewCategory.css') }}">


@endsection

@section('content')
    @include('layouts.header')



    <div class="searchContainer mt-5 pt-5">
        <div class="row">
            <div class="col-md-3 col-sm-12 my-4">





                <div class="card leftNav category-sec">

                    <div class="accordion" id="accordionExample2">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Categories</button>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                            data-parent="#accordionExample2">
                            <div class="panel-body">


                                @if(!empty($categories))
                                    @foreach ($categories as $cat)
                                        <a href="{{ route('categories.viewCategory' , $cat) }}" class="@if ($category->id == $cat->id) text-primary  @endif">

                                            <li  class="my-1">
                                                {{ ucfirst($cat->name) }}
                                            </li>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>




                </div>




            </div>



            <div class="col-md-9 col-sm-12 rightDiv">


                <div class="row causes_div">


                    @foreach ( $category->subCategories as $subCategory)

                        <div class="col-12  pt-3">
                            <a href="{{ route('subCategories.viewSubCategory' , $subCategory) }}">

                                <p class="subCategoryTitle py-0 my-0 ml-5">

                                    {{ $subCategory->name }}
                                </p>
                            </a>
                        </div>



                        <div class="col-12">

                            <div class=" pb-2">
                                <div class="mx-0  owl-carousel owl-theme">

                                    @forelse ( $subCategory->products as $product )

                                        <div class="p-2">
                                            <div class="productsWrapper my-3">


                                                <div class="productContainer pb-2">
                                                    <div class="productImageContainer">
                                                        <a href="{{ route('products.index' , $product->id) }}" >

                                                            <img src="{{ asset('img/home/mobile.jpg ')}}"
                                                                onmouseover="this.src='{{ asset('img/home/electronic.jpg') }}'"
                                                                onmouseout="this.src='{{ asset('img/home/mobile.jpg ')}}'"

                                                                class="w-100" alt="">
                                                        </a>
                                                    </div>

                                                    <div class="productOptions ">

                                                        <div class="iconProductContainer mr-3 my-1 px-2 rounded-circle ">
                                                            <i class="fas fa-gavel"></i>
                                                        </div>


                                                        <div
                                                            class="iconProductContainer mr-3 my-1 px-2 rounded-circle @if ( App\Models\User::productInWishlist($product->id)) wishlistActive @else wishlistNotActive @endif  "
                                                            id="wishlistIconContainer" data-product-icon-id="{{$product -> id}}">

                                                            <a class="toggleProductinWishlist @if ( App\Models\User::productInWishlist($product->id)) wishlistIconActive @else wishlistIconNotActive @endif "
                                                            href="#" data-product-id="{{$product -> id}}">
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
                                                                <h6 class="text-prim    ary my-0 pt-1" ></h6>
                                                                <p class="text-muted">Days</p>
                                                            </div>
                                                            <div class="col-3 px-0 counterItem rightBorder">
                                                                <h6 class="text-primary my-0 pt-1"></h6>
                                                                <p class="text-muted">Hours</p>
                                                            </div>

                                                            <div class="col-3 px-0 counterItem rightBorder">
                                                                <h6 class="text-primary my-0 pt-1"></h6>
                                                                <p class="text-muted">Minutes</p>
                                                            </div>

                                                            <div class="col-3 px-0 counterItem">
                                                                <h6 class="text-primary my-0 pt-1" ></h6>
                                                                <p class="text-muted">Seconds</p>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <a href="{{ route('products.index' , $product->id) }}" >
                                                    <footer class="productDetails text-center pb-2 pt-4">
                                                        <h5>
                                                                {{ $product->name }}
                                                        </h5>
                                                        <p class="text-muted">
                                                            Start Price :
                                                            <span class="text-primary">
                                                                {{ $product->start_price }} $
                                                            </span>
                                                        </p>
                                                        <p class="text-muted">
                                                            Current Bid :
                                                            <span class="text-primary">
                                                                {{ $product->last_bid->cost ?? 0 }}$
                                                            </span>
                                                        </p>

                                                    </footer>
                                                </a>
                                            </div>
                                        </div>
                                    @empty

                                    @endforelse
                                </div>

                            </div>
                        </div>







                    @endforeach


                </div>






            </div>

        </div>
    </div>


@endsection



@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script src="{{ asset('js/product/filter.js') }}"></script>
    <script src="{{ asset('js/product/wishlist.js') }}"></script>


    <script>


        $(document).ready(function(){
            $('.owl-carousel').owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            // rtl: true,
            loop:true,
            margin:0,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:4 ,
                    nav:true,
                    loop:true
                }
            }
        })

    </script>


@endsection

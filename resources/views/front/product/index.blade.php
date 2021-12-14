@extends('layouts.layout')

@section('title')
    Products Filter
@endsection


@section('styles')
<link rel="stylesheet" href="{{ asset('css/product/filter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
@endsection

@section('content')
    @include('layouts.header')



    <div class="searchContainer">
        <div class="row">
            <div class="col-md-3 col-sm-12 ">


                <div class="price-range leftNav py-2"><!--price-range-->
                    <div class="card my-3">
                        <div class="card-header">

                            Price Range
                        </div>
                        <div id="slider-range"></div>
                        <br>
                        <b class="pull-left">$
                            <input size="2" type="text" id="amount_start" name="start_price"
                                    value="15" style="border:0px; font-weight: bold; color:green" readonly="readonly" /></b>
                        <b class="pull-right">$
                            <input size="2" type="text" id="amount_end" name="end_price" value="65"
                                    style="border:0px; font-weight: bold; color:green" readonly="readonly"/></b>
                    </div>
                </div><!-- end price-range-->

                <div class="card leftNav category-sec mb-30">
                    <h3>Refine By:<span class="_t-item">(0 items)</span></h3>
                    <div class="col-12 p-0" id="catFilters"></div>
                </div>

                <div class="card leftNav category-sec">

                    <div class="accordion" id="accordionExample">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Sub-Categories</button>
                        </div>

                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="panel-body">


                                @if(!empty($subCategories))
                                    @foreach ($subCategories as $subCategory)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" {{($loop->iteration == 0 ? 'checked' : '')}}
                                                attr-name="{{$subCategory->name}}"
                                                class="custom-control-input category_checkbox" id="{{$subCategory->id}}">
                                            <label class="custom-control-label"
                                                for="{{$subCategory->id}}">{{ucfirst($subCategory->name)}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>




                </div>


            </div>



            <div class="col-md-9 col-sm-12 rightDiv">

                <div class="row causes_div">

                    @foreach ( $products as $product)
                        <div class="col-md-4 col-sm-12 p-2">

                            <div class="productsWrapper mt-3">


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

                                <footer class="productDetails text-center pb-2 pt-4">
                                    <h5>{{ $product->name }}</h5>
                                    <p class="text-muted">
                                        Current Bid :
                                        <span class="text-primary">
                                            {{ $product->last_bid->cost ?? 0 }}$
                                        </span>
                                    </p>

                                </footer>

                            </div>

                        </div>


                    @endforeach


                </div>
                <div class="py-4 ">
                    {{ $products->links("pagination::bootstrap-4") }}
                </div>





            </div>

        </div>
    </div>


@endsection



@section('scripts')
<script src="{{ asset('js/product/filter.js') }}"></script>
<script src="{{ asset('js/product/wishlist.js') }}"></script>
@endsection

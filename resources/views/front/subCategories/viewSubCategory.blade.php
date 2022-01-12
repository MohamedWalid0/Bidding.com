@extends('layouts.layout')

@section('title')
    Products Filter
@endsection


@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

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

                        <p >
                            <label for="amount" class="card-header">Price range:</label>
                            <div class="d-flex">

                                <input type="text" id="amount_start" name="start_price" value="0" class="pt-3 text-center w-50 " readonly style="border:0; color:#500d6b; font-weight:bold;">
                                <input type="text" id="amount_end" name="end_price" value="10000" class="pt-3 text-center w-50 " readonly style="border:0; color:#500d6b; font-weight:bold;">
                            </div>

                        </p>
                        <div id="slider-range" class="slider-range"></div>

                    </div>
                </div><!-- end price-range-->

                <div class="card leftNav category-sec mb-30">
                    <h3>Refine By:<span class="_t-item">(0 items)</span></h3>
                    <div class="col-12 p-0" id="catFilters"></div>
                </div>



                <div class="card leftNav category-sec">

                    <div class="accordion" id="accordionExample2">
                        <div class="card-header" id="headingOne">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Categories</button>
                        </div>

                        <div id="collapseOne" class="collapse " aria-labelledby="headingOne"
                            data-parent="#accordionExample2">
                            <div class="panel-body">


                                @if(!empty($categories))
                                    @foreach ($categories as $category)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" {{($loop->iteration == 0 ? 'checked' : '')}}
                                                attr-name="{{$category->name}}"
                                                class="custom-control-input category_checkbox" id="{{$category->id}}">
                                            <label class="custom-control-label"
                                                for="{{$category->id}}">{{ucfirst($category->name)}}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>




                </div>









                <div class="card leftNav category-sec">

                    <div class="accordion" id="accordionExample">
                        <div class="card-header" id="headingTwo">
                            <button class="btn btn-link" type="button" data-toggle="collapse"
                                data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Sub-Categories</button>
                        </div>

                        <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo"
                            data-parent="#accordionExample">
                            <div class="panel-body">


                                @if(!empty($subCategories))
                                    @foreach ($subCategories as $subCategory)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox"
                                                attr-name="{{$subCategory->name}}"
                                                class="custom-control-input subCategory_checkbox" id="sub-{{$subCategory->id}}">
                                            <label class="custom-control-label"
                                                for="sub-{{$subCategory->id}}">{{ucfirst($subCategory->name)}}</label>
                                        </div>
                                    @endforeach
                                @endif


                            </div>
                        </div>


                    </div>




                </div>


            </div>



            <div class="col-md-9 col-sm-12 rightDiv">
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <input type="hidden" value="{{ $subCategory->id }}" id="subCategoryId">
                        <input class="form-control w-100" type="search" placeholder="Search..." aria-label="Search" id="searchInput">
                    </div>
                </div>

                <div class="row causes_div">


                    @foreach ( $subCategory->products as $product)

                        <div class="col-md-3 col-sm-12 p-2">

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


                    @endforeach


                </div>





            </div>

        </div>
    </div>


@endsection



@section('scripts')
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

    <script src="{{ asset('js/subCategory/SubCategory.js') }}"></script>
    <script src="{{ asset('js/product/wishlist.js') }}"></script>
@endsection

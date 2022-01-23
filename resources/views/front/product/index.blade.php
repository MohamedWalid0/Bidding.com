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



    <div class="searchContainer pt-5 mt-5">
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
                        {{-- <input class="form-control w-100" type="search" placeholder="Search..." aria-label="Search" id="searchInput"> --}}

                        <fieldset class="field-container w-100">
                            <input type="text" placeholder="Search..." class="field" id="searchInput" />
                            <div class="icons-container">
                              <div class="icon-search"></div>
                              <div class="icon-close">
                                <div class="x-up"></div>
                                <div class="x-down"></div>
                              </div>
                            </div>
                        </fieldset>

                    </div>
                </div>

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

                                    <div class="productBidTimer" data-date="{{ \Carbon\Carbon::parse($product->deadline)->format('M d, y h:i:s') }}">

                                        <div class="d-flex  text-center w-100 p-2">
                                            <div class="col-3 px-0 counterItem rightBorder">
                                                <h6 class="text-primary my-0 pt-1 days"></h6>
                                                <p class="text-muted">Days</p>
                                            </div>
                                            <div class="col-3 px-0 counterItem rightBorder">
                                                <h6 class="text-primary my-0 pt-1 hours"></h6>
                                                <p class="text-muted">Hours</p>
                                            </div>

                                            <div class="col-3 px-0 counterItem rightBorder">
                                                <h6 class="text-primary my-0 pt-1 mins"></h6>
                                                <p class="text-muted">Minutes</p>
                                            </div>

                                            <div class="col-3 px-0 counterItem">
                                                <h6 class="text-primary my-0 pt-1 secs"></h6>
                                                <p class="text-muted">Seconds</p>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <footer class="productDetails text-center pb-2 pt-4">
                                    <h5>{{ $product->name }}</h5>
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

                            </div>

                        </div>


                    @endforeach


                </div>
                <div class="py-4 ">
                    {{ $products->withQueryString()->links() }}
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
    let cards = document.querySelectorAll('.productBidTimer');
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
</script>

@endsection

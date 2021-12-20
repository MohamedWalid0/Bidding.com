@extends('layouts.layout')


@section('title')
    View Product
@endsection

@section('styles')

<link rel="stylesheet" href="{{asset('css/product/show-post.css')}}">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@livewireStyles
@endsection

@section('content')
@include('layouts.header')
    <section class="py-5">
        <div class="container">

            <div class="product-header mb-3">
                <p class="product-header--subtitle">
                    {{$product->subCategory->category->name}} / {{$product->subCategory->name}}
                </p>
                <h2 class="product-header--title">{{$product->name}}</h2>
                <p class="product-header--subtitle" >
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="16" height="16" viewBox="0 0 24 24" stroke-width="2.5" stroke="#9e9e9e" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="2" />
                        <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                    </svg>
                    3250 views
                </p>
            </div>
            <div class="product--underline"></div>

            <div class="row pt-5">
                <div class="col-md-5">
                    <div class="product-img">
                        <img class="w-100" src="{{asset('img/front/products/img/electronic-cat3.jpg')}}" alt="">
                    </div>
                    <div class="row pt-3">
                        <div class="col-3">
                            <img class="w-100 pointer" src="{{asset('img/front/products/img/electronic-cat3.jpg')}}" alt="">
                        </div>
                        <div class="col-3 pointer">
                            <img class="w-100" src="{{asset('img/front/products/img/electronic-cat3.jpg')}}" alt="">
                        </div>
                        <div class="col-3 pointer">
                            <img class="w-100" src="{{asset('img/front/products/img/electronic-cat3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">

                        <livewire:bid-deadline :product="$product" />
                        <livewire:bid  :product="$product" />

                            <p class="product-header--subtitle py-3">
                                Categories: <span class="span-bold"> {{$product->subCategory->category->name}} </span>
                            </p>

                        <livewire:bidding-users :product="$product" >

                </div>
            </div>

            <nav class="py-5">
                <div class="nav nav-tabs nav-pills nav-justified" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                      Informations</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                      Descreption</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                      Comments</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">...</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

    <!-- Comments -->
    <!--===================================================-->


             <livewire:comment :product="$product" >

                </div>
              </div>
        </div>


    </section>



@endsection


@section('scripts')
@livewireScripts
<script >

// Livewire.on('BidUpdated', () => {

//        var year =  {!! $product->deadline->year !!};
//        var month =   {!! $product->deadline->month !!};
//        var day =   {!! $product->deadline->day !!};
//        var hour =   {!! $product->deadline->hour !!};
//        var min =   {!! $product->deadline->minute  !!};

//         var countdown = new SV.Countdown('.countdown', {
//                year: year,
//                month: month,
//                day: day,
//                hour: hour,
//                min: min
//            });

// })

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
@endsection

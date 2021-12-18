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
    <section class="py-5">
        <div class="container">

            <div class="product-header mb-3">
                <p class="product-header--subtitle">
                    iBid / Electronics / Televisions
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

                        <livewire:bidding-users :product="$product" />

                </div>
            </div>
        </div>


    </section>



@endsection


@section('scripts')
@livewireScripts

@endsection

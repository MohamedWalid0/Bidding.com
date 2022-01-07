@extends('layouts.layout')


@section('title')
    Product QR Code
@endsection

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">

@endsection

@section('content')
    @include('layouts.header')


        <div class="card text-center m-auto" style="width: 25rem;">
            <div class="card-body">
            <h5 class="card-title">
                {{ $qrcode }}
            </h5>
            <p class="card-text">You can scan this product QR Code by your phone now </p>
                <a href="{{ route('products.index' , $product->id) }}" class="btn btn-primary">Back to product</a>
            </div>
        </div>


@endsection


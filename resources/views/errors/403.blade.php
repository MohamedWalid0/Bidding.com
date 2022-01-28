@extends('layouts.layout')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/home/error.css') }}">
@endsection


@section('content')

<div id="clouds">
    <div class="cloud x1"></div>
    <div class="cloud x1_5"></div>
    <div class="cloud x2"></div>
    <div class="cloud x3"></div>
    <div class="cloud x4"></div>
    <div class="cloud x5"></div>
</div>
<div class='c'>
    <div class='_404'>403</div>
    <div class='_2'>HTTP Error 403 Forbidden</div>
    <a class='btn' href="{{route('home')}}">Back to Home</a>
</div>
@endsection

@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="category"/>
    <meta property="og:title" content="{{ $category->name }}"/>
    <meta property="og:description" content="{{ $category->description }}"/>
    @if(!is_null($category->cover))
        <meta property="og:image" content="{{ asset("storage/$category->cover") }}"/>
    @endif
@endsection

@section('content')
    <div class="container">
        <hr>
        <div class="row">
            <div class="category-top col-md-12">
                <h2>{{ $category->name }}</h2>
                {!! $category->description !!}
            </div>
        </div>
        <hr>
        <div class="col-md-3">
            @include('front.categories.sidebar-category')
        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="category-image">
                    @foreach($category->images as $image)
                        <img src="{{ $image->src }}" alt="">
                    @endforeach
                </div>
            </div>
            <hr>
            <div class="row">
                @include('front.products.product-list', ['products' => $category->products])
            </div>
        </div>
    </div>
@endsection

@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', '商品一覧')

@section('subtitle', '商品一覧')

@section('content')
    <div class="product-cards">
        @foreach ($products as $product)
            <div class="product-card">
                <a href="{{ $product->id }}">
                    <div class="product-card__img-wrapper">
                        <img class="product-card__img" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-card__text">
                        <p class="product__name">{{ $product->name }}</p>
                        <p class="product__price">¥{{ $product->price }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
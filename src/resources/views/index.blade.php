@extends('layouts.default')

@section('title', '商品一覧')

@section('subtitle', '商品一覧')

@section('content')
    <div class="product-cards">
        @foreach ($products as $product)
            <a href="">
                <div class="product-card">
                    <img src="{{ $product->image }}" alt="商品画像">
                    <p class="product__name">{{ $product->name }}</p>
                    <p class="product__price">¥{{ $product->price }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection
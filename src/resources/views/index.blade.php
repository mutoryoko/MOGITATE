@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', '商品一覧')

@section('content')
<div class="content__nav">
    <h2 class="subtitle">商品一覧</h2>
    <a class="add-products__btn" href="{{ route('register') }}">商品を追加</a>
</div>

<div class="main__container">
    <div class="main__content">
        <div class="product-cards">
            @foreach ($products as $product)
                <div class="product-card">
                    <a href="{{ route('detail', ['productId' => $product->id])}}">
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
    </div>
    <div class="search-form">
        <form action="" method="get">
            <input class="search-form__keyword" name="keyword" type="text" placeholder="商品名で検索" value="{{ request('keyword') }}">
            <button class="search-form__btn--submit" type="submit">検索</button>
        </form>
        <h3>価格順で表示</h3>
        <form action="" method="">
            <select name="">
                <option disabled selected>価格で並べ替え</option>
                <option value="">高い順に表示</option>
                <option value="">安い順に表示</option>
            </select>
            {{-- @if ()
                <button></button>
            @endif --}}
        </form>
    </div>
</div>
@endsection
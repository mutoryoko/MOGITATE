@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('title', '商品一覧')

@section('content')
<div class="main__content">
    <div class="content__nav">
        <h2 class="subtitle">
            @isset ($keyword)
                “{{ $keyword }}”の
            @endisset
            商品一覧
        </h2>
        <a class="add-products__btn" href="{{ route('register') }}">+ 商品を追加</a>
    </div>

    <div class="flex__container">
        {{-- 商品一覧 --}}
        <div class="products__index">
            <div class="product-cards">
                @foreach ($products as $product)
                    <div class="product-card">
                        <a href="{{ route('detail', ['productId' => $product->id])}}">
                            <div class="product-card__img-wrapper">
                                <img class="product-card__img" src="{{ asset('storage/'. $product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-card__text">
                                <p class="product__name">{{ $product->name }}</p>
                                <p class="product__price">¥{{ $product->price }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- ページネーション --}}
            {{ $products->appends(['sort' => request('sort')])->links() }}
        </div>

        <div class="aside">
            {{-- 検索フォーム --}}
            <div class="search-form">
                <form action="{{ route('search') }}" method="GET">
                    <input class="search-form__keyword" name="keyword" type="text" placeholder="商品名で検索" value="{{ request('keyword') }}">
                    <input type="hidden" name="sort" value="{{ $sort }}">
                    <button class="search-form__btn--submit" type="submit">検索</button>
                </form>
            </div>
            {{-- ソート --}}
            <div class="sort-form">
                <h3 class="sort__title">価格順で表示</h3>
                <details class="price-dropdown">
                    <summary class="dropdown__default">価格で並べ替え</summary>
                    <nav class="dropdown-items">
                        <a class="asc" href="{{ route('search',['keyword' => request('keyword'), 'sort' => 'asc']) }}">安い順に表示</a>
                        <a class="desc" href="{{ route('search',['keyword' => request('keyword'), 'sort' => 'desc']) }}">高い順に表示</a>
                    </nav>
                </details>
                @if ($sort === 'asc')
                    <label class="sort__btn--label">安い順に表示
                        <a class="sort__btn--reset" href="{{ route('products') }}">✕</a>
                    <label>
                @elseif ($sort === 'desc')
                    <label class="sort__btn--label">高い順に表示
                        <a class="sort__btn--reset" href="{{ route('products') }}">✕</a>
                    </label>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
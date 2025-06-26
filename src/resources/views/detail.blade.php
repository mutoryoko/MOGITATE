@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('title', '商品詳細')

@section('content')
<div class="detail__content">
    <p>商品一覧 > 商品名</p>
    <form action="{{ route('update', ['productId' => $product->id])}}" method="post">
        @csrf
        @method('PATCH')
        <div class="detail__content--upper">
            <div class="detail__img-wrapper">
                <div class="detail__img">
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                </div>
                <div class="detail__img--upload">
                    <input type="file" name="image" accept=".png, .jpeg, .jpg, image/png, image/jpg">
                </div>
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="detail__name-price-season">
                <div class="detail__name">
                    <label><div>商品名</div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" >
                    </label>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="detail__price">
                    <label><div>値段</div>
                        <input type="text" name="price" value="{{ old('price', $product->price) }}">
                    </label>
                    @error('price')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="detail___seasons">
                    <label><div>季節</div>
                        @foreach ($seasons as $season)
                        <input type="checkbox" id="{{ $season->id }}" name="seasons[]" value="{{ $season->id }}"
                        @if (in_array( $season->id, old('seasons', $product->seasons->pluck('id')->all())))
                        checked @endif>
                        <label class="season__label" for="{{ $season->id }}">{{ $season->name }}</label>
                        @endforeach
                    </label>
                    @error('seasons')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="detail__content--lower">
            <div class="detail__description">
                <label><div>商品詳細</div>
                    <textarea class="detail__description--text" name="description">{{ $product->description }}</textarea>
                </label>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="back-update__buttons">
                <a class="back__btn" href="{{ route('products') }}">戻る</a>
                <button class="update__btn" type="submit">変更を保存</button>
            </div>
        </div>
    </form>
    <div class="delete__btn">
        <form action="{{ route('delete', ['productId' => $product->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $product->id }}">
            <button type="submit" value="">ゴミ箱</button>
        </form>
    </div>
</div>
@endsection
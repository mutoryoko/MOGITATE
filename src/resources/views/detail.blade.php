@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('title', '商品詳細')

@section('content')
<p>商品一覧 > 商品名</p>
<div class="detail__content">
    <form action="{{ route('update', ['productId' => $product->id])}}" method="post">
        @csrf
        @method('PATCH')
        <div class="detail__flex">
            <div class="detail__img-wrapper"
                <img class="detail__img" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                <input type="file" name="image" accept=".png, .jpeg, .jpg, image/png, image/jpg">
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="detail__name-price-season">
                <label>商品名
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="text" name="name" value="{{ old('name', $product->name) }}" >
                </label>
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label>値段
                    <input type="text" name="price" value="{{ old('price', $product->price) }}">
                </label>
                @error('price')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label>季節
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
        <div class="detail__description">
            <label>商品詳細
                <textarea name="description" cols="30" rows="10">{{ $product->description }}</textarea>
            </label>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="back-update__buttons">
            <a class="back__btn" href="{{ route('products') }}">戻る</a>
            <button class="update__btn" type="submit">変更を保存</button>
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
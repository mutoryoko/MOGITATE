@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('title', '商品詳細')

@section('content')
<div class="detail__content">
    <p class="breadcrumbs"><a class="breadcrumbs-link" href="{{ route('products') }}">商品一覧</a><span class="angle-bracket">&gt;</span>商品名</p>

    <form action="{{ route('update', ['productId' => $product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="detail__content--upper">
            <div class="detail__img-wrapper">
                @livewire('edit-product-image', ['existingImagePath' => $product->image])
                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="detail__name-price-season">
                <div class="detail__item">
                    <label><div class="form__label">商品名</div>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input class="form__input" type="text" name="name" value="{{ old('name', $product->name) }}" >
                    </label>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="detail__item">
                    <label><div class="form__label">値段</div>
                        <input class="form__input" type="text" name="price" value="{{ old('price', $product->price) }}">
                    </label>
                    @error('price')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="detail___item">
                    <label><div class="form__label">季節</div>
                            @foreach ($seasons as $season)
                                <input class="season__checkbox" type="checkbox" id="{{ $season->id }}" name="seasons[]" value="{{ $season->id }}"
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
            <div class="detail__item">
                <label><div class="form__label">商品詳細</div>
                    <textarea class="form__text" name="description">{{ old('description', $product->description) }}</textarea>
                </label>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="form__buttons">
                <a class="back-btn" href="{{ route('products') }}">戻る</a>
                <button class="submit-btn" type="submit">変更を保存</button>
            </div>
        </div>
    </form>

    <form class="delete__form" action="{{ route('delete', ['productId' => $product->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="hidden" name="id" value="{{ $product->id }}">
        <button class="delete-btn--icon" type="submit"><i class="fas fa-trash-alt"></i></button>
    </form>
</div>
@endsection
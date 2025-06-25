@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('title', '商品登録')

@section('content')
<div class="content">
    <form class="register-form" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="register-form__item">
            <label>商品名<span class="required-mark">必須</span>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
            </label>
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label>値段<span class="required-mark">必須</span>
                <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
            </label>
            @error('price')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label>商品画像<span class="required-mark">必須</span>
                <img src="" alt="">
                <input type="file" name="image" value="" accept=".png, .jpeg, .jpg, image/png, image/jpg">
            </label>
            @error('image')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            @foreach ($seasons as $season)
                <input type="checkbox" id="{{ $season->id }}" name="seasons[]" value="{{ $season->id }}">
                <label class="season__label" for="{{ $season->id }}">{{ $season->name }}</label>
            @endforeach
            @error('seasons')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label>商品説明<span class="required-mark">必須</span>
                <textarea name="description" cols="30" rows="10" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            </label>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <a href="{{ route('products') }}">戻る</a>
        <button type="submit">登録</button>
    </form>
</div>
@endsection
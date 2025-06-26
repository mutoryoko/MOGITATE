@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('title', '商品登録')

@section('content')
<div class="register__content">
    <form class="register-form" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="register-form__item">
            <label><div class="form-label">商品名<span class="required-mark">必須</span></div>
                <input class="register-form__input" type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
            </label>
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label><div class="form-label">値段<span class="required-mark">必須</span></div>
                <input class="register-form__input" type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
            </label>
            @if($errors->has('price'))
                @foreach ($errors as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div class="register-form__item">
            <label><div class="form-label">商品画像<span class="required-mark">必須</span></div>
                <img src="" alt="">
                <input type="file" name="image" value="" accept=".png, .jpeg, .jpg, image/png, image/jpg">
            </label>
            @if($errors->any('image'))
                @foreach ($errors as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div class="register-form__item">
            <label><div class="form-label">季節<span class="required-mark">必須</span><span class="multiple">複数選択可</span></div>
            @foreach ($seasons as $season)
                <input type="checkbox" id="{{ $season->id }}" name="seasons[]" value="{{ $season->id }}">
                <label class="season__label" for="{{ $season->id }}">{{ $season->name }}</label>
            @endforeach
            @error('seasons')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label><div class="form-label">商品説明<span class="required-mark">必須</span></div>
                <textarea class="register-form__text" name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            </label>
            @if($errors->has('description'))
                @foreach ($errors as $error)
                    <p class="error">{{ $error }}</p>
                @endforeach
            @endif
        </div>
        <div class="register-form__buttons">
            <a class="back-btn" href="{{ route('products') }}">戻る</a>
            <button class="submit-btn" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection
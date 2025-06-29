@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('title', '商品登録')

@section('content')
<div class="register__content">
    <h2 class="subtitle">商品登録</h2>
    <form class="register-form" action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="register-form__item">
            <label><div class="form__label">商品名<span class="required-mark">必須</span></div>
                <input class="form__input" type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
            </label>
            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label><div class="form__label">値段<span class="required-mark">必須</span></div>
                <input class="form__input" type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
            </label>
            @error('price')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label for="image"><div class="form__label">商品画像<span class="required-mark">必須</span></div></label>
            @livewire('image-preview')
            @error('image')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label><div class="form__label">季節<span class="required-mark">必須</span><span class="multiple">複数選択可</span></div>
                @foreach ($seasons as $season)
                    <input class="season__checkbox" type="checkbox" id="season_{{ $season->id }}" name="seasons[]" value="{{ $season->id }}" {{ is_array(old('seasons')) && in_array($season->id, old('seasons')) ? 'checked' : ''}}>
                    <label class="season__label" for="season_{{ $season->id }}">{{ $season->name }}</label>
                @endforeach
            @error('seasons')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="register-form__item">
            <label><div class="form__label">商品説明<span class="required-mark">必須</span></div>
                <textarea class="form__text" name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
            </label>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form__buttons">
            <a class="back-btn" href="{{ route('products') }}">戻る</a>
            <button class="submit-btn" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection
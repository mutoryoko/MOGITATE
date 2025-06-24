<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品登録</title>
</head>

<body>
    <header class="header">
        <h1 class="header__logo">mogitate</h1>
    </header>

    <main>
        <div class="content">
            <form action="" method="POST">
                @csrf
                <div>
                    <label>商品名<span class="required-mark">必須</span>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                    </label>
                </div>
                <div>
                    <label>値段<span class="required-mark">必須</span>
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力">
                    </label>
                </div>
                <div>
                    <label>商品画像<span class="required-mark">必須</span>
                        <input type="file" name="image" value="{{ old('image') }}" multiple accept=".png, .jpeg, .jpg, image/png, image/jpg">
                    </label>
                </div>
                <div>
                    @foreach ($seasons as $season)
                        <input type="radio" id="{{ $season->id }}" name="season" value="{{ old('season') }}">
                        <label class="season__label" for="{{ $season->id }}">{{ $season->name }}</label>
                    @endforeach
                </div>
                <div>
                    <label>商品説明<span class="required-mark">必須</span>
                        <textarea name="description" cols="30" rows="10" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                    </label>
                </div>
                <a href="{{ route('products') }}">戻る</a>
                <button type="submit">登録</button>
            </form>
        </div>
    </main>

</body>

</html>
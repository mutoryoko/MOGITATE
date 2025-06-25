<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品詳細</title>
</head>

<body>
    <header class="header">
        <h1 class="header__logo">mogitate</h1>
    </header>

    <main>
        <p>商品一覧 > 商品名</p>
        <div class="detail__content">
            <form action="" method="post">
                @csrf
                <div class="detail__flex">
                    <div class="detail__img"
                        <img src="" alt="">
                        <input type="file">
                    </div>
                    <div class="detail__name-price-season">
                        <label>商品名
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="text" name="name" value="{{ $product->name }}" >
                        </label>
                        <label>値段
                            <input type="text" name="price" value="{{ $product->price }}">
                        </label>
                        <label>季節
                            @foreach ($seasons as $season)
                                <input type="radio" id="{{ $season->id }}" name="season" value="{{ $season->id }}">
                                <label class="season__label" for="{{ $season->id }}">{{ $season->name }}</label>
                            @endforeach
                        </label>
                    </div>
                </div>
                <div class="detail__description">
                    <label>商品詳細
                        <textarea name="description" cols="30" rows="10"></textarea>
                    </label>
                </div>
                <div class="back-update__buttons">
                    <a class="back__btn" href="">戻る</a>
                    <button class="update__btn" type="submit">変更を保存</button>
                </div>
                <div class="delete__btn">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button type="submit" value="">ゴミ箱</button>
                    </form>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
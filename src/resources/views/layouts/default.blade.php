<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <header class="header">
        <a href="{{ route('products') }}">
            <h1 class="header__logo">mogitate</h1>
        </a>
    </header>

    <main>
        <div class="content__nav">
            <h2 class="subtitle">@yield('subtitle')</h2>
            <a class="add-products__btn" href="{{ route('register') }}">商品を追加</a>
        </div>
        
        <div class="main__container">
            <div class="main__content">
                @yield('content')
            </div>
            {{-- ページネーション --}}
            {{-- @if(isset($products))
                {{ $products->links() }}
            @endif --}}

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
    </main>
    </div>
</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>

<body>
    <header>
        <div id="head">
            <nav class="nav_ber">
                <h1><a href="/top"><img class="Atlas_image" src="{{ asset('storage/images/atlas.png') }}" alt="Atlas"></a></h1>
                <!-- hrefでTopページに、public/images/から正しい画像を選択 -->

                <div class="accordion">
                    <b>{{ auth()->user()->username }}さん</b>
                    <div class="accordion-title"><b>V</b></div>
                    <ul class="accordion-content">
                        <li class="accordion-lists"><a href="/top">ホーム</a></li>
                        <li class="accordion-lists"><a href="/profile">プロフィール</a></li>
                        <li class="accordion-lists"><a href="/logout">ログアウト</a></li>
                    </ul>
                    <a href="/top"><img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="images" class="icon_image"></a>
                </div>
            </nav>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>{{ auth()->user()->username }}さんの</p>
                <div class="count_area">
                    <div>フォロー数</div>
                    <div>{{ $follow_count }}名</div>
                </div>
                <p class="list_btn"><a href="/follow-list" class="btn btn-primary">フォローリスト</a></p>
                <div class="count_area">
                    <div>フォロワー数</div>
                    <div>{{ $follower_count }}名</div>
                </div>
                <p class="list_btn"><a href="/follower-list" class="btn btn-primary">フォロワーリスト</a></p>
            </div>
            <p class="search_btn"><a href="/search" class="btn btn-primary">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>

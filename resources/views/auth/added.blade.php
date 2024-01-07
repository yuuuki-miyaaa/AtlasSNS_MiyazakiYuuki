@extends('layouts.logout')

@section('content')

<div class="login_area" style="padding: 30px;">
  <div class="add_title">
    {{$username}}さん<br>
    ようこそ！AtlasSNSへ！
  </div>
  <div class="add_text">
    ユーザー登録が完了しました。<br>
    早速ログインをしてみましょう。
  </div>

  <button type="submit" class="btn btn-danger" style="
    width: 150px;
    font-size: 0.9rem;
    border-radius: 0.45rem;}">
    <a href="/login" style="color: #fff;
    text-decoration: none;">
      ログイン画面へ
    </a>
  </button>
</div>

@endsection

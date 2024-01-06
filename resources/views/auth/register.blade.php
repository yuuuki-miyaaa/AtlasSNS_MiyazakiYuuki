@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<div class="register_area">
  <p class="login_title">新規ユーザー登録</p>

  <div class="login_box">
    {{ Form::label('user name') }}
    {{ Form::text('username',null,['class' => 'input']) }}
  </div>
  <div class="login_box">
    {{ Form::label('mail address') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
  </div>
  <div class="login_box">
    {{ Form::label('password') }}
    {{ Form::password('password',null,['class' => 'input']) }}
  </div>
  <div class="login_box">
    {{ Form::label('password confirm') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}
  </div>

  <div class="login_btn">
    <button type="submit" class="btn btn-danger">REGISTER</button>
  </div>

  <p class="new_user"><a href="/login">ログイン画面へ戻る</a></p>
</div>

@if($errors->any())
<!-- $errors変数 バリデーションエラーがあるかのチェック -->
<div class="alert alert-danger">
  <!-- もしエラーがある場合、alertとalert-dangerというクラスを持つHTMLのdiv要素が作成(Bootstrapのクラス？) -->
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

{!! Form::close() !!}

@endsection

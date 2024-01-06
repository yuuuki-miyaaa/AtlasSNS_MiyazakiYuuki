@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<div class="login_area">
  <p class="login_title">AtlasSNSへようこそ</p>

  <div class="login_box">{{ Form::label('email address') }}
    {{ Form::text('mail',null,['class' => 'input']) }}</div>
  <div class="login_box">{{ Form::label('password') }}
    {{ Form::password('password',['class' => 'input']) }}</div>
  <div class="login_btn">
    <button type="submit" class="btn btn-danger">LOGIN</button>
  </div>
  <p class="new_user"><a href="/register">新規ユーザーの方はこちら</a></p>
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

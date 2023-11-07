@extends('layouts.logout')

@section('content')
<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',null,['class' => 'input']) }}

{{ Form::label('パスワード確認') }}
{{ Form::password('password_confirmation',null,['class' => 'input']) }}

{{ Form::submit('登録') }}

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

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection

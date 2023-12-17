@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile', 'method' => 'post', 'files' => true]) !!}
<!-- フォームがファイルのアップロードをするにはエンコードタイプの設定が必要 -->
<!-- 'files' => trueは、enctype="multipart/form-data"をフォームタグに追加する -->

<h2>【確認用】ここはプロフィールです</h2>
<!--  ルートの確認用 -->

<table class="profile-area">

  <img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="images">
  {{ Form::label('ユーザー名') }}
  {{ Form::text('username',auth()->user()->username,['class' => 'input']) }}
  <!-- 第２引数にデフォルト値でログインユーザー情報を設定 -->

  <p>{{ Form::label('メールアドレス') }}
    {{ Form::text('mail',auth()->user()->mail,['class' => 'input']) }}</p>

  <p>{{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}</p>

  <p>{{ Form::label('パスワード確認') }}
    {{ Form::password('password_confirmation',null,['class' => 'input']) }}</p>

  <p>{{ Form::label('bio') }}
    {{ Form::text('bio',auth()->user()->bio,['class' => 'input']) }}</p>

  <p>{{ Form::label('icon_image') }}
    {{ Form::file('icon_image',null,['class' => 'input']) }}</p>

  {{ Form::submit('更新',['class' => 'btn btn-primary']) }}
  {!! Form::close() !!}

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

</table>
@endsection

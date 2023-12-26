@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/profile', 'method' => 'post', 'files' => true]) !!}
<!-- フォームがファイルのアップロードをするにはエンコードタイプの設定が必要 -->
<!-- 'files' => trueは、enctype="multipart/form-data"をフォームタグに追加する -->

<div class="profile_container">

  <div class="profile_area">
    <img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="images" class="icon_image">
    <div class="user_area">
      {{ Form::label('ユーザー名') }}
      {{ Form::text('username',auth()->user()->username,['class' => 'input']) }}</div>
    <!-- 第２引数にデフォルト値でログインユーザー情報を設定 -->

    <div class="user_area">{{ Form::label('メールアドレス') }}
      {{ Form::text('mail',auth()->user()->mail,['class' => 'input']) }}</div>

    <div class="user_area">{{ Form::label('パスワード') }}
      {{ Form::password('password',null,['class' => 'input']) }}</div>

    <div class="user_area">{{ Form::label('パスワード確認') }}
      {{ Form::password('password_confirmation',null,['class' => 'input']) }}</div>

    <div class="user_area">{{ Form::label('bio') }}
      {{ Form::textarea('bio',auth()->user()->bio,['class' => 'input', 'id' => 'bio_text']) }}</div>

    <div class="user_area">{{ Form::label('icon_image') }}
      {{ Form::file('icon_images',null,['class' => 'input']) }}</div>

    <div class="pf_btn_area">
      {{ Form::submit('更新',['class' => 'btn btn-primary']) }}
    </div>
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
  </div>
</div>
@endsection

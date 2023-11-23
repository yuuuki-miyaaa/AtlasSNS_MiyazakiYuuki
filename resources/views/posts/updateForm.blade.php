@extends('layouts.login')

@section('content')

<h2>【確認用】ここはTop画面です</h2>
<!-- ルートの確認用 -->

<h2>機能を実装していきましょう。</h2>

<div class="container">

  {!! Form::open(['url' => '/post/update']) !!}
  <div class="from-area">
    {{ Form::hidden('id', $post->id) }}
    {{ Form::label('投稿内容') }}
    {{ Form::input('text', 'upPost', $post->post, ['required', 'class' => 'form-post']) }}
  </div>
  {!! Form::close() !!}

</div>

@endsection

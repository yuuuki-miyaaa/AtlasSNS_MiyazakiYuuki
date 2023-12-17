@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/post/create']) !!}
<!-- {!! Form::open(['url' => '/top']) !!} なぜここを変えても大丈夫なのか？-->

<!-- <h2>【確認用】ここはTop画面です</h2>
ルートの確認用
<h2>機能を実装していきましょう。</h2> -->

<!-- {!! Form::open(['url' => '/post/create']) !!} -->
<div class="form_area">
  <tr class="post_box">
    <th><img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="images" class="auth_image"></th>
    <th>{{ Form::input('text', 'post', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) }}</th>
  </tr>
</div>
<button type="submit" class="btn-post"></button>
<option class="post-border" value="{{ auth()->user()->user_id }}">
  {!! Form::close() !!}

  <div class="container">
    <table class="post-area">
      @if($posts->isNotEmpty())
      @foreach ($posts as $post)
      <tr>
        <th><a href="{{ url('users/' . $post->user->id) }}"><img src="{{ asset('storage/images/'.$post->user->images) }}" alt="images"></a></th>
        <th><a href="{{ url('users/' . $post->user->id) }}">{{$post->user->username}}</a></th>
        <td>{{$post->created_at}}</td>
        <td>{{$post->post}}</td>
        @if(auth()->user()->id == $post->user_id)
        <td class="btn_area">
          <button data-post-id="{{ $post->id }}" data-post-text="{{$post->post}}" class="btn-update"></button>
        </td>
        <td class="btn_area">
          <a class="btn-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('このPostを削除してもよろしいでしょうか？')"></a>
        </td>
        @endif
      </tr>
      @endforeach
    </table>
  </div>
  <div id="modal" class="modal">
    <div class="modal_content">
      {!! Form::open(['id' => 'update-form', 'method' => 'post']) !!}
      {{ Form::hidden('id', $post->id) }}
      {{ Form::input('text', 'post', null, ['class' => 'input', 'id' => 'post-text']) }}
      <p class="up_btn">
        <button type="button" class="btn btn-light">戻る</button>
        {{ Form::submit('更新', ['class' => 'btn btn-primary']) }}
      </p>
      {!! Form::close() !!}
    </div>
  </div>
  @else
  <p>投稿がまだありません。</p>
  @endif


  @endsection

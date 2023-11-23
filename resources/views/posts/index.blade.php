@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/post/create']) !!}
<!-- {!! Form::open(['url' => '/top']) !!} なぜここを変えても大丈夫なのか？-->

<h2>【確認用】ここはTop画面です</h2>
<!-- ルートの確認用 -->


<h2>機能を実装していきましょう。</h2>

<div class="container">

  <!-- {!! Form::open(['url' => '/post/create']) !!} -->
  <div class="form-area">
    {{ Form::input('text', 'post', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) }}
    <option value="{{ auth()->user()->user_id }}">
  </div>
  <button type="submit" class="btn btn-post"><img src="images/post.png" alt="送信"></button>
  {!! Form::close() !!}
  <!-- <form action="/post/create" method="post">
    @csrf
    <div>
      <input type="text" name="post" value="" class="from-post" placeholder="投稿内容を入力してください。" required>
    </div>
    <option value="{{ auth()->user()->user_id }}">
      <button type="submit" class="btn btn-post"><img src="images/post.png" alt="送信"></button>
  </form> -->

  <table class="post-area">
    @foreach ($posts as $post)
    <tr>
      <th><img src="{{ asset('images/'.$post->user->images) }}" alt="images"></th>
      <th>{{$post->user->username}}</th>
      <td>{{$post->created_at}}</td>
      <td>{{$post->post}}</td>
      @if(auth()->user()->id == $post->user_id)
      <td><a class="btn update" href="/post/{{$post->id}}/update-form"><img src="images/edit.png" alt="更新"></a></td>
      <td><a class="btn delete" href="/post/{{$post->id}}/delete" onclick="return confirm('このPostを削除してもよろしいでしょうか？')"><img src="images/trash.png" alt="削除"></a></td>
    </tr>
    @endif
    @endforeach
  </table>

</div>

@endsection

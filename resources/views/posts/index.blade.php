@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/post/create']) !!}
<!-- {!! Form::open(['url' => '/top']) !!} なぜここを変えても大丈夫なのか？-->

<!-- <h2>【確認用】ここはTop画面です</h2>
ルートの確認用
<h2>機能を実装していきましょう。</h2> -->

<!-- {!! Form::open(['url' => '/post/create']) !!} -->
<div class="form_area">
  <div class="post_box">
    <div class="image_block"><img src="{{ asset('storage/images/' . auth()->user()->images) }}" alt="images" class="icon_image"></div>
    <!-- <th>{{ Form::input('text', 'post', null, ['required', 'class' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) }}</th> -->
    {{ Form::textarea('post', null, ['required', 'id' => 'form-post', 'placeholder' => '投稿内容を入力してください。']) }}
  </div>
  <button type="submit" class="btn-post"></button>
  <input type="hidden" name="" value="{{ auth()->user()->user_id }}">
</div>
{!! Form::close() !!}

<div class="post_container">
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

  @if($posts->isNotEmpty())
  @foreach ($posts as $post)
  <div class="post-area">
    <ul>
      <li class="post-block">
        <a href="{{ url('users/' . $post->user->id) }}" class="icon_area"><img src="{{ asset('storage/images/'.$post->user->images) }}" alt="icon_images" class="icon_image"></a>
        <div class="post-content">
          <div>
            <div class="post-name"><a href="{{ url('users/' . $post->user->id) }}" style="color: black; text-decoration: none;">{{$post->user->username}}</a></div>
            <div>{{$post->created_at->format('Y-m-d H:i')}}</div>
          </div>
          <div>
            <div>{!! nl2br(e($post->post)) !!}</div>
            @if(auth()->user()->id == $post->user_id)
            <div class="btn_area">
              <button data-post-id="{{ $post->id }}" data-post-text="{{$post->post}}" class="btn-update"></button>
              <a class="btn-delete" href="/post/{{$post->id}}/delete" onclick="return confirm('このPostを削除してもよろしいでしょうか？')"></a>
            </div>
          </div>
          @endif
        </div>
      </li>
    </ul>
  </div>
  @endforeach
</div>
<div id="updateModal" class="modal">
  <div class="modal_content">
    {!! Form::open(['method' => 'post', 'id' => 'update-form']) !!}
    <!-- <form id="update-form" action="" method="post"> -->
    <input type="hidden" name="id" value="">
    <textarea name="post" id="post-text"></textarea>
    <button type="submit" class="btn_update_modal">更新</button>
    <!-- </form> -->
    {!! Form::close() !!}
  </div>
</div>

<!-- <div id="modal" class="modal">
  <div class="modal_content">
    {!! Form::open(['method' => 'post', 'id' => 'update-form']) !!}
    {{ Form::hidden('id', $post->id) }}
    {{ Form::textarea('post', null, ['class' => 'input', 'id' => 'post-text']) }}

    <p class="up_btn">
      {{ Form::submit('Submit', ['class' => 'btn-update']) }}
    </p>
    {!! Form::close() !!}
  </div>
</div> -->
@else
<p>投稿がまだありません。</p>
@endif


@endsection

@extends('layouts.login')

@section('content')

{!! Form::open(['url' => url('users', $user->id)]) !!}

<div class="user_profile_area">
  <img src="{{ asset('storage/images/'.$user->images) }}" alt="images" class="icon_image">

  <div class="user_pf_box">
    <div class="user_area">
      <span class="pf_label">name:</span>
      <span class="content">{{ $user->username }}</span>
    </div>
    <div class="user_area">
      <span class="pf_label">bio:</span>
      <span class="content">{{ $user->bio }}</span>
    </div>
  </div>

  <div class="pf_follow_btn">
    @if (auth()->user()->isFollowing($user->id))
    <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST">
      {{ csrf_field() }}
      {{ method_field('DELETE') }}
      <button type="submit" class="btn btn-danger">フォロー解除</button>
    </form>
    @else
    <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST">
      {{ csrf_field() }}

      <button type="submit" class="btn btn-primary">フォローする</button>
    </form>
    @endif
  </div>

</div>


<div class="post_container">
  @foreach ($posts as $post)
  <div class="post-area">
    <ul>
      <li class="post-block">
        <img src="{{ asset('storage/images/'.$post->user->images) }}" alt="images" class="icon_image">

        <div class="post-content">
          <div>
            <div class="post-name">{{$post->user->username}}</div>
            <div>{{$post->created_at->format('Y-m-d H:i')}}</div>
          </div>

          <div>
            <div>{!! nl2br(e($post->post)) !!}</div>
          </div>

        </div>
      </li>
    </ul>
  </div>
  @endforeach
</div>
@endsection

@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/follow-list']) !!}

<div class="follow_list_container">
  <h3 class="list_title">Follow List</h3>
  <div class="icon_list">
    @foreach ($users as $user)
    @if (auth()->user()->isFollowing($user->id))
    <a href="{{ url('users/' . $user->id) }}" class="icon_link">
      <img src="{{ asset('storage/images/' . $user->images) }}" alt="User icon" class="icon_image">
    </a>
    @endif
    @endforeach
  </div>
</div>

<div class="post_container">

  @foreach ($posts as $post)
  @if (auth()->user()->isFollowing($user->id))
  <div class="post-area">
    <ul>
      <li class="post-block">
        <a href="{{ url('users/' . $post->user->id) }}"><img src="{{ asset('storage/images/'.$post->user->images) }}" alt="images" class="icon_image"></a>
        <div class="post-content">
          <div>
            <div class="post-name">
              <a href="{{ url('users/' . $post->user->id) }}">{{$post->user->username}}</a></div>
            <div>{{$post->created_at->format('Y-m-d H:i')}}</div>
          </div>
          <div>
            <div>{!! nl2br(e($post->post)) !!}</div>
          </div>
        </div>
        @endif
      </li>
    </ul>
  </div>
  @endforeach
</div>


@endsection

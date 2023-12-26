@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search']) !!}

<div class="search_area">
  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="search_form" placeholder="　ユーザー名">
    <button type="submit" class="btn btn-search"><img src="images/search.png" alt="検索" class="search_icon"></button>
  </form>
  {{$word}}
</div>

<div class="post_container">
  <div class="search_container">
    @foreach ($users as $user)
    <div class="user_area">
      <div class="search_user">
        <img src="{{ asset('storage/images/' .$user->images) }}" alt="images" class="icon_image">
        {{$user -> username}}
      </div>

      <div class="follow_btn_area">
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
    @endforeach
  </div>
</div>


@endsection

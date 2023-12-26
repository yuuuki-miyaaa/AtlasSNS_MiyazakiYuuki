@extends('layouts.login')

@section('content')

{!! Form::open(['url' => url('users', $user->id)]) !!}
<div class="container">

  <table class="user_profile-area">
    <img src="{{ asset('storage/images/'.$user->images) }}" alt="images">
    <tr>
      <th>name:</th>
      <td>{{ $user->username }}</td>
    </tr>
    <tr>
      <th>bio:</th>
      <td>{{ $user->bio }}</td>


      <td class="follow_btn_area">
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
      </td>
    </tr>
  </table>


  <table class="user_post-area">
    @foreach ($posts as $post)
    <tr>
      <th><img src="{{ asset('storage/images/'.$post->user->images) }}" alt="images"></th>
      <th>{{$post->user->username}}</th>
      <td>{{$post->created_at->format('Y-m-d H:i')}}</td>
      <td>{!! nl2br(e($post->post)) !!}</td>
    </tr>
    @endforeach
  </table>
</div>
@endsection

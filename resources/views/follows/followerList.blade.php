@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/follower-list']) !!}

<h2>【確認用】ここはフォロワーリストです</h2>
<!-- ルートの確認用 -->

<div class="container">

  <table class="follow_list_area">
    <tr>
      <h3>Follower List</h3>
      @foreach ($users as $user)
      @if (auth()->user()->isFollowed($user->id))
      <th><img src="{{ asset('storage/images/' .$user->images) }}" alt="images"></th>
      <td>{{$user -> username}}</td>
      @endif
    </tr>
    @endforeach
  </table>

  <table class="follow_post_area">
    <tr>
      @foreach ($posts as $post)
      <th><a href="{{ url('users/' . $post->user->id) }}"><img src="{{ asset('storage/images/'.$post->user->images) }}" alt="images"></a></th>
      <th><a href="{{ url('users/' . $post->user->id) }}">{{$post->user->username}}</a></th>
      <td>{{$post->created_at}}</td>
      <td>{{$post->post}}</td>
    </tr>
    @endforeach
  </table>

</div>

@endsection

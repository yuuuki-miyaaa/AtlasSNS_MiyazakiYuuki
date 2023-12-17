@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search']) !!}

<h2>【確認用】ここはユーザー検索画面です</h2>
<!-- ルートの確認用 -->


<div class="container">

  <form action="/search" method="post">
    @csrf
    <input type="text" name="keyword" class="form" placeholder="ユーザー名">
    <button type="submit" class="btn btn-search"><img src="images/search.png" alt="検索"></button>
  </form>
  {{$word}}

  <table class="user-area">
    @foreach ($users as $user)
    <tr>
      <th><img src="{{ asset('storage/images/' .$user->images) }}" alt="images"></th>
      <td>{{$user -> username}}</td>


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
    @endforeach
  </table>

</div>


@endsection

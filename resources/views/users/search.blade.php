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
      <th><img src="{{ asset('images/'.$user->images) }}" alt="images"></th>
      <td>{{$user -> username}}</td>
    </tr>
    @endforeach
  </table>

</div>


@endsection

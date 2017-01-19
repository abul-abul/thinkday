@extends('app-user')
@section('user-content')
    <h1>{{$game->title}}</h1>
    <img src="/page_uploade/game/category_images/{{$game->image}}" alt=""><br>
    <object width="1000" height="500" data="/page_uploade/game/category_game/{{$game->game}}"></object>


@endsection
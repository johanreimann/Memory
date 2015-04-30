@extends('master')

@section('content')
The highscore list!
<ul class="list-group">

 @foreach ($players as $player)
  <li class="list-group-item">
	<span class="badge">{{$player->score}}</span>
    {{$player->name}}
  </li>
 @endforeach
 
 </ul>
@stop
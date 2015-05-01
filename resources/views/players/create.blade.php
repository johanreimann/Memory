@extends('master')

@section('content')
	<h2>Enter your name</h2>

    {!! Form::model(new App\Player, ['route' => ['players.store']]) !!}
        @include('players/partials/_form', ['submit_text' => 'Store score'])
    {!! Form::close() !!}
@stop
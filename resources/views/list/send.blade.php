@extends('master')

@section('title')
	Send Book to Other Member
@stop

@section('body')
	<h1>Send Book to Other Member</h1>
	<hr>

	{!! Form::open([
		'url' => "send",
	]) !!}
    	<div class="form-group">
			{!! Form::label('user_list', 'Users:') !!}
			{!! Form::select('user_list', $users, null, ['class' => 'form-control']) !!}
		</div>

		<input type="hidden" name="book_id" value="{{ $id }}">

		<div class="form-group">
			{!! Form::Submit('Send Book', ['class' => 'btn btn-primary form-control']) !!}
		</div>

  	{!! Form::close() !!}
@stop
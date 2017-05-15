@extends('master')

@section('title')
	Edit Book
@stop

@section('body')
	<h1>Edit Book</h1>
	<hr>
  	
	{!! Form::model($book, [
		'method' => 'PATCH',
		'action' => ['BookController@update', $book->id],
		'files' => true
	]) !!}
		<img src="/uploads/{{ $book->img_url }}" height="100px">
    	@include('partials._form', ['submitButtonText' => 'Update Book'])
  	{!! Form::close() !!}

@stop
@extends('master')

@section('title')
	Create Book
@stop

@section('body')
	<h1>Add New Book</h1>
	<hr>
	
	{!! Form::open([
		'url' => 'book',
		'files' => true
	]) !!}
    	@include('partials._form', ['submitButtonText' => 'Add Book'])
  	{!! Form::close() !!}

  	

@stop
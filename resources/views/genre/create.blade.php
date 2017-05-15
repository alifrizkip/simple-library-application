@extends('master')

@section('title')
	Create Genre
@stop

@section('body')
	<h1>Add New Genre</h1>
	<hr>

	<form action="{{ route('genre.store') }}" method="POST">
		<label for="name">Name Genre:</label><br>
		<input type="text" name="name" id="name"><br>
		{{ csrf_field() }}
		<input type="submit" name="submit" value="Add Genre">
	</form>
@stop
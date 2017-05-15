@extends('master')

@section('title')
	Index Genre
@stop

@section('body')
	<h1>Index Genre</h1>
	<hr>

	<ul>
		@foreach ($genres as $genre)
			<li>
				{{ $genre->name }}
			</li>
		@endforeach
	</ul>
@stop
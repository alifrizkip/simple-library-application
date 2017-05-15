@extends('master')

@section('body')
	<h3>Buku : {{ $book->name }}</h3>
	<h4>Pengarang : {{ $book->author }}</h4>
	<hr>
	<img src="/uploads/{{ $book->img_url }}" height="100px">
	<hr>
	<h5>Stock: {{ $book->stock }}</h5>
	<h5>Genre:</h5>
	<ul>
		@foreach ($book->genres as $genre)
			<li>{{ $genre->name }}</li>
		@endforeach
	</ul>

@stop
@extends('master')

@section('title')
	Index Book
@stop

@section('body')
	<h1><a href="{{ url('/book') }}">Index Book</a></h1>
	<a href="{{ route('book.create') }}"><button class="btn btn-primary">Insert Book</button></a>
	<hr>

@include('partials._search', ['url' => 'book'])
	
	@foreach ($genres as $genre)
		<a href="book?genre={{ $genre->id }}"><button class="btn btn-primary">{{ $genre->name }}</button></a>
	@endforeach

	<table class="table table-hover">
		<tr>
			<th width="3%">NO.</th>
			<th width="12%">Book Name</th>
			<th width="20%">Author</th>
			<th width="5%">Stock</th>
			<th>Genre</th>
			<th width="25%">Photo</th>
			<th>Edit/Delete</th>
		</tr>
	
	@php $no = 0 @endphp
	@foreach ($books as $book)
		@php $no++ @endphp
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $book->name }}</td>
			<td>{{ $book->author }}</td>
			<td>{{ $book->stock }}</td>
			<td>
			<ul>
				@foreach ($book->genres as $genre)
					<li>{{ $genre->name }}</li>
				@endforeach
			</ul>
			</td>
			<td><img src="/uploads/{{ $book->img_url }}" height="100px"></td>
			<td>
				<a class="btn btn-warning" href="{{ route('book.edit', $book->id) }}" role="button">Edit</a>
				
				<form action="{{ route('book.destroy', $book->id) }}" method="POST">
					{{ csrf_field() }}
					<button type="submit" name="delete" class="btn btn-danger">Delete</button>
					<input type="hidden" name="_method" value="DELETE">
				</form>
			</td>
		</tr>
	@endforeach

		
	</table>

	<div class="pagination">{{ $books->links() }}</div>
@stop
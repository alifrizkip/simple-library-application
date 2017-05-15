@extends('master')

@section('title')
	List Book
@stop

@section('body')
	<h1>List Book</h1>
	<hr>

@include('partials._search', ['url' => '/'])
	@foreach ($genres as $genre)
		<a href="?genre={{ $genre->id }}"><button class="btn btn-primary">{{ $genre->name }}</button></a>
	@endforeach

	<table class="table table-hover">
		<tr>
			<th width="3%">NO.</th>
			<th width="12%">Book Name</th>
			<th width="20%">Author</th>
			<th width="5%">Stock</th>
			<th>Genre</th>
			<th width="25%">Photo</th>
			<th>Borrow</th>
			<th>Return Back</th>
			<th>Send</th>
		</tr>
	
	@php $no = 0 @endphp
	@foreach ($lists as $list)
		@php $no++ @endphp
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $list->name }}</td>
			<td>{{ $list->author }}</td>
			<td>{{ $list->stock }}</td>
			<td>
			<ul>
				@foreach ($list->genres as $genre)
					<li>{{ $genre->name }}</li>
				@endforeach
			</ul>
			</td>
			<td><img src="/uploads/{{ $list->img_url }}" height="100px"></td>
			<td>
				<a href="/login"><button class="btn btn-primary">Borrow</button></a>
			</td>
			<td>
				<button class="btn btn-warning disabled">Return Back</button>
			</td>
			<td>
				<button class="btn btn-success disabled">Send</button>
			</td>
		</tr>
	@endforeach

		
	</table>

	<div class="pagination">{{ $lists->links() }}</div>
@stop
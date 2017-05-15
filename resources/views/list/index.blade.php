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
				<form action="{{ route('list.borrow') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $list->id }}">
					<button type="submit" name="Borrow" class="btn btn-primary" {{ \Auth::user()->books()->where('book_id', $list->id)->count() !== 0 ? "disabled" : " " }}>Borrow</button>
				</form>
			</td>
			<td>
				<form action="{{ route('list.returnBack') }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" name="id" value="{{ $list->id }}">
					<button type="submit" name="Return" class="btn btn-warning {{ \Auth::user()->books()->where('book_id', $list->id)->count() === 0 ? "disabled" : " " }}">Return Back</button>
					<input type="hidden" name="_method" value="DELETE">
				</form>
			</td>
			<td>
				<a href="{{ route('list.send', $list->id) }}">
					<button class="btn btn-success {{ \Auth::user()->books()->where('book_id', $list->id)->count() === 0 ? "disabled" : " " }}">Send</button>
				</a>
			</td>
		</tr>
	@endforeach

		
	</table>

	<div class="pagination">{{ $lists->links() }}</div>
@stop
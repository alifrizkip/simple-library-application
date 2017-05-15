@extends('master')

@section('title')
	List User Borrow Book
@stop

@section('body')
	<h1>List User Borrow Book</h1>
	<hr>

@include('partials._search', ['url' => 'user'])

	<table class="table table-hover">
		<tr>
			<th width="3%">NO.</th>
			<th>Name</th>
			<th>Book</th>
		</tr>
	
	@php $no = 0 @endphp
	@foreach ($users as $user)
		@php $no++ @endphp
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $user->name }}</td>
			<td>
			<ul>
				@foreach ($user->books as $book)
					<li>{{ $book->name }}</li>
				@endforeach
			</ul>
			</td>
		</tr>
	@endforeach

		
	</table>
@stop
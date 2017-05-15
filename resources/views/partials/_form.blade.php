<div class="form-group">
  {!! Form::label('name', 'Book Name:') !!}
  {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('name'))
  <div class="alert alert-danger">
    {{ $errors->first('name') }}
  </div>
@endif

<div class="form-group">
  {!! Form::label('author', 'Author:') !!}
  {!! Form::text('author', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('author'))
  <div class="alert alert-danger">
    {{ $errors->first('author') }}
  </div>
@endif

<div class="form-group">
  {!! Form::label('stock', 'Stock Now:') !!}
  {!! Form::number('stock', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('stock'))
  <div class="alert alert-danger">
    {{ $errors->first('stock') }}
  </div>
@endif

<div class="form-group">
  {!! Form::label('ori_stock', 'Original Stock:') !!}
  {!! Form::number('ori_stock', null, ['class' => 'form-control']) !!}
</div>
@if ($errors->has('ori_stock'))
  <div class="alert alert-danger">
    {{ $errors->first('ori_stock') }}
  </div>
@endif

<div class="form-group">
  {!! Form::label('genre_list', 'Tags:') !!}
  {!! Form::select('genre_list[]', $genres, null, ['class' => 'form-control', 'multiple']) !!}
</div>
@if ($errors->has('genre_list'))
  <div class="alert alert-danger">
    {{ $errors->first('genre_list') }}
  </div>
@endif

<div class="form-group">
	{!! Form::label('Book Image') !!}
	{!! Form::file('image', null) !!}
</div>
@if ($errors->has('image'))
  <div class="alert alert-danger">
    {{ $errors->first('image') }}
  </div>
@endif

<div class="form-group">
  {!! Form::Submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

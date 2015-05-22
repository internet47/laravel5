@extends('templates.master')
@section('title','add new')
@section('sidebar')
<p>Đây là sidebar add news</p>
@stop

@section('content')

	   


<h2>Thêm tin tức mới</h2>
{!! Form::open(array('url'=>'news', 'files'=>true)) !!}
	{!! Form::label('title','Title')!!}
	<br>
	{!! Form::text('title')!!}
	<br>
	{!! Form::label('description','Description')!!}
	<br>
	{!! Form::textarea('description')!!}
	<br>
	<br>
	{!! Form::label('image','Image')!!}
	<br>
	{!! Form::file('image')!!}
	<br>

	{!! Form::label('content','Content')!!}
	<br>
	{!! Form::textarea('content')!!}
	<br>
	{!! Form::label('created_at','Created Date') !!}
	{!! Form::input('date','created_at',date('Y-m-d')) !!} <br />


	{!!Form::submit('Thêm mới') !!}
 
{!! Form::close() !!}


@if ( $errors->any())
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	
@endif


@stop
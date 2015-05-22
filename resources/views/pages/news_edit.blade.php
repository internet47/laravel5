@extends('templates.master')
@section('title','add new')
@section('sidebar')
<p>Đây là sidebar add news</p>
@stop

@section('content')
		<h2>Sửa tin tức mới</h2>
		<h1>Ma so bai viet : {!! $news->id !!}</h1>
		{!! Form::model($news,[ 'method' => 'PUT', 'action' => ['NewsController@update', $news->id] ]) !!}
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
			<img src="upload/{{$news->image}}" alt="">
			{{ HTML::image($news->image, $news->title, array('width' => '90%', 'height' => '50%')) }}
			{{ HTML::image('uploads/$news->image') }}
			<a href="#">{{ HTML::image("upload/logo.png", "Logo") }}</a>
			{{ html_entity_decode( HTML::link("#", HTML::image("img/logo.png", "Logo") ) ) }}
			<a href="{{URL::to('/')}}"><img src={{asset('img/logo.png')}} alt="Logo"></a>
			
			<br>

			{!! Form::label('content','Content')!!}
			<br>
			{!! Form::textarea('content')!!}
			<br>
			{!! Form::label('created_at','Created Date') !!}
			{!! Form::input('date','created_at',date('Y-m-d')) !!} <br />


			{!!Form::submit('Cập nhật') !!}
		 
		{!! Form::close() !!}


		@if ( $errors->any())
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>	
		@endif
@stop
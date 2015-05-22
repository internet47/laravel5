@extends('templates.master')
@section('title','Trang tin tức')
@section('sidebar')
<p>Day la side cua tin tức</p>
@stop


@section('content')

	




		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Title</th>
						<th>Content</th>
						<th>Date</th>
						<th>Iamge</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($data	as $newss)
					<tr>
						<td>{{$newss->title}}</td>
						<td>{{$newss->content}}</td>
						<td>{{$newss->created_at}}</td>
						<td><img src="uploads/{{$newss->image}}" width="100" /></td>
						<td>
							<a class="btn btn-success" href="{{URL::to('news/'.$newss->id.'/edit')}}">Edit</a>
							
							{!! Form::open(array('url'=>'news/'.$newss->id))!!}
							{!! Form::hidden ('_method','DELETE') !!}

							{!!  Form::submit('Delete',array('class'=>'btn btn-warning')) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach


				</tbody>
			</table>
			 
			<p class="text-center"><?php echo $data->render(); ?></p>
			<?php echo $data->appends(['sort' => 'title'])->render(); ?>
		</div>

@stop
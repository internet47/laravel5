@extends('templates.master')

@section('title','Contact me')

@section('sidebar')
<p>Đây là sidebar contact</p>
@stop

@section('content')
{!! Form::open(array('url'=>'kiemtra','method'=>'POST', 'id'=>'myform')) !!}
{!! Form::text('email','',array('id'=>'','class'=>'form-control span6','placeholder' => 'Email')) !!}
{!! Form::password('password',array('class'=>'form-control span6', 'placeholder' => 'Please Enter your Password')) !!}
{!! Form::button('Login', array('class'=>'send-btn')) !!}
{!! Form::close() !!}

<script type="text/javascript">
$(document).ready(function(){
  $('.send-btn').click(function(){            
    $.ajax({
      url: 'kiemtra',
      type: "post",
      data: {'email':$('input[name=email]').val(), '_token': $('input[name=_token]').val()},
      success: function(data){
        alert(data);
      }
    });      
  }); 
});
</script>


@stop
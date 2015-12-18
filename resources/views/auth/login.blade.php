@extends('layouts.login')
@section('content')
<div class="container cms-page" id="login_content">
	<div class="row ">
		<div class="col-md-12 entry-content" >
			@if(Session::has('error'))
					<div class="alert-box success" id ="error_message">
					  <h6>{{ Session::get('error') }}</h6>
					</div>
			@endif
		 	
			<form method="POST" action="/auth/login" id= "login_form">
				{!! csrf_field() !!}

				  
					@if(Session::has('error'))
					<div class="alert-box success" id ="error_message">
					  <h6>{{ Session::get('error') }}</h6>
					</div>
					@endif

								
					<div class="form-group">
						{!! Form::label('email', 'Username:', ['class' => 'control-label']) !!}
						{!! Form::text('email', null, ['class' => 'form-control' , 'id' =>'email']) !!}
						 <p class="errors">{{$errors->first('email')}}</p>
					</div>
						
					<div class="form-group">
						{!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
						{!! Form::password('password', null, ['class' => 'form-control' , 'id' =>'password']) !!}
						<p class="errors">{{$errors->first('password')}}</p>
					</div>
						
					<div class="form-group">
						{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}
					</div>
				{!! Form::close() !!}
	
	
		</div>
	</div>
</div>
@stop
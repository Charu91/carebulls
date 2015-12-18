@extends('layouts.login')
@section('content')
<div class="container cms-page" id="login_content">
	<div class="row ">
		<div class="col-md-12 entry-content" >
			
				<form method="POST" action="/auth/register"id= "register_form">
					{!! csrf_field() !!}

					<div class="form-group">
						{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
						{!! Form::text('name', null, ['class' => 'form-control' , 'id' =>'name']) !!}
						<p class="errors">{{$errors->first('name')}}</p>
					</div>
					
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
						{!! Form::label('password_confirmation', 'Confirm Password:', ['class' => 'control-label']) !!}</br>
						{!! Form::password('password_confirmation', null, ['class' => 'form-control' , 'id' =>'password_confirmation']) !!}
						<p class="errors">{{$errors->first('password_confirmation')}}</p>
					</div>
					
					<div class="form-group">
						{!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
					</div>
					
				</form>
			</div>
	</div>
</div>
@stop
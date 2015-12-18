@extends('layouts.master')
@extends('layouts.index')
@extends('layouts.hospitalLayout')
@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body link = "white">
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('welcome1') }}">Carebulls</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('hospitalListing') }}">Hospitals</a></li>
				<li><a href="{{ URL::to('brands') }}">Brands</a></li>
				<li><a href="{{ URL::to('/auth/logout/') }}">Logout</a></li>
			</ul>
		</nav>

		<!-- will be used to show any messages -->
		@if (Session::has('message'))
			<div class="alert alert-info">{{ Session::get('message') }}</div>
		@endif
		<div >
			<div id="nav">
				<ul class="nav navbar-nav">
					<li><a href="{{ URL::to('welcome1') }}">Home</a></li></br>
					
				</ul>
			</div>
			
			<div id ="AddHospital" class="container cms-page">
				<div class="row ">
					<div class="col-md-12 entry-content">
				<!--	{!! Form::open(array('route' => 'hospital_store', 'class' => 'form')) !!}  -->
					{!! Form::open(array('url' => '/hospitalStore','class' => 'form')) !!}
					<div class="form-group">
						{!! Form::label('brand_id', 'Brand ID:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('brand_id', null, ['class' => 'form-control']) !!}
					</div>
						</br>
					<div class="form-group">
						{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('description', null, ['class' => 'form-control','maxsize'=>'10']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('contact_email', 'Email:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('contact_email', null, ['class' => 'form-control']) !!}
						<label class="control-label error-code text-danger" id="email_error">{{ $errors->first('email') }}</label>
					</div>
					<div class="form-group">
						{!! Form::label('contact_no', 'Phone Number:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('contact_no', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('address', 'Address:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('address', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('state', 'State:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('state', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('city', 'City:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('city', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('zip_code', 'Zip Code:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
					</div>
						<br>
					<div class="form-group">
						{!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
					</div>
					{!! Form::close() !!}	
					</div>
				</div>
			</div>

		</div>
	</div>
</body>
</html>
	
@stop
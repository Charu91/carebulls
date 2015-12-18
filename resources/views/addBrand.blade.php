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
				<!--<li><a href="{{ URL::to('hospitals') }}">Hospitals</a></li>
				<li><a href="{{ URL::to('brands') }}">Brands</a>-->
				<li class="item"><a href="{{ URL::to('hospitalListing') }}">Hospitals</a></li>
				<li><a href="{{ URL::to('brands') }}">Brands</a></li>
				<li><a href="{{ URL::to('/auth/logout/') }}" class="logout">Logout</a></li>
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
			
			<div id ="AddBrand" class="container cms-page">
				<div class="row ">
					<div class="col-md-12 entry-content">
				{!! Form::open(array('route' => 'brandStore', 'class' => 'form')) !!}  
				<!--		{!! Form::open(array('url' => '/brandStore','class' => 'form')) !!} -->
					<div class="form-group">
						{!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('name', null, ['class' => 'form-control']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('description', null, ['class' => 'form-control','maxsize'=>'10']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('thumb_url', 'Thumb URL:', ['class' => 'control-label']) !!}</br>
						{!! Form::text('thumb_url', null, ['class' => 'form-control']) !!}
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
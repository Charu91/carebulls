@extends('layouts.master')
@extends('layouts.index')
@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Look! I'm CRUDding</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body link = "white">
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('create') }}">Carebulls</a>
	</div>
	<ul class="nav navbar-nav">
		
		<li><a href="{{ URL::to('hospitalListing') }}">Hospitals</a></li>
		<li><a href="{{ URL::to('brands') }}">Brands</a></li>
	</ul>
</nav>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div>
			<div id="nav">
				<ul class="nav navbar-nav">
					<li><a href>Welcome</a></li></br>
					<li><a href>Listings</a></li></br>
				</ul>
			
		</div>
	

		<div id ="section">
			<a class="btn btn-small btn-success" href="{{ URL::to('addBrand') }}">Add new Brand</a> </br> </br>
		
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>Name</td>
						<td>Description</td>
						<td>Thumb URL</td>
					</tr>
				</thead>
				<tbody>
			
				</tbody>
			</table>
		</div>
	</div>	
</div>
</body>
</html>
	
@stop
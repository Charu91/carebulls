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
		<!--<li><a href="{{ URL::to('hospitals') }}">Hospitals</a></li>
		<li><a href="{{ URL::to('brands') }}">Brands</a>-->
		<li><a href="{{ URL::to('hospitalListing') }}">Hospitals</a></li>
		<li><a href>Brands</a></li>
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
		
		<a class="btn btn-small btn-success" href=>Add new Hospital</a>
		
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>Brand ID</td>
						<td>Name</td>
						<td>Description</td>
						<td>Email</td>
						<td>Phone Number</td>
						<td>Address</td>
						<td>State</td>
						<td>City</td>
						<td>Zip Code</td>
					</tr>
				</thead>
				<tbody>
			<!--	@foreach($posts as $post)
					<tr>
						<td>{{ $post->brand_id}}</td>
						<td>{{ $post->name}}</td>
						<td>{{ $post->description}}</td>
						<td>{{ $post->contact_email}}</td>
						<td>{{ $post->contact_no}}</td>
						<td>{{ $post->address}}</td>
						<td>{{ $post->state}}</td>
						<td>{{ $post->city}}</td>
						<td>{{ $post->zip_code}}</td>
						
						<!-- we will also add show, edit, and delete buttons 
						<td>

							<!-- show the nerd (uses the show method found at GET /nerds/{id} 
							<a class="btn btn-small btn-success" href=">Edit</a>
							
							<a class="btn btn-small btn-success" href=">Delete</a>
							
							<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit 
							<a class="btn btn-small btn-info" href="{{ URL::to('nerds/' . $value->id . '/edit') }}">Edit this Nerd</a>

						</td>
					</tr>
				@endforeach-->
				</tbody>
			</table>
		</div>
		
	
</div>
</body>
</html>
	
</div>
</div>
</body>
</html>
@stop
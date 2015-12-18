@extends('layouts.master')
@extends('layouts.index')
@extends('layouts.table')
@section('content')

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body link = "white">
	<div class="container" id = "heading">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('welcome1') }}">Carebulls</a>
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
						<li><a href="{{ URL::to('welcome1') }}">Home</a></li></br>
						<li><a href>Listings</a></li></br>
					</ul>
				
		</div>
		

			<div id ="table_area">
			
				<a class="btn btn-small btn-success" href="{{ URL::to('addHospital') }}">Add new Hospital</a> </br> </br>
			
				<table class="table table-striped table-hover">
					<thead>
						<tr>
								<th>ID</th>
								<th>Brand ID</th>
								<th>Name</th>
								<th>Description</th>
								<th>Email</th>
								<th>Phone Number</th>
								<th>Address</th>
								<th>State</th>
								<th>City</th>
								<th>Zip Code</th>
								<th colspan="2">Actions</th>
						</tr>
					
					</thead>
					<tbody>
						@foreach($posts as $post)
							<tr>
								<td>{{ $post->id}}</td>
								<td>{{ $post->brand_id}}</td>
								<td>{{ $post->name}}</td>
								<td>{{ $post->description}}</td>
								<td>{{ $post->contact_email}}</td>
								<td>{{ $post->contact_no}}</td>
								<td>{{ $post->address}}</td>
								<td>{{ $post->state}}</td>
								<td>{{ $post->city}}</td>
								<td>{{ $post->zip_code}}</td>
								<td><a href="{{ URL::to('editHospital',$post->id) }}" class="btn btn-warning">Edit</a></td>
								<td><a href="{{ URL::to('hospitalDestroy',$post->id) }}" class="btn btn-danger" onclick="ConfirmDelete()">Delete</a></td>
										</td>									
							</tr>
						@endforeach			
					</tbody>
				</table>
			</div>
			<center>	{!! $posts->render() !!}	</center?>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
    function ConfirmDelete()
  {
	  var retVal = confirm("Do you want to continue ?");
		if (retVal == true)
		{
			return true;
			
		} 
		else
		{
			return false;
			
		}
	}
	

</script>	

@stop
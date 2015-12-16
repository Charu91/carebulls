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
						@foreach($hospitals as $hospital)
							<tr>
								<td>{{ $hospital->brand_id}}</td>
								<td>{{ $hospital->name}}</td>
								<td>{{ $hospital->description}}</td>
								<td>{{ $hospital->contact_email}}</td>
								<td>{{ $hospital->contact_no}}</td>
								<td>{{ $hospital->address}}</td>
								<td>{{ $hospital->state}}</td>
								<td>{{ $hospital->city}}</td>
								<td>{{ $hospital->zip_code}}</td>
								<td><a href="{{route('editHospital',$hospital->id)}}" class="btn btn-warning">Edit</a></td>
								<td> 
								{!! Form::open(['method' => 'DELETE', 'route'=>['hospitaldestroy', $hospital->id]]) !!}
								 {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
								 {!! Form::close() !!}
								 </td>
														
								
							</tr>
						@endforeach			
					</tbody>
				</table>
			</div>

		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function() 
	{
		var Hospitals = $('#example').dataTable();
	} );


	function editRow ( Hospitals, nRow )
	{
		var aData = Hospitals.fnGetData(nRow);
		var jqTds = $('>td', nRow);
		jqTds[0].innerHTML = '<input type="text" value="'+aData[0]+'">';
		jqTds[1].innerHTML = '<input type="text" value="'+aData[1]+'">';
		jqTds[2].innerHTML = '<input type="text" value="'+aData[2]+'">';
		jqTds[3].innerHTML = '<input type="text" value="'+aData[3]+'">';
		jqTds[4].innerHTML = '<input type="text" value="'+aData[4]+'">';
		jqTds[5].innerHTML = '<input type="text" value="'+aData[5]+'">';
		jqTds[6].innerHTML = '<input type="text" value="'+aData[6]+'">';
		jqTds[7].innerHTML = '<input type="text" value="'+aData[7]+'">';
		jqTds[8].innerHTML = '<input type="text" value="'+aData[8]+'">';
		jqTds[9].innerHTML = '<input type="text" value="'+aData[9]+'">';
		jqTds[10].innerHTML = '[Save]()';
	}
	function saveRow ( Hospitals, nRow )
	{
		var jqInputs = $('input', nRow);
		Hospitals.fnUpdate( jqInputs[0].value, nRow, 0, false );
		Hospitals.fnUpdate( jqInputs[1].value, nRow, 1, false );
		Hospitals.fnUpdate( jqInputs[2].value, nRow, 2, false );
		Hospitals.fnUpdate( jqInputs[3].value, nRow, 3, false );
		Hospitals.fnUpdate( jqInputs[4].value, nRow, 4, false );
		Hospitals.fnUpdate( jqInputs[5].value, nRow, 5, false );
		Hospitals.fnUpdate( jqInputs[6].value, nRow, 6, false );
		Hospitals.fnUpdate( jqInputs[7].value, nRow, 7, false );
		Hospitals.fnUpdate( jqInputs[8].value, nRow, 8, false );
		Hospitals.fnUpdate( jqInputs[9].value, nRow, 9, false );
		Hospitals.fnUpdate( '[Edit]()', nRow, 10, false );
		Hospitals.fnDraw();
	}
	
	$(document).ready(function() {
    var Hospitals = $('#example').dataTable();
    var nEditing = null;
 
    $('#example a.edit').live('click', function (e) {
        e.preventDefault();
 
        /* Get the row as a parent of the link that was clicked on */
        var nRow = $(this).parents('tr')[0];
 
        if ( nEditing !== null &amp;&amp; nEditing != nRow ) {
            /* A different row is being edited - the edit should be cancelled and this row edited */
            restoreRow( Hospitals, nEditing );
            editRow( Hospitals, nRow );
            nEditing = nRow;
        }
        else if ( nEditing == nRow &amp;&amp; this.innerHTML == "Save" ) {
            /* This row is being edited and should be saved */
            saveRow( Hospitals, nEditing );
            nEditing = null;
        }
        else {
            /* No row currently being edited */
            editRow( Hospitals, nRow );
            nEditing = nRow;
        }
    } );
} );
	
	$('#example a.delete').live('click', function (e)
	{
		e.preventDefault();
	 
		var nRow = $(this).parents('tr')[0];
		Hospitals.fnDeleteRow( nRow );
	} );

</script>

	
@stop
<h3>Carebulls</h3>
<div class="container cms-page">
	<div class="row ">
		<div class="col-md-12 entry-content">
			<center>
				{!! Form::open(array('route' => 'welcome1', 'class' => 'form')) !!}

					<div class="form-group">
						{!! Form::label('username', 'Username:', ['class' => 'control-label']) !!}
						{!! Form::text('username', null, ['class' => 'form-control']) !!}
					</div>
						</br>
					<div class="form-group">
						{!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
						{!! Form::text('password', null, ['class' => 'form-control']) !!}
					</div>
						<br>
						{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

						{!! Form::close() !!}
			</center>
		</div>
	</div>
</div>
@extends('layouts/default')

@section('meta-title', 'Log In')

@section('content')
	<h1>Login</h1>

	{{ Form::open(['route' => 'sessions.store']) }}
	
	<!-- Email field -->
	<div class="form-group">
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', null, ['class' => 'form-control']) }}
		{{ errors_for('email', $errors) }}
	</div>

	<!-- Password field -->
	<div class="form-group">
		{{ Form::label('password', 'Password:') }}
		{{ Form::password('password', ['class' => 'form-control']) }}
		{{ errors_for('password', $errors) }}
	</div>

	<!-- Submit button -->
	<div class="form-group">
		{{ Form::submit('Log In!', ['class' => 'btn btn-primary']) }}
	</div>
	{{ link_to('password/remind', 'Forgot your password?') }}

	<!-- Flash message -->
	@if (Session::has('flash_message'))
		<div class="form-group">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	{{ Form::close() }}
@stop
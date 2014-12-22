@extends('layouts/default')

@section('content')
	
	<h1>Edit Profile</h1>

	@if (Session::has('flash_message'))
		<div class="flash">
			<p>{{ Session::get('flash_message') }}</p>
		</div>
	@endif

	{{ Form::model($user->profile,['method' => 'PATCH', 'route' => ['profile.update', $user->username]]) }}

		<!-- Location field -->
		<div class="form-group">
			{{ Form::label('location','Location:') }}
			{{ Form::text('location', null, ['class' => 'form-control']) }}
			{{ errors_for('location', $errors) }}
		</div>

		<!-- Bio field -->
		<div class="form-group">
			{{ Form::label('bio','Bio:') }}
			{{ Form::textarea('bio', null, ['class' => 'form-control']) }}
			{{ errors_for('bio', $errors) }}
		</div>

		<!-- Twitter Username field -->
		<div class="form-group">
			{{ Form::label('twitter_username','Twitter Username:') }}
			{{ Form::text('twitter_username', null, ['class' => 'form-control']) }}
		</div>

		<!-- Facebook Username field -->
		<div class="form-group">
			{{ Form::label('facebook_username','Facebook Username:') }}
			{{ Form::text('facebook_username', null, ['class' => 'form-control']) }}
		</div>

		<!-- Submit button -->
		 <div class="form-group">
	    	{{ Form::submit('Update Profile', ['class' => 'btn btn-primary']) }}
	    </div>

	{{ Form::close() }}
	
@stop
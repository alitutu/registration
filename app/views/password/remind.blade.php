@extends('layouts/default')

@section('content')

	<h1>Need to reset your password?</h1>

	{{ Form::open() }}

		<!-- Email field -->
	    <div class="form-group">
	    	{{ Form::label('email','Email:') }}
	    	{{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
	        {{ errors_for('email', $errors) }}
	    </div>


		<!-- Submit button -->
		 <div class="form-group">
	    	{{ Form::submit('Reset', ['class' => 'btn btn-primary']) }}
	    </div>

	    @if (Session::has('error'))
	    	<p class="error">{{ Session::get('error') }}</p>
	    @elseif (Session::has('status'))
	    	<p class="success">{{ Session::get('status') }}</p>
	    @endif

	{{ Form::close() }}
@stop
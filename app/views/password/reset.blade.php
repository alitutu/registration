@extends('layouts/default')

@section('meta-title', 'reset your password')

@section('content')

  <div class="starter-template">
    <h1>Set Your New Password</h1>

    {{ Form::open() }}

    <input type="hidden" name="token" value="{{ $token }}" />

    <!-- Email field -->
    <div class="form-group">
    	{{ Form::label('email','Email:') }}
    	{{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
        {{ errors_for('email', $errors) }}
    </div>

    <!-- Password field -->
   <div class="form-group">
    	{{ Form::label('password','Password:') }}
    	{{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
        {{ errors_for('password', $errors) }}
    </div>

    <!-- Password Confirmation field -->
    <div class="form-group">
    	{{ Form::label('password_confirmation','Password Confirmation:') }}
    	{{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) }}
    </div>

    <!-- Submit button-->
     <div class="form-group">
    	{{ Form::submit('Create Account', ['class' => 'btn btn-primary']) }}
    </div>

    {{ Form::close() }}

     @if (Session::has('error'))
    	<p class="error">{{ Session::get('error') }}</p>
    @endif

  </div>
@stop
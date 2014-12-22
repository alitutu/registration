<?php

Route::controller('password', 'RemindersController');

// Route::get('/',function()
// {

// 	// $user = User::first();

// 	// $role = Role::whereName('administrator')->first();
// 	// $user->assignRole($role);

// 	// //$user->removeRole(2);

// 	// return $user->roles;

// 	// if ($user->hasRole('owner')) return 'you are the owner';

// 	// return 'you are not';
// });

//Auth::loginUsingId(5);

Route::get('reporting', function()
{
	return 'Secrect financial reports.';
})->before('role:owner');

//return;

# Home
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

# Registration
Route::get('/register', 'RegistrationController@create')->before('guest');
Route::post('/register', ['as' => 'registration.store', 'uses' => 'RegistrationController@store'])->before('csrf');

# Authentication
Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);
Route::resource('sessions', 'SessionsController', ['only' => ['create', 'store', 'destroy']]);

# Profile
Route::get('/profile/{username}', 'ProfilesController@show')->before('auth');

Route::resource('profile', 'ProfilesController', ['only' => ['show','edit','update']]);

Route::get('/{username}', ['as' => 'profile', 'uses' => 'ProfilesController@show'])->before('auth');
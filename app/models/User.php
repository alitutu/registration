<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	/**
	 * Fillable fields.
	 *
	 * @var string
	 */
	protected $fillable = [
		'username', 'email', 'password'
	];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function setPasswordAttribute($password) 
	{
		$this->attributes['password'] = Hash::make($password);
	}

	public function profile() 
	{
		return $this->hasOne('Profile');
	}

	public function isCurrent()
	{
		if(Auth::guest()) return false;
		
		return Auth::user()->id == $this->id;
	}

	public function roles() 
	{
		return $this->belongstoMany("Role")->withTimestamps();
	}

	public function hasRole($name) 
	{
		foreach ($this->roles as $role) 
		{
			if ($role->name == $name) return true;
		}

		return false;
	}

	public function assignRole($role)
	{
		return $this->roles()->attach($role);
	}

	public function removeRole($role)
	{
		return $this->roles()->detach($role);
	}


}

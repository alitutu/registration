@extends('layouts/default')

@section('content')
	
	@if($user->profile)

		<h1>{{ $user->username }} <small>{{ $user->profile->location }}</small></h1>
		<div class="bio">
			<p>
				{{ $user->profile->bio }}
			</p>
		</div>
		<ul class="links">
			<li>
				{{ link_to('http://twitter.com/' . $user->profile->twitter_username, 'Find me on Twitter', array('target'=>'_blank')) }}
			</li>
			<li>
				{{ link_to('http://facebook.com/' . $user->profile->facebook_username, 'Find me on Facebook', array('target'=>'_blank')) }}
			</li>

		</ul>
	@else
		<h1>{{ $user->username }} <small>has no profile yet.</small></h1>
	@endif
	@if($user->isCurrent())
		{{ link_to_route('profile.edit', 'Edit Your Profile', $user->username) }}
	@endif
@stop
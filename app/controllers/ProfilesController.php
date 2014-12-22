<?php 

use Acme\Forms\ProfileForm;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfilesController extends BaseController {


	protected $profileForm;

	function __construct(ProfileForm $profileForm)
	{

		$this->profileForm = $profileForm;

		$this->beforeFilter('currentUser', ['only' => ['edit', 'update']]);
	}

	/**
	 * Display the specified resource.
	 * GET /pagescontroller/{id}
	 *
	 * @param  username
	 * @return Response
	 */
	public function show($username)
	{
		try
		{
			$user = User::with('profile')->whereUsername($username)->firstOrFail();
			
		}
		catch(ModelNotFoundException $e)
		{
			return Redirect::home()->withFlashMessage('User not Found!'); // beter is een 404 pagina EN in globals.php zetten.
		}

		return View::make('profiles.show')->withUser($user);
	}

	public function edit($username)
	{
		$user = User::whereUsername($username)->firstOrFail();

		return View::make('profiles.edit')->withUser($user);
	}

	public function update($username)
	{
		$user = User::whereUsername($username)->firstOrFail();
		$input = Input::only('location','bio','twitter_username','facebook_username');
		
		$this->profileForm->validate($input);

		$user->profile->fill($input)->save();

		return Redirect::route('profile.edit', $user->username)->withFlashMessage('Your Profile Has Been Updated');
	}

}
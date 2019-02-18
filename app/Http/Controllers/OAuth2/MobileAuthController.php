<?php

namespace App\Http\Controllers\OAuth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\user;
use Auth;

class MobileAuthController extends Controller
{
    //Login Function
	public function login(Request $request)
	{
		$field = filter_var(request('email'), FILTER_VALIDATE_EMAIL)?'email':'username';
		$data = request()->only('email', 'password');

		if (Auth::attempt([
				$field     		=> $data['email'],
				'password' 		=> $data['password'],
				'deleted_at'    => null,
			])) {
			$status = true;
			$user = Auth::user();
			$req_email = Auth::user()->email;
		} else {
			$status = false;
			$user = null;
			$req_email = '';
		}

		$client = Client::where('password_client', 1)->first();
		$request->request->add([
			'grant_type'    => 'password',
			'client_id'     => $client->id,
			'client_secret' => $client->secret,
			'username'      => $req_email,
			'password'      => $data['password'],
			'scope'         => '*'
		]);
		$token          = Request::create('oauth/token', 'POST');
		$response       = \Route::dispatch($token);
		$json           = (array) json_decode($response->getContent());
		$json['status'] = $status;
		$json['user']   = $user;
		$response->setContent(json_encode($json));
		return $response;
	}

	//Logout Function
	public function logout(Request $request)
	{
		$request->user()->token()->revoke();
		//$request->user()->token()->delete();
		$res = [
			'status'  => true,
			'message' => 'You are Logged out.',
		];
		return $res;
	}
}

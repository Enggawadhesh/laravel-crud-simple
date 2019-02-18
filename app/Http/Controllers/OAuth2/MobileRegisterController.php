<?php

namespace App\Http\Controllers\OAuth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Laravel\Passport\Client;
use App\User;
use Validator;

class MobileRegisterController extends Controller
{
    //Register Function
	public function register(Request $request)
	{
		//Validate User
		$data = request()->only('name', 'email', 'password', 'confirmed_password');

		$validator = Validator::make($data, [
				'name'               => 'required|string|min:5|max:25',
				'email'              => 'required|string|email|max:50|unique:users',
				// 'mobile'             => 'required|numeric|regex:/^\d{10}$/|valid_mobile',
				'password'           => [ 'required', 'string', 'min:6', 'max:20', 'valid_password', Rule::notIn($request['email']) ],
				'confirmed_password' => 'required|same:password',
			]);

		if ($validator->fails()) {
			return ['status' => false, 'error' => $validator->messages()];
		}

		//Create User
		$user = User::create([
				'name'         => $data['name'],
				'email'        => $data['email'],
				// 'mobile'       => $data['mobile'],
				'username'     => strtolower(explode(' ', $data['name'])[0]).time(),
				'password'     => bcrypt($data['password']),
			]);

		//Create Auth Token
		$client = Client::where('password_client', 1)->first();

		$request->request->add([
				'grant_type'    => 'password',
				'client_id'     => $client->id,
				'client_secret' => $client->secret,
				'username'      => $data['email'],
				'password'      => $data['password'],
				'scope'         => '*',
			]);

		//Fire off the internal request
		$token          = Request::create('oauth/token', 'POST');
		$response       = \Route::dispatch($token);
		$json           = (array) json_decode($response->getContent());
		$json['status'] = 'true';
		$json['user']   = User::find($user->id);
		$response->setContent(json_encode($json));
		return $response;
	}
}

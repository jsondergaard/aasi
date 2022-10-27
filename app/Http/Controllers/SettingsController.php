<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
	public function index()
	{
		return view('settings');
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email',
			'name' => 'required',
			'password' => 'sometimes|confirmed',
		]);

		auth()->user()->update([
			'email' => $request->get('email'),
			'name' => $request->get('name'),
			'password' => $request->get('password') ? Hash::make($request->get('password')) : auth()->user()->password,
		]);

		return redirect(route('settings'));
	}
}

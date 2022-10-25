<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.users.index', [
			'users' => User::all(),
		]);
	}

	/**
	 * Edit the user.
	 *
	 * @param User $user
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function edit(User $user)
	{
		return view('admin.users.edit', [
			'user' => $user,
		]);
	}

	/**
	 * Create new user.
	 *
	 * @param User $user
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store the incoming page.
	 *
	 * @param StoreUser $request
	 * @return Response
	 */
	public function store(StoreUser $request)
	{
		User::create([
			'name' => $request->name,
		]);

		return redirect(route('admin.users.index'));
	}
}

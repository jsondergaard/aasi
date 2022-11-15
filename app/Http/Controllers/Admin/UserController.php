<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;

class UserController extends Controller
{
	/**
	 * Show all users.
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
			'departments' => Department::all(),
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
		return view('admin.users.create', [
			'departments' => Department::all(),
		]);
	}

	/**
	 * Store the incoming user.
	 *
	 * @param StoreUser $request
	 * @return Response
	 */
	public function store(StoreUser $request)
	{
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'gender' => $request->gender,
		]);

		foreach ($request->departments as $department) {
			$user->departments()->toggle($department);
		}

		// TODO: Send an email

		return redirect(route('admin.users.index'));
	}

	/**
	 * Update the user.
	 *
	 * @param User $user
	 * @return Response
	 */
	public function update(StoreUser $request, User $user)
	{
		$user->update([
			'name' => $request->name,
			'email' => $request->email,
			'gender' => $request->gender,
		]);

		$user->syncRoles($request->role);

		return redirect(route('admin.users.edit', $user));
	}

	public function destroy(User $user)
	{
		$user->delete();

		return redirect(route('admin.users.index'));
	}
}

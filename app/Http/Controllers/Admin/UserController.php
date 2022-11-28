<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Department;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUser;
use App\Notifications\CreatedUser;
use Illuminate\Support\Facades\Hash;

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
			'password' => Hash::make($password = $this->generateRandomString()),
		]);

		$user->notify(new CreatedUser($password));

		if ($request->departments) {
			foreach ($request->departments as $department) {
				$user->departments()->toggle($department);
			}
		}

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

	public function toggleDepartment(User $user, Department $department)
	{
		$user->departments()->toggle($department->id, ['created_at' => now()]);

		return back();
	}

	protected function generateRandomString($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';

		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}

		return $randomString;
	}
}

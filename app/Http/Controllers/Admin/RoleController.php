<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRole;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
	/**
	 * Show all roles.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.roles.index', [
			'roles' => Role::all(),
		]);
	}

	/**
	 * Edit the role.
	 *
	 * @param Role $role
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function edit(Role $role)
	{
		return view('admin.roles.edit', [
			'role' => $role,
		]);
	}

	/**
	 * Create new role.
	 *
	 * @param Role $role
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function create()
	{
		return view('admin.roles.create');
	}

	/**
	 * Store the incoming role.
	 *
	 * @param StoreRole $request
	 * @return Response
	 */
	public function store(StoreRole $request)
	{
		$role = Role::create([
			'name' => $request->name,
		]);

		$role->syncPermissions(array_keys($request->permissions));

		return redirect(route('admin.roles.index'));
	}

	/**
	 * Update the role.
	 *
	 * @param Role $role
	 * @return Response
	 */
	public function update(StoreRole $request, Role $role)
	{
		if ($role->name == "super-admin") return redirect(route('admin.roles.index'));

		$role->syncPermissions(array_keys($request->permissions));

		return redirect(route('admin.roles.edit', $role));
	}

	/**
	 * Delete the role.
	 *
	 * @param Role $role
	 * @return Response
	 */
	public function destroy(Role $role)
	{
		if ($role->name == "super-admin") return redirect(route('admin.roles.index'));

		$role->delete();

		return redirect(route('admin.roles.index'));
	}
}

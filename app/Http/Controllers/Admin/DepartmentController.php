<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
	public function index()
	{
		return view('admin.departments.index', [
			'departments' => Department::all(),
		]);
	}

	public function edit(Department $department)
	{
		return view('admin.departments.edit', [
			'department' => $department,
		]);
	}

	public function create()
	{
		return view('admin.departments.create', [
			'availablePages' => Department::all(),
		]);
	}

	public function store(Request $request)
	{
		Department::create([
			'name' => $request->name,
		]);

		return redirect(route('admin.departments.index'));
	}

	public function update(Request $request, Department $department)
	{
		$department->update([
			'name' => $request->name,
		]);

		return redirect(route('admin.departments.edit', $department));
	}

	public function destroy(Department $department)
	{
		$department->delete();

		return redirect(route('admin.departments.index'));
	}

	public function viewMembers(Department $department)
	{
		return view('admin.departments.members', [
			'department' => $department,
			'members' => $department->users,
		]);
	}
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreSponsor;
use App\Http\Controllers\Controller;

class SponsorController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.sponsors.index', [
			'sponsors' => Sponsor::all(),
		]);
	}

	public function view(Sponsor $sponsor)
	{
		return view('admin.sponsors.view', [
			'sponsor' => $sponsor,
		]);
	}

	public function destroy(Sponsor $sponsor)
	{
		return null;
	}

	public function create()
	{
		return view('admin.sponsors.create');
	}

	public function edit()
	{
		return view('admin.sponsors.edit', [
			'sponsor' => $sponsor,
		]);
	}
	public function store(StoreSponsor $request)
	{
		Sponsor::create([
			'name' => $request->name,
			'description' => $request->description,
		]);
		return redirect(route('admin.sponsors.index'));
	}
}

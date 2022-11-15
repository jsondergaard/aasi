<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreSponsor;
use App\Http\Controllers\Controller;

class SponsorController extends Controller
{
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
		$sponsor->delete();

		return redirect(route('admin.sponsors.index'));
	}

	public function create()
	{
		return view('admin.sponsors.create');
	}

	public function edit(Sponsor $sponsor)
	{
		return view('admin.sponsors.edit', [
			'sponsor' => $sponsor,
		]);
	}

	public function update(Sponsor $sponsor, StoreSponsor $request)
	{
		$sponsor->update([
			'name' => $request->name,
			'description' => $request->description,
			'link' => $request->link,
		]);

		if ($request->file('image')) {
			$sponsor->upload($request->file('image'));
		}

		return redirect(route('admin.sponsors.index'));
	}

	public function store(StoreSponsor $request)
	{
		$sponsor = Sponsor::create([
			'name' => $request->name,
			'description' => $request->description,
			'link' => $request->link,
		]);

		if ($request->file('image')) {
			$sponsor->upload($request->file('image'));
		}

		return redirect(route('admin.sponsors.index'));
	}
}

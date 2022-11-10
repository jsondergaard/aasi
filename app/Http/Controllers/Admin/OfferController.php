<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sponsor;
use App\Models\Offer;
use App\Http\Requests\Admin\StoreOffer;
use App\Http\Controllers\Controller;

class OfferController extends Controller
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
		return view('sponsors', [
			'offers' => Offer::all(),
		]);
	}

	public function create(Sponsor $sponsor)
	{
		return view('admin.sponsors.offers.create', [
			'sponsor' => $sponsor,
		]);
	}

	public function edit(Sponsor $sponsor, Offer $offer)
	{
		return view('admin.sponsors.offers.edit', [
			'offer' => $offer,
		]);
	}

	public function update(Sponsor $sponsor, Offer $offer, StoreOffer $request)
	{
		$offer->update([
			'name' => $request->name,
			'description' => $request->description,
			'cooldown' => ($request->cooldown != 0) ? $request->cooldown : null,
		]);

		if ($request->file('image')) {
			$offer->upload($request->file('image'));
		}

		return redirect(route('admin.sponsors.index'));
	}

	public function store(Sponsor $sponsor, StoreOffer $request)
	{
		$offer = Offer::create([
			'name' => $request->name,
			'description' => $request->description,
			'sponsor_id' => $sponsor->id,
			'cooldown' => ($request->cooldown != 0) ? $request->cooldown : null,
		]);

		if ($request->file('image')) {
			$offer->upload($request->file('image'));
		}

		return redirect(route('admin.sponsors.index'));
	}
}

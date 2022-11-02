<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sponsor;
use App\Models\Offer;
use Illuminate\Http\Request;
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
			'offers' => Sponsor::all(),
		]);
	}
	public function view(Offer $request){
		return view('admin.sponsors.offers.create', [
			'offers' => $offers,
		]);
	}
	public function create(Sponsor $sponsor){
		return view('admin.sponsors.offers.create', [
			'sponsor' => $sponsor,
		]);
	}

	public function store(Sponsor $sponsor,StoreOffer $request)
	{
		Offer::create([
			'name' => $request->name,
			'description' => $request->description,
			'sponsor_id' => $sponsor->id,
		]);
		return redirect(route('admin.sponsors.index'));
	}
}

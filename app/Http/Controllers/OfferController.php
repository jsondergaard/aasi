<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

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

	public function index()
	{
		return view('offers.index', [
			'offers' => Offer::all(),
		]);
	}

	public function view(Offer $offer)
	{
		return view('offers.show', [
			'offer' => $offer,
		]);
	}

	public function activate(Offer $offer)
	{
		$offer->activate();

		return redirect(route('offers.view', $offer));
	}
}

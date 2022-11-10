<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsedOffer;

class HomeController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function home()
	{
		return view('admin.home', [
			'usedOffers' => UsedOffer::latest()->limit(5)->get(),
		]);
	}
}

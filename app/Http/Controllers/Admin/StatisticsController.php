<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Offer;
use App\Models\Sponsor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		return view('admin.statistics.index', [
			'sponsors' => Sponsor::all(),
			'offers' => Offer::all(),
		]);
	}

	public function view(Sponsor $sponsor)
	{
		return view('admin.statistics.view', [
			'sponsor' => $sponsor,
			'departments' => Department::all(),
		]);
	}
}

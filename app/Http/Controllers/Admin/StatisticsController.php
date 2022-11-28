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
		// DB::table('used_offers')
		// 	->join('users', 'used_offers.user_id', '=', 'users.id')
		// 	->join('departments', 'departments.id', '=', 'department_user.department_id')
		// 	->join('department_user', 'users.id', '=', 'department_user.user_id')
		// 	->where('used_offers.offer_id', '=', $offer->id)
		// 	->count()

		return view('admin.statistics.view', [
			'sponsor' => $sponsor,
			'departments' => Department::all(),
		]);
	}
}

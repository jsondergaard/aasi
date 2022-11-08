<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class OfferController extends Controller
{
	public function index()
	{
		return view('offers.index');
	}

	public function show()
	{
		return view('offers.show');
	}
}

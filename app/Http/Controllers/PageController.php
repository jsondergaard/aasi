<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
	/**
	 * @param \App\Models\Page $page
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function view(Page $page)
	{
		return view('page', [
			'page' => $page
		]);
	}
}

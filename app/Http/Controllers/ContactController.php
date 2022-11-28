<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function index()
	{
		return view('contact');
	}

	public function send(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required|email',
			'subject' => 'required',
			'department' => 'required',
			'message' => 'required',
		]);

		Mail::send('emails.contact', ['mail' => $request], function ($m) use ($request) {
			$m->from($request->email, $request->name);
			$m->to($request->department . '@aasisport.dk', 'AASI')->subject($request->subject);
		});

		flash('Beskeden blev sendt!')->success();

		return back();
	}
}

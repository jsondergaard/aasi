<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAdmin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (auth()->user() &&  auth()->user()->admin_at) {
			return $next($request);
		}

		return redirect('/');
	}
}

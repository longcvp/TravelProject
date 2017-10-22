<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Check
{
	public function handle($request, Closure $next)
	{
		return redirect('/home');
	}
}
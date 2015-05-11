<?php namespace Comparahora\Http\Middleware;

use Closure;

class Comprador {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( ! $request->user()->isComprador()) {
			return redirect('planes');
		}
		return $next($request);
	}

}

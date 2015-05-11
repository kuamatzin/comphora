<?php namespace Comparahora\Http\Middleware;

use Closure;

class Manager {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{	
		if ( ! $request->user()->isManager()) {
			return redirect('comprador');
		}
		return $next($request);
	}

}

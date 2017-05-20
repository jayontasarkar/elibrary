<?php

namespace App\Http\Middleware;

use Closure;

class IsLibrarian
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
        if( ! auth()->check() ) {
            return redirect('login');
        }
        if(auth()->user()->type !== 'librarian') {
            flash()->error('Unauthorized', 'you are not authorized to view the page');
            return redirect('dashboard');
        }

        return $next($request);
    }
}

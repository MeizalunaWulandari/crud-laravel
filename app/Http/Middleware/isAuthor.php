<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Qoute;
use Illuminate\Http\Request;

class IsAuthor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $author = auth()->user();
        $qoute = Qoute::findOrFail($author->id);

        if ($qoute->user_id == $author->id) {
            // die();
            return abort(403);
        }
        return $next($request);

        
    }
}

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
        $id = intval(request()->segment(2));
        $qoute = Qoute::findOrFail($id);
        

        if ($qoute->user_id != $author->id) {
            return 'Qoute not found';
        }
        return $next($request);

        
    }
}

<?php

namespace App\Http\Middleware\News;

use App\Models\News;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PublishedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var News $news
         */
        $news = $request->route('news');
        if (!$news->published()) {
            return abort(403);
        }
        return $next($request);
    }
}

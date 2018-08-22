<?php
/**
 * Created by PhpStorm.
 * User: fabien
 * Date: 19/07/2018
 * Time: 09:49
 */

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Response;

class BuildApiResponse
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $response = $next($request);
        $originalContent = $response->getOriginalContent();
        $count = count($originalContent);
        $success = true;

        return response()->json([
            'success' => $success,
            'total' => $count,
            'data' => $originalContent
        ]);

    }

}
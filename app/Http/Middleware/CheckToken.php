<?php

namespace App\Http\Middleware;

use App\Repository\TokenRepository;
use Closure;

class CheckToken
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
        $token = $request->header('Authorization', null);
        $tokenRepository = new TokenRepository();
        if($token && $tokenRepository->getByToken($token)){
            return $next($request);
        }

        return response()->json('Forbidden', 403);
    }
}

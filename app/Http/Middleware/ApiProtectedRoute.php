<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Services\Auth\Exception\AuthExceptionService;

class ApiProtectedRoute extends BaseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
          $use = JWTAuth::parseToken()->authenticate();
        } catch (\Exception $e){
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return response()->json(['mensagem'=>'Token invalido']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException ){
                return response()->json(['mensagem'=>'Token expirado']);
            } else {
                return response()->json(['mensagem'=>'Token não encontrado']);
            }
        }

        return $next($request);
    }
}

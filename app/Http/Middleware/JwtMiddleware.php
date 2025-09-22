<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenExpiredException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\TokenInvalidException;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class JwtMiddleware
{
    use ApiResponser;

    /**
     * @param $request
     * @param Closure $next
     * @return JsonResponse
     */
    public function handle($request, Closure $next): JsonResponse
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return $this->ErrorResponse(401, 'User not found with this token');
            }
        } catch (TokenExpiredException) {
            return $this->ErrorResponse(401, 'Token expired');
        } catch (TokenInvalidException) {
            return $this->ErrorResponse(401, 'Token invalid');
        } catch (JWTException) {
            return $this->ErrorResponse(401, 'Token is required');
        } catch (Exception $e) {
            return $this->ErrorResponse(500, 'Something went wrong: ' . $e->getMessage());
        }

        return $next($request);
    }
}

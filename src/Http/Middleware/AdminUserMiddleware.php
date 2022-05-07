<?php


namespace SoleX\Blog\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use SoleX\Blog\Enums\Abilities;
use SoleX\Blog\Enums\SessionKeys;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdminUserMiddleware
{
    public function handle($request, Closure $next, $role = null)
    {
        $response = response('')->setStatusCode(404);
        // 游客不允许
        if (Auth::guest()) {
            return $response;
        }
        // 非管理员用户也不允许
        if (!Auth::user() || !Auth::user()?->isAdmin()) {
            return $response;
        }

        // 如果需要的角色为空直接放过
        if (null === $role) {
            return $next($request);
        }

        // 如果会话未验证，就返回 401
        if (!session()->has(SessionKeys::AdminVerified->value)) {
            return $response->setStatusCode(401);
        }
        /**
         * 如果是超级管理，就放过去。
         */
        if (Gate::check(Abilities::SuperAdmin->value)) {
            return $next($request);
        }

        throw new NotFoundHttpException();
    }
}

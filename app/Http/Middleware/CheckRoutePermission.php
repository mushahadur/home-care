<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckRoutePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName(); // e.g. roles.index

        // Convert route name to permission name (e.g. roles.index => roles-list)
        $permissionName = $this->convertRouteToPermission($routeName);

        // Allow if no name or user has permission
        if (!$permissionName || auth()->user()->hasPermissionTo($permissionName)) {
            return $next($request);
        }

        // Otherwise, deny access
        throw UnauthorizedException::forPermissions([$permissionName]);
    }

    /**
     * Convert a route name like 'roles.index' to permission format 'roles-list'.
     */
    protected function convertRouteToPermission(?string $routeName): ?string
    {
        if (!$routeName) {
            return null;
        }

        $map = [
            'index'   => 'list',
            'create'  => 'create',
            'store'   => 'store',
            'show'    => 'show',
            'edit'    => 'edit',
            'update'  => 'update',
            'destroy' => 'destroy',
            'view'    => 'view',
            'manage'  => 'manage',
        ];

        if (!str_contains($routeName, '.')) {
            return $routeName; // fallback
        }

        [$resource, $action] = explode('.', $routeName);

        $convertedAction = $map[$action] ?? $action;

        return "{$resource}-{$convertedAction}";
    }
}


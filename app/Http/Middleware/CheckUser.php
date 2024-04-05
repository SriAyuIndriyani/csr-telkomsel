<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $allowedRole
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $allowedRole)
    {
        $user = Auth::user();

        if ($user && $this->checkUserAllowed($user->id_role, $allowedRole)) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect('/');
        }
    }

    /**
     * Check if the user is allowed based on their role.
     *
     * @param  int  $userRole
     * @param  string|array  $allowedRole
     * @return bool
     */
    private function checkUserAllowed($userRole, $allowedRole)
    {
        if (is_array($allowedRole)) {
            return in_array($userRole, $allowedRole);
        } else {
            return $userRole == $allowedRole;
        }
    }
}

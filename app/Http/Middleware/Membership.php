<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class Membership.
 */
class Membership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param string                    $membershipType
     *
     * @return mixed
     */
    public function handle($request, Closure $next, string $membershipType)
    {
        /** @var User $user */
        $user = Auth::user();
        if (!$user->subscribed($membershipType)) {
            return redirect(route('memberships.index'));
        }

        return $next($request);
    }
}

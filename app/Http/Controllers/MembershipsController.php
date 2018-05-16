<?php

namespace App\Http\Controllers;

use App\User;
use Braintree\Subscription;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MembershipsController.
 */
class MembershipsController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('memberships.index', [
            'memberships' => config('memberships')
        ]);
    }

    /**
     * @param string  $membership
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function request(string $membership)
    {
        return view('memberships.request_payment', [
            'membership' => $membership,
        ]);
    }

    /**
     * @param Request $request
     * @param string  $membership
     *
     * @return array
     */
    public function processPayment(Request $request, string $membership)
    {
        $payload = $request->get('payload', false);
        $nonce = $payload['nonce'];

        /** @var User $user */
        $user = Auth::user();

        try {
            $user->newSubscription($membership, $membership)->create($nonce);
        } catch (\Exception $exception) {
            return ['success' => false];
        }

        return ['success' => true];
    }
}

<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class MessagingController.
 */
class MessagingController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('messaging.index');
    }
}

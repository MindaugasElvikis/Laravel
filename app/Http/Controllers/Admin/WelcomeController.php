<?php

namespace App\Http\Controllers\Admin;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class WelcomeController.
 */
class WelcomeController
{
    public function welcome(\Illuminate\Http\Request $request)
    {
        return view('welcome');
    }
}

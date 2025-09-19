<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class TestController extends Controller
{
    /**
     * Show the profile for a given user.
     */
    public function Index(): View
    {
        return view(view: "Test.page");
    }
}
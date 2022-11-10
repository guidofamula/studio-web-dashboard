<?php

namespace App\Http\Controllers\Layout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function home()
    {
        return view('landing.home');
    }
}

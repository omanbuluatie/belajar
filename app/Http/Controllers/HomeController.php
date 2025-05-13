<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function dashboard()
    {
        // dd(auth()->user()->getRoleName);

        return view('dashboard');

    }

}

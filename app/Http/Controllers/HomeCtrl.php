<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCtrl extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function program($q)
    {
        $query = $q;
        return view('frontend.program', compact('query'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCtrl extends Controller
{
    public function index()
    {
        return view('frontend.layouts.app');
    }
}

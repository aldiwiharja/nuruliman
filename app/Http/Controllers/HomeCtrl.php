<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;

class HomeCtrl extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function profile()
    {
        return view('frontend.profile');
    }

    public function program($q)
    {
        $query = $q;
        return view('frontend.program', compact('query'));
    }

    public function ekskul()
    {
        return view('frontend.ekskul');
    }

    public function pendaftaran()
    {
        $programs = Program::all();
        return view('frontend.pendaftaran', compact('programs'));
    }
}

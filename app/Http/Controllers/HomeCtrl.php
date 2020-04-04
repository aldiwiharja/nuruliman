<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Setting;

class HomeCtrl extends Controller
{
    public function index()
    {
        $banner_setiing = Setting::where('key', 'banner_setting')->first();
        $kepsek_setiing = Setting::where('key', 'kepsek_setting')->first();
        return view('frontend.home', compact('banner_setting', 'kepsek_setting'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Setting;
use App\Extrakurikuler;
use App\Teacher;

class HomeCtrl extends Controller
{
    public function index()
    {
        $banner_setting = Setting::where('key', 'banner_setting')->first();
        $kepsek_setting = Setting::where('key', 'kepsek_setting')->first();
        $ekskul_setting = Extrakurikuler::all();
        $tenaga_pendidik = Teacher::all();
        return view('frontend.home', compact('banner_setting', 'kepsek_setting', 'ekskul_setting', 'tenaga_pendidik'));
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

    public function pendaftaran_proses(Request $request)
    {
        dd($request->all());
    }
}

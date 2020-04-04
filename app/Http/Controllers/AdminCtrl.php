<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Program;
use App\Setting;

class AdminCtrl extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function login()
    {
        return view('backend.login');
    }

    public function login_proses(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email', $email)->first();
        if ($user !== null) {
            if (password_verify($password, $user->password)) {
                Auth::attempt(['email' => $email, 'password' => $password]);
                return redirect('/admin/dashboard');
            }else{
                return back()->with('msg', 'Password salah');
            }
        }else {
            return back()->with('msg', 'Akun admin salah');
        }
    }

    public function program()
    {
        $programs = Program::all();
        return view('backend.program.index', compact('programs'));
    }

    public function setting()
    {
        $banner_setting = Setting::where('key', 'banner_setting')->first();
        $kepsek_setting = Setting::where('key', 'kepsek_setting')->first();
        return view('backend.setting.index', compact('banner_setting', 'kepsek_setting'));
    }

    public function upload_banner(Request $request)
    {
        $setting = Setting::where('key', 'banner_setting')->first();
        $value = json_decode($setting->value);
        $banner = $request->file('file');
        array_push($value, $banner->store('uploads/admin/banner'));
        $setting->value = json_encode($value);
        $setting->save();
    }

    public function hapus_banner($key_blade)
    {
        $setting = Setting::where('key', 'banner_setting')->first();
        $value = json_decode($setting->value);
        $arr = [];
        foreach ($value as $key => $v) {
            if ((int)$key_blade !== $key) {
                array_push($arr, $v);
            }else{
                if (file_exists($v)) {
                    unlink($v);
                }
            }
        }
        $setting->value = json_encode($arr);
        $setting->save();
        return back();
    }

    public function update_kepsek(Request $request)
    {
        dd($request->all());
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\User;
use App\Program;
use App\Setting;
use App\Extrakurikuler;
use App\Teacher;

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

    public function program_add()
    {
        return view('backend.program.add');
    }

    public function program_add_proses(Request $request)
    {
        $program = new Program;
        $program->name = Str::upper($request->nama_program);
        $program->description = $request->desc_program;
        $program->save();
        return redirect('/admin/program');
    }

    public function program_delete($id) {
        $program = Program::where('id', $id)->first();
        $program->delete();
        return back();
    }

    public function setting()
    {
        $banner_setting = Setting::where('key', 'banner_setting')->first();
        $kepsek_setting = Setting::where('key', 'kepsek_setting')->first();
        $programs = Program::all();
        return view('backend.setting.index', compact('banner_setting', 'kepsek_setting', 'programs'));
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
        $kepsek_setting = Setting::where('key', 'kepsek_setting')->first();
        $value = json_decode($kepsek_setting->value);
        $value->nama = $request->nama;
        $value->jabatan = $request->jabatan;
        if ($request->hasFile('photo')) {
            if (file_exists($value->photo)) {
                unlink($value->photo);
            }
            $value->photo = $request->file('photo')->store('uploads/admin/kepsek');
        }
        $value->sambutan = $request->sambutan;
        $kepsek_setting->value = json_encode($value);
        $kepsek_setting->save();
        return back();
    }

    public function program_upload(Request $request)
    {
        $program = Program::where('id', $request->program_id)->first();
        if ($request->hasFile('banner'.$request->program_id)) {
            if (file_exists($program->banner)) {
                unlink($program->banner);
            }
            $program->banner = $request->file('banner'.$request->program_id)->store('uploads/admin/program_banner');
        }
        $program->save();
        return back();
    }

    public function ekskul()
    {
        $ekskuls = Extrakurikuler::all();
        return view('backend.ekskul.index', compact('ekskuls'));
    }

    public function ekskul_add()
    {
        return view('backend.ekskul.add');
    }

    public function ekskul_add_proses(Request $request)
    {
        $ekskul = new Extrakurikuler;
        if ($request->hasFile('galeri')) {
            $arr = [];
            foreach ($request->galeri as $key => $g) {
                $path = $g->store('uploads/admin/ekskul');
                array_push($arr, $path);
            }
        }
        $ekskul->name = $request->nama_ekskul;
        $ekskul->galeri = json_encode($arr);
        $ekskul->save();
        return redirect('/admin/extrakurikuler');
    }

    public function teacher()
    {
        $teachers = Teacher::all();
        return view('backend.teacher.index', compact('teachers'));
    }

    public function teacher_add()
    {
        return view('backend.teacher.add');
    }

    public function teacher_add_proses(Request $request)
    {
        $teacher = new Teacher;
        $teacher->name = $request->nama_teacher;
        $teacher->avatar = $request->file('photo')->store('uploads/admin/tenaga_pengajar');
        $teacher->matpel = $request->matpel;
        $teacher->save();
        return redirect('/admin/teacher');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}

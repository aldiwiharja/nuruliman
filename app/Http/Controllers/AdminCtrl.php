<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use App\User;
use App\Student;
use App\Program;
use App\Setting;
use App\Extrakurikuler;
use App\Teacher;
use App\Payment;
use App\Cost;
use App\MonthlyFee;
use App\News;

class AdminCtrl extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function siswa(Request $request)
    {
        $students = Student::all();
        return view('backend.siswa.index', compact('students'));
    }

    public function payment(Request $request)
    {
        $payments = Payment::all();
        return view('backend.payment.index', compact('payments'));
    }

    public function payment_approve(Request $request, $id)
    {
        $payment = Payment::where('id', decrypt($id))->first();
        if ($payment !== null) {
            $payment->status = 1;
            $payment->save();
            return back()->with('msg', $payment->code.' Telah di approve');
        }
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
            if ($user->role === "admin") {
                if (password_verify($password, $user->password)) {
                    Auth::attempt(['email' => $email, 'password' => $password]);
                    return redirect('/admin/dashboard');
                }else{
                    return back()->with('msg', 'Password salah');
                }
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
        $program->kategori = $request->kategori_program;
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
        $profile_setting = Setting::where('key', 'profile_setting')->first();
        $programs = Program::all();
        return view('backend.setting.index', compact('banner_setting', 'kepsek_setting', 'programs', 'profile_setting'));
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

    public function profile_update(Request $request)
    {
        $profile_setting = Setting::where('key', 'profile_setting')->first();
        $value = json_decode($profile_setting->value);
        if ($request->hasFile('profile_bg')) {
            if (file_exists($value->profile_bg)) {
                unlink($value->profile_bg);
            }
            $value->profile_bg = $request->file('profile_bg')->store('uploads/admin/profile');
        }
        $value->profile_sejarah = $request->profile_sejarah;
        $value->profile_visi_misi = $request->profile_visi_misi;
        $profile_setting->value = json_encode($value);
        $profile_setting->save();
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

    public function ekskul_detail(Request $request, $id)
    {
        $ekskul = Extrakurikuler::where('id', decrypt($id))->first();
        return view('backend.ekskul.detail', compact('ekskul'));
    }

    public function ekskul_delete(Request $request, $id)
    {
        $ekskul = Extrakurikuler::where('id', decrypt($id))->first();
        $ekskul->delete();
        return back();
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

    public function teacher_delete(Request $request, $id)
    {
        $teacher = Teacher::where('id', $id)->first();
        if (file_exists($teacher->avatar)) {
            unlink($teacher->avatar);
        }
        $teacher->delete();
        return back();
    }

    public function biaya(Request $request)
    {
        $costs = Cost::all();
        return view('backend.biaya.index', compact('costs'));
    }

    public function biaya_add(Request $request)
    {
        return view('backend.biaya.add');
    }

    public function biaya_add_proses(Request $request)
    {
        $cost = new Cost;
        $cost->name = $request->nama_biaya;
        $cost->price = $request->harga_biaya;
        $cost->save();
        return redirect('/admin/biaya')->with('msg', 'Biaya telah ditambahkan');
    }

    public function biaya_edit(Request $request, $id)
    {
        $cost = Cost::where('id', decrypt($id))->first();
        return view('backend.biaya.edit', compact('cost'));
    }

    public function biaya_edit_proses(Request $request)
    {
        $cost = Cost::where('id', $request->id_biaya)->first();
        $cost->name = $request->nama_biaya;
        $cost->price = $request->harga_biaya;
        $cost->save();
        return redirect('/admin/biaya')->with('msg', 'Biaya telah diedit');
    }

    public function biaya_hapus(Request $request, $id)
    {
        $cost = Cost::where('id', decrypt($id))->first();
        $cost->delete();
        return redirect('/admin/biaya')->with('msg', 'Biaya telah dihapus');
    }

    public function biaya_bulanan(Request $request)
    {
        $monthly_fees = MonthlyFee::all();
        return view('backend.biaya_bulanan.index', compact('monthly_fees'));
    }


    public function biaya_bulanan_attr(Request $request)
    {
        $countType = [0,1];
        foreach ($countType as $key => $cT) {
            $monthly_fee = new MonthlyFee;
            $monthly_fee->attribute = Str::upper($request->attr);
            $monthly_fee->type = $key;
            $monthly_fee->save();
        }
        return back()->with('msg', 'Attribute telah ditambahkan');
    }

    public function admin_update_price0(Request $request)
    {
        $monthly_fee = MonthlyFee::where(['type'=>0,'id'=> $request->id])->first();
        $monthly_fee->price = $request->price;
        if ($monthly_fee->save()) {
            return 1;
        }
    }

    public function admin_update_price1(Request $request)
    {
        $monthly_fee = MonthlyFee::where(['type'=>1,'id'=> $request->id])->first();
        $monthly_fee->price = $request->price;
        if ($monthly_fee->save()) {
            return 1;
        }
    }

    public function berita(Request $request)
    {
        $news = News::all();
        return view('backend.berita.index', compact('news'));
    }

    public function berita_add(Request $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->desc = $request->desc;
        $news->image = $request->file('image')->store('uploads/admin/berita');
        $news->save();
        return back()->with('msg', 'Berita telah di tambahkan');
    }

    public function berita_delete(Request $request, $id)
    {
        $news = News::where('id', decrypt($id))->first();
        if (file_exists($news->image)) {
            unlink($news->image);
        }
        $news->delete();
        return back()->with('msg', 'Berita telah di dihapus');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function whatsapp(Request $request)
    {
        $whatsapp_setting = Setting::where('key', 'whatsapp_setting')->first();
        return view('backend.whatsapp.index', compact('whatsapp_setting'));
    }

    public function store_device_token(Request $request)
    {
        $user = User::where('role', 'admin')->first();
        $user->device_token = $request->device_token;
        $user->save();
        return "ok";
    }
}

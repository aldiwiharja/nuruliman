<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Hash;
use Auth;
use Storage;
use App\Program;
use App\Setting;
use App\Extrakurikuler;
use App\Teacher;
use App\Student;
use App\Payment;
use App\User;
use App\News;
use App\Cost;
use App\MonthlyFee;

class HomeCtrl extends Controller
{
    public function index()
    {
        $banner_setting = Setting::where('key', 'banner_setting')->first();
        $kepsek_setting = Setting::where('key', 'kepsek_setting')->first();
        $ekskul_setting = Extrakurikuler::all();
        $tenaga_pendidik = Teacher::all();
        $berita = News::all();
        return view('frontend.home', compact('banner_setting', 'kepsek_setting', 'ekskul_setting', 'tenaga_pendidik', 'berita'));
    }

    public function siswa_masuk(Request $request)
    {
        $email = $request->email_siswa;
        $password = $request->pass_siswa;
        $user = User::where('email', $email)->first();
        if ($user !== null) {
            if ($user->role !== "siswa") {
                return back()->with('anda_tdk_berhak', 'Anda tidak berhak');
            }else {
                if (password_verify($password, $user->password)) {
                    Auth::attempt(['email' => $email, 'password' => $password]);
                    Auth::guard()->login($user);
                    return back()->with('masuk', 'Anda Berhasil Masuk');
                }else{
                    return back()->with('pass_salah', 'Password salah');
                }
            }
        }else {
            return back()->with('user_tdk_ada', 'User tidak ada');
        }
    }

    public function siswa_keluar(Request $request)
    {
        if (Auth::user()->role == "siswa") {
            Auth::logout();
            return redirect('/');
        }
    }

    public function profile()
    {
        $profile_setting = Setting::where('key', 'profile_setting')->first();
        return view('frontend.profile', compact('profile_setting'));
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
        $costs = Cost::all();
        $monthly_fees = MonthlyFee::all();
        return view('frontend.pendaftaran', compact('programs', 'costs', 'monthly_fees'));
    }

    public function pendaftaran_proses(Request $request)
    {   
        $rules = [
            'tgl_masuk'=> 'required|date',		
            'program'=> 'required',		
            'nama_siswa'=> 'required',
            'jenis_kelamin'	=> 'required',
            'tmpt_lahir_siswa'=> 'required',
            'tgl_lahir_siswa'=> 'required|date',
            'agama'=> 'required',
            'no_hp'=> 'required',			
            'asal_sekolah'=> 'required',	
            'kampung_sekolah'=> 'required',
            'desa_sekolah'=> 'required',	
            'kec_sekolah'=> 'required',	
            'kota_sekolah'=> 'required',	
            'prov_sekolah'=> 'required',	
            'nama_ayah'=> 'required',		
            'tmpt_lahir_ayah'=> 'required',
            'tgl_lahir_ayah'=> 'required|date',
            'no_hp_ayah'=> 'required',	
            'nama_ibu'=> 'required',		
            'tmpt_lahir_ibu'=> 'required',
            'tgl_lahir_ibu'=> 'required|date',	
            'no_hp_ibu'=> 'required',		
            'no_kk'=> 'required',			
            'kampung_org_tua'=> 'required',
            'rt_rw_org_tua'=> 'required',	
            'desa_org_tua'=> 'required',	
            'kec_org_tua'=> 'required',	
            'kota_org_tua'=> 'required',	
            'prov_org_tua'=> 'required',	
            'nama_sdr'=> 'required',		
            'status_sdr'=> 'required',	
            'no_hp_sdr'=> 'required',		
            'alamat_sdr'=> 'required',
            'email'=>'unique:users',	
        ];
        $customMsg = [
            'required' => '* Kolom :attribute tidak boleh kosong.',
            'date' => '* Kolom :attribute harus format tanggal.',
        ];

        $this->validate($request, $rules, $customMsg);

        $student = new Student;
        if (isset($request->pindah_status)) {
            $student->pindah_status = 1;
            $student->pindah_tingkat = $request->pindah_tingkat;
            $student->pindah_program = $request->pindah_program;
        }else{
            $student->pindah_status = 0;
        }
        $student->tgl_masuk = $request->tgl_masuk;
        $student->program = $request->program;
        $student->nama_siswa = $request->nama_siswa;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->nisn_siswa = $request->nisn_siswa;
        $student->tmpt_lahir_siswa = $request->tmpt_lahir_siswa;
        $student->tgl_lahir_siswa = $request->tgl_lahir_siswa;
        $student->agama = $request->agama;
        $student->tinggi_badan = $request->tinggi_badan;
        $student->berat_badan = $request->berat_badan;
        $student->no_ijazah = $request->no_ijazah;
        $student->no_skhun = $request->no_skhun;
        $student->no_hp = $request->no_hp;
        $student->asal_sekolah = $request->asal_sekolah;
        $student->niss = $request->niss;
        $student->kampung_sekolah = $request->kampung_sekolah;
        $student->desa_sekolah = explode("-",$request->desa_sekolah)[1];
        $student->kec_sekolah = explode("-",$request->kec_sekolah)[1];
        $student->kota_sekolah = explode("-",$request->kota_sekolah)[1];
        $student->prov_sekolah = explode("-",$request->prov_sekolah)[1];
        $student->nama_ayah = $request->nama_ayah;
        $student->tmpt_lahir_ayah = $request->tmpt_lahir_ayah;
        $student->tgl_lahir_ayah = $request->tgl_lahir_ayah;
        $student->no_hp_ayah = $request->no_hp_ayah;
        $student->nama_ibu = $request->nama_ibu;
        $student->tmpt_lahir_ibu = $request->tmpt_lahir_ibu;
        $student->tgl_lahir_ibu = $request->tgl_lahir_ibu;
        $student->no_hp_ibu = $request->no_hp_ibu;
        $student->no_kk = $request->no_kk;
        $student->kampung_org_tua = $request->kampung_org_tua;
        $student->rt_rw_org_tua = $request->rt_rw_org_tua;
        $student->desa_org_tua = explode("-",$request->desa_org_tua)[1];
        $student->kec_org_tua = explode("-",$request->kec_org_tua)[1];
        $student->kota_org_tua = explode("-",$request->kota_org_tua)[1];
        $student->prov_org_tua = explode("-",$request->prov_org_tua)[1];
        $student->nama_sdr = $request->nama_sdr;
        $student->status_sdr = $request->status_sdr;
        $student->no_hp_sdr = $request->no_hp_sdr;
        $student->alamat_sdr = $request->alamat_sdr;

        $biaya_pendaftaran = Cost::where('name', 'PENDAFTARAN')->first()->price;
        if ($student->save()) {
            $payment = new Payment;
            $payment->student_id = $student->id;
            $payment->code = 'INV-'.time();
            $payment->total = $biaya_pendaftaran;
            $payment->status = 0;
            $payment->save();
            $user = new User;
            $user->name = $student->id.'-'.$student->nama_siswa;
            $user->email = substr($student->nama_siswa, 0,3).'@email.com';
            $user->role = "siswa";
            $user->password = Hash::make('123456');
            $user->save();
            Storage::put('/info_login/'.substr($student->nama_siswa, 0,3).'.txt', 'email: '.substr($student->nama_siswa, 0,3).'@email.com pass:123456');
            if ($user->role === "siswa") {
                Auth::attempt(['email' => $user->email, 'password' => $user->password]);
                Auth::guard()->login($user);
            }
            return redirect('generate-formulir')->with('msg', 'Silahakan melakukan pembayaran');
        }
    }

    public function generate_formulir(Request $request)
    {
        $student_id = explode('-',Auth::user()->name)[0];
        $student = Student::where('id', $student_id)->first();
        return view('frontend.generate_formulir', compact('student'));
    }

    public function generate_pdf(Request $request)
    {
        $student_id = explode('-',Auth::user()->name)[0];
        $student = Student::where('id', $student_id)->first();
        $pdf = PDF::loadView('frontend.generate_pdf', compact('student'));
        $pdf->setPaper('legal', 'potrait');
        return $pdf->download('formulir-'.time().'.pdf');
    }

    public function persyaratan(Request $request)
    {
        return view('frontend.persyaratan');
    }

    public function generate_persyaratan(Request $request)
    {
        $pdf = PDF::loadView('frontend.generate_persyaratan');
        $pdf->setPaper('legal', 'potrait');
        return $pdf->download('persyaratan.pdf');
    }

    public function rincian_biaya(Request $request)
    {
        $costs = Cost::all();
        $monthly_fees = MonthlyFee::all();
        return view('frontend.rincian_biaya', compact('costs', 'monthly_fees'));
    }

    public function generate_rincian_biaya(Request $request)
    {
        $costs = Cost::all();
        $monthly_fees = MonthlyFee::all();
        $pdf = PDF::loadView('frontend.generate_rincian_biaya', compact('costs', 'monthly_fees'));
        $pdf->setPaper('legal', 'potrait');
        return $pdf->download('rincian_biaya.pdf');
    }

    public function pembayaran(Request $request)
    {
        $student_id = explode('-',Auth::user()->name)[0];
        $payment = Payment::where('student_id', $student_id)->first();
        return view('frontend.pembayaran', compact('payment'));
    }

    public function konfirmasi_pembayaran(Request $request)
    {
        $payment = Payment::where('student_id', $request->student_id)->first();
        if ($payment !== null) {
            $payment->status = 2; // waiting approve
            $payment->bukti = $request->file('bukti_byr')->store('uploads/admin/bukti_transfer');
            $payment->save();
            return redirect('sukses-pembayaran')->with('msg', 'Terimakasih sudah melakukan pembayaran');
        }
    }

    public function sukses_pembayaran(Request $request)
    {
        $student_id = explode('-',Auth::user()->name)[0];
        $payment = Payment::where('student_id', $student_id)->first();
        return view('frontend.sukses_pembayaran', compact('payment'));
    }

}

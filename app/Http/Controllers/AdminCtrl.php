<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Str;
use PDF;
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
use App\Document;

class AdminCtrl extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }

    public function mark_as_read(Request $request, $id)
    {
        $user = Auth::user();
        foreach ($user->unreadNotifications as $notif) {
            if ($notif->id === $id) {
                $notif->markAsRead();
            }
        }
        return back();
    }

    public function siswa(Request $request)
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('backend.siswa.index', compact('students'));
    }

    public function siswa_edit(Request $request, $id)
    {
        $student = Student::where('id', decrypt($id))->first();
        $programs = Program::all();
        return view('backend.siswa.edit', compact('student', 'programs'));
    }

    public function siswa_detail(Request $request, $id)
    {
        $student = Student::where('id', decrypt($id))->first();
        $programs = Program::all();
        return view('backend.siswa.detail', compact('student', 'programs'));
    }

    public function siswa_document(Request $request, $id)
    {
        $student_id = $id;
        $document = Document::where('student_id', $student_id)->first();
        return view('backend.siswa.document', compact('document'));
    }

    public function admin_generate_pdf(Request $request, $id)
    {
        $student = Student::where('id', decrypt($id))->first();
        $pdf = PDF::loadView('frontend.generate_pdf', compact('student'));
        $pdf->setPaper('legal', 'potrait');
        return $pdf->download('formulir-'.time().'.pdf');
    }

    public function siswa_edit_proses(Request $request)
    {
        $student = Student::where('id', $request->id_siswa)->first();
        if ($student !== null) {
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
            $student->desa_sekolah = $request->desa_sekolah;
            $student->kec_sekolah = $request->kec_sekolah;
            $student->kota_sekolah = $request->kota_sekolah;
            $student->prov_sekolah = $request->prov_sekolah;
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
            $student->desa_org_tua = $request->desa_org_tua;
            $student->kec_org_tua = $request->kec_org_tua;
            $student->kota_org_tua = $request->kota_org_tua;
            $student->prov_org_tua = $request->prov_org_tua;
            $student->nama_sdr = $request->nama_sdr;
            $student->status_sdr = $request->status_sdr;
            $student->no_hp_sdr = $request->no_hp_sdr;
            $student->alamat_sdr = $request->alamat_sdr;
            $student->save();
        }
        return redirect('admin/siswa')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diupdate","success")</script>');
    }

    public function siswa_delete(Request $request, $id)
    {
        
        $student = Student::where('id', decrypt($id))->first();
        $pdf = public_path().'/pdf/formulir_'.$student->id.'.pdf';
        if (file_exists($pdf)) {
            unlink($pdf);
        }
        $payment = Payment::where('student_id', $student->id)->first();
        $doc = Document::where('student_id', $student->id)->first();
        if ($doc !== null) {
            if (file_exists($doc->ktp_orang_tua)) {
                unlink($doc->ktp_orang_tua);
            }
            if (file_exists($doc->kk)) {
                unlink($doc->kk);
            }
            if (file_exists($doc->ijazah)) {
                unlink($doc->ijazah);
            }
            if (file_exists($doc->surat_kelulusan)) {
                unlink($doc->surat_kelulusan);
            }
            if (file_exists($doc->skhun)) {
                unlink($doc->skhun);
            }
            if (file_exists($payment->bukti)) {
                unlink($payment->bukti);
            }
            $doc->delete();
        }
        $user = User::where('role', 'siswa')->get();
        foreach ($user as $key => $u) {
            $student_id = explode('-',$u->name);
            if ((int)$student_id[0] == $student->id) {
                $u->delete();
            }
        }
        $payment->delete();
        $student->delete();
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
    }

    public function payment(Request $request)
    {
        $payments = Payment::orderBy('id', 'desc')->get();
        return view('backend.payment.index', compact('payments'));
    }

    public function payment_approve(Request $request, $id)
    {
        $payment = Payment::where('id', decrypt($id))->first();
        if ($payment !== null) {
            $payment->status = 1;
            $payment->save();
            return back()->with('msg', '<script>Swal.fire("Berhasil","Pembayaran telah di approve","success")</script>');
        }
    }

    public function payment_invoice(Request $request, $id)
    {
        $payment = Payment::where('id', decrypt($id))->first();
        return view('backend.payment.invoice', compact('payment'));
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
        return redirect('/admin/program')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil ditambahkan","success")</script>');
    }

    public function program_edit(Request $request, $id)
    {
        $program = Program::where('id', decrypt($id))->first();
        return view('backend.program.edit', compact('program'));
    }

    public function program_edit_proses(Request $request)
    {   
        $program = Program::where('id', $request->id)->first();
        $program->name = Str::upper($request->nama_program);
        $program->kategori = $request->kategori_program;
        $program->description = $request->desc_program;
        $program->save();
        return redirect('/admin/program')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diubah","success")</script>');
    }

    public function program_delete($id) {
        $program = Program::where('id', $id)->first();
        if (file_exists($program->banner)) {
            unlink($program->banner);
        }
        $program->delete();
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
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
        return "ok";
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
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diupdate","success")</script>');
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
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diupdate","success")</script>');
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
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diupdate","success")</script>');
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
        return redirect('/admin/extrakurikuler')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil ditambahkan","success")</script>');
    }

    public function ekskul_detail(Request $request, $id)
    {
        $ekskul = Extrakurikuler::where('id', decrypt($id))->first();
        return view('backend.ekskul.detail', compact('ekskul'));
    }

    public function ekskul_delete(Request $request, $id)
    {
        $ekskul = Extrakurikuler::where('id', decrypt($id))->first();
        $galeri = json_decode($ekskul->galeri);
        foreach ($galeri as $key => $g) {
            if (file_exists($g)) {
                unlink($g);
            }
        }
        $ekskul->delete();
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
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
        return redirect('/admin/teacher')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil ditambahkan","success")</script>');
    }

    public function teacher_edit(Request $request, $id)
    {
        $teacher = Teacher::where('id', decrypt($id))->first();
        return view('backend.teacher.edit', compact('teacher'));
    }

    public function teacher_edit_proses(Request $request)
    {
        $teacher = Teacher::where('id', $request->id)->first();
        if ($request->hasFile('photo')) {
            if (file_exists($teacher->avatar)) {
                unlink($teacher->avatar);
            }
        }
        $teacher->avatar = $request->file('photo')->store('uploads/admin/tenaga_pengajar');
        $teacher->name = $request->nama_teacher;
        $teacher->matpel = $request->matpel;
        $teacher->save();
        return redirect('/admin/teacher')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diubah","success")</script>');
    }

    public function teacher_delete(Request $request, $id)
    {
        $teacher = Teacher::where('id', $id)->first();
        if (file_exists($teacher->avatar)) {
            unlink($teacher->avatar);
        }
        $teacher->delete();
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
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
        return redirect('/admin/biaya')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil ditambahkan","success")</script>');
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
        return redirect('/admin/biaya')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diubah","success")</script>');
    }

    public function biaya_hapus(Request $request, $id)
    {
        $cost = Cost::where('id', decrypt($id))->first();
        $cost->delete();
        return redirect('/admin/biaya')->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
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
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil ditambahkan","success")</script>');
    }

    public function biaya_bulanan_hapus_attr(Request $request, $attr)
    {
        $mf = MonthlyFee::where('attribute', $attr)->get();
        foreach ($mf as $key => $mf) {
            $mf->delete();
        }
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
    }

    public function admin_update_price(Request $request)
    {
        if ($request->type0 !== null) {
            $mf = MonthlyFee::where('type',0)->get();
            foreach ($mf as $key => $mf) {
                $mf->price = $request->type0[$key];
                $mf->save();
            }
        }

        if ($request->type1 !== null) {
            $mf = MonthlyFee::where('type',1)->get();
            foreach ($mf as $key => $mf) {
                $mf->price = $request->type1[$key];
                $mf->save();
            }
        }
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diubah","success")</script>');
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
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil ditambahkan","success")</script>');
    }

    public function berita_delete(Request $request, $id)
    {
        $news = News::where('id', decrypt($id))->first();
        if (file_exists($news->image)) {
            unlink($news->image);
        }
        $news->delete();
        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil dihapus","success")</script>');
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

    public function whatsapp_update(Request $request)
    {
        $whatsapp_setting = Setting::where('key', 'whatsapp_setting')->first();
        $value = json_decode($whatsapp_setting->value);
        $value[0] = $request->contact[0];
        $value[1] = $request->contact[1];
        $value[2] = $request->contact[2];

        $whatsapp_setting->value = json_encode($value);
        $whatsapp_setting->save();

        return back()->with('msg', '<script>Swal.fire("Berhasil","Data Berhasil diubah","success")</script>');
    }

    public function store_device_token(Request $request)
    {
        $user = User::where('role', 'admin')->first();
        $user->device_token = $request->device_token;
        $user->save();
        return "ok";
    }

    public function admin_upload_ktp(Request $request)
    {
        $current_docs = Document::where('id', $request->document_id)->first();
        $student_id = $current_docs->student_id;
        if ($current_docs !== null) {
            if (file_exists($current_docs->ktp_orang_tua)) {
                unlink($current_docs->ktp_orang_tua);
            }
            $current_docs->ktp_orang_tua = $request->file('file')->storeAs('uploads/document/ktp','ktp_siswa'.$student_id.'.jpg');
            $current_docs->save();
        }else {
            $docs = new Document;
            $docs->student_id = $request->document_id;
            $docs->ktp_orang_tua = $request->file('file')->storeAs('uploads/document/ktp','ktp_siswa'.$student_id.'.jpg');
            $docs->save();
        }
        return "ok";
    }

    public function admin_upload_kk(Request $request)
    {
        $current_docs = Document::where('id', $request->document_id)->first();
        $student_id = $current_docs->student_id;
        if ($current_docs !== null) {
            if (file_exists($current_docs->kk)) {
                unlink($current_docs->kk);
            }
            $current_docs->kk = $request->file('file')->storeAs('uploads/document/kk','kk_siswa'.$student_id.'.jpg');
            $current_docs->save();
        }else {
            $docs = new Document;
            $docs->student_id = $request->document_id;
            $docs->kk = $request->file('file')->storeAs('uploads/document/kk','kk_siswa'.$student_id.'.jpg');
            $docs->save();
        }
        return "ok";
    }

    public function admin_upload_ijazah(Request $request)
    {
        $current_docs = Document::where('id', $request->document_id)->first();
        $student_id = $current_docs->student_id;
        if ($current_docs !== null) {
            if (file_exists($current_docs->ijazah)) {
                unlink($current_docs->ijazah);
            }
            $current_docs->ijazah = $request->file('file')->storeAs('uploads/document/ijazah','ijazah_siswa'.$student_id.'.jpg');
            $current_docs->save();
        }else {
            $docs = new Document;
            $docs->student_id = $request->document_id;
            $docs->ijazah = $request->file('file')->storeAs('uploads/document/ijazah','ijazah_siswa'.$student_id.'.jpg');
            $docs->save();
        }
        return "ok";
    }

    public function admin_upload_sk(Request $request)
    {
        $current_docs = Document::where('id', $request->document_id)->first();
        $student_id = $current_docs->student_id;
        if ($current_docs !== null) {
            if (file_exists($current_docs->surat_kelulusan)) {
                unlink($current_docs->surat_kelulusan);
            }
            $current_docs->surat_kelulusan = $request->file('file')->storeAs('uploads/document/surat_kelulusan','sk_siswa'.$student_id.'.jpg');
            $current_docs->save();
        }else {
            $docs = new Document;
            $docs->student_id = $request->document_id;
            $docs->surat_kelulusan = $request->file('file')->storeAs('uploads/document/surat_kelulusan','sk_siswa'.$student_id.'.jpg');
            $docs->save();
        }
        return "ok";
    }
}

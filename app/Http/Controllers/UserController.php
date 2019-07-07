<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Data;
use App\Puskesmas;

class UserController extends Controller
{
    public function where($email){
    if(User::where('email', $email)->exists()){
        return true;
    }else{
        return false;
    }
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if(!Auth::check()){
            return redirect('login')->with('alert','Kamu harus Login terlebih dahulu');
        }
        else{
            if(Auth::user()->vertified == 'ya' || Auth::user()->vertified == 'tidak'){
                if(Auth::user()->pos == 'super'){
                    // $data = User::all()->where('pos', 'admin');
                    $data = DB::table('users')
                        ->where('pos', 'admin')
                        ->join('puskesmas', 'puskesmas.id', '=', 'users.puskesmas')
                        ->select('users.id', 'users.nama', 'users.email', 'puskesmas.nama_puskesmas', 'users.vertified')
                        ->get();
                    return view('superadmin2.dashboard', compact('data'));
                }
                else if(Auth::user()->pos == 'admin'){
                    $id = Auth::user()->puskesmas;

                    $data = DB::table('data')
                        ->where('data.nama_puskesmas', Auth::user()->puskesmas)
                        ->join('program', 'program.id','=', 'data.nama_program')
                        ->select('data.nama_program', 'program.nama_program as program')
                        ->distinct()
                        ->get();
                    return view('superadmin.dashboard2', compact('data', 'id'));
                }
                else{
                    return view('puskesmas.index');
                }
            }
            else{
                Auth()->logout();
                return redirect('login')->with('alert', 'Verifikasi E-mail anda dulu');
            } 
        }
    }

    public function datauser(){
        if($this->checkakun() == true){
            $data = DB::table('users')
                ->where('pos', 'admin')
                ->join('puskesmas', 'puskesmas.id', '=', 'users.puskesmas')
                ->select('users.id', 'users.nama', 'users.email', 'puskesmas.nama_puskesmas', 'users.vertified')
                ->get();
            return view('superadmin2.datauser', compact('data'));
        }
        else{
            return redirect('dashboard');
        }
    }

    public function checkakun(){
        if(!Auth::check()){
            return false;
        }
        else{
            if(Auth::user()->vertified == 'ya'){
                if(Auth::user()->pos == 'super'){
                    return true;
                }
                else if(Auth::user()->pos == 'admin'){
                    return false;
                }
                else{
                    return false;
                }
            }else{
                Auth()->logout();
                return false;
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->checkakun() == true){
            $puskesmas = Puskesmas::all();
            return view('superadmin2.tambahUser', compact('puskesmas'));
        }
        else{
            return redirect('dashboard');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->checkakun() == true){
            if($this->where($request->get('email')) == true){
                return redirect('dashboard')->with('alert-danger', 'Email sudah terdaftar');
            }
            else{
                $validatedData = $request->validate([
                    'nama' => 'required|max:255',
                    'email' => 'unique:users|email',
                    'password' => 'required|confirmed|max:255|min:4',
                ]);
                $token = md5(uniqid(rand(), true));
                if($this->sendEmailVerification($request->email, $token, $request->nama) == true){
                    $user= new User();
                    $user->nama=$request->get('nama');
                    $user->email=$request->get('email');
                    $user->puskesmas=$request->get('puskesmas');
                    $user->password = Hash::make($request->get('password'));
                    $user->pos=$request->get('pos');
                    $user->token = $token;
                    $user->vertified = 'tidak';
                    $user->remember_token = 'no';
                    $user->save();
                    return redirect('dashboard')->with('alert-success','Data Berhasil di Masukkan');
                }
                else{
                    return redirect('dashboard')->with('alert-danger','Email gagal dikirim');
                }
                
            }
            
        }
        else{
            return redirect('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->checkakun() == true){
            $users = User::findOrFail($id);
            $puskesmas = Puskesmas::all();
            return view('superadmin2.editdatauser', compact('users', 'id', 'puskesmas'));
        }
        else{
            return redirect('dashboard');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($this->checkakun() == true){
            $user = User::findOrFail($id);
            if($request->email == $user->email){
                if($request->password == '0000000000'){
                    $validatedData = $request->validate([
                        'nama' => 'required|max:255',
                    ]);
                    $user->nama = $request->get('nama');
                    $user->puskesmas = $request->get('puskesmas');
                    $user->save();
                    return redirect('dashboard')->with('alert-success','Data Berhasil di Perbaharui');
                }
                else{
                    $validatedData = $request->validate([
                        'nama' => 'required|max:255',
                        'password' => 'required|confirmed|max:255|min:4',
                    ]);
                    $user->nama = $request->get('nama');
                    $user->puskesmas = $request->get('puskesmas');
                    $user->password = Hash::make($request->get('password'));
                    $user->save();
                    return redirect('dashboard')->with('alert-success','Data Berhasil di Perbaharui');
                }
            }
            else{
                if($request->password == '0000000000'){
                    $validatedData = $request->validate([
                        'nama' => 'required|max:255',
                        'email' => 'unique:users|email',
                    ]);
                    if($this->sendEmailVerification($request->email, $user->token, $request->nama) == true){
                        $user->nama = $request->get('nama');
                        $user->email = $request->get('email');
                        $user->puskesmas = $request->get('puskesmas');
                        $user->save();
                        return redirect('dashboard')->with('alert-success','Data Berhasil di Perbaharui');
                    }
                    else{
                        return redirect('dashboard')->with('alert-danger','Email gagal dikirim');
                    }
                    
                }
                else{
                    $validatedData = $request->validate([
                        'nama' => 'required|max:255',
                        'email' => 'unique:users|email',
                        'password' => 'required|confirmed|max:255|min:4',
                    ]);
                    if($this->sendEmailVerification($request->email, $user->token, $request->nama) == true){
                        $user->nama = $request->get('nama');
                        $user->email = $request->get('email');
                        $user->puskesmas = $request->get('puskesmas');
                        $user->password = Hash::make($request->get('password'));
                        $user->save();
                        return redirect('dashboard')->with('alert-success','Data Berhasil di Perbaharui');
                    }
                    else{
                        return redirect('dashboard')->with('alert-danger','Email gagal dikirim');
                    }
                    
                }
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($this->checkakun() == true){
            $user = User::FindOrFail($id);
            $user->delete();
            return redirect('dashboard')->with('alert-success', 'Data Berhasil di Hapus');
        }
        else{
            return redirect('dashboard');
        }
    }

    public function sendEmailVerification($email, $token, $nama){
        $email_encode = base64_encode($email);
        $nama = $nama;
        $to = $email;
        $subject = 'Akun Verifikasi Form Evaluasi Program';
        $message = "
            <head>
              <title>No-reply.formevaluasiprogram</title>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
              <meta content='width=device-width, initial-scale=1.0' name='viewport'>
          </head>
          <body>
            <div style='background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:15px;font-family:Helvetica Neue , Arial, sans-serif;text-align:left;'>
              <center>
                <table style='width:70%;text-align:center'>
                  <tbody>
                    <tr>
                      <td style='padding:0 0 10px 0;border-bottom:1px solid #e9edee;'>
                        <a href='https://127.0.0.1:8000/' style='display:block; margin:0 auto;' target='_blank'>
                          <img src='https://i.ibb.co/K9DwRhD/fep-crop.jpg' width='60%' height='13%' alt='fep logo' style='border: 0px;'>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:10px 0 0 0;'>
                        <p style='color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;'>Hi $nama, </p>
                        <p style='margin:0 10px 10px 10px;padding:0;'>Kami hanya memastikan bahwa email anda benar.</p>
                        <p style='margin:0 16% 10% 16%;padding:0;'>jika email ini benar anda, silahkan tekan tombol di bawah ini untuk mengkonfirmasi alamat email anda. Jika anda merasa tidak mendaftarkan email anda pada aplikasi ini, tolong abaikan email.</p>
                        <p>
                          <a style='display:inline-block;text-decoration:none;padding:15px 20px;background-color:#2baaed;border:1px solid #2baaed;border-radius:3px;color:#FFF;font-weight:bold;' href='http://127.0.0.1:8000/verification/$email_encode/$token' target='_blank'>Konfirmasi email</a>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:2% 0;'>
                        <p style='color:#1d2227;font-size:22px;font-weight:200;'>Terima kasih</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </center>
            </div>
          </body>";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: no-reply@formevaluasiprogram.com' . "\r\n";
        // Mail it
        if(mail($to, $subject, $message, $headers)){
            return true;
        }else{
            return false;
        }
    }

    public function sendEmailVerification2($email, $token, $nama){
        $email_encode = base64_encode($email);
        $nama = $nama;
        $to = $email;
        $subject = 'Akun Verifikasi Form Evaluasi Program';
        $message = "
            <head>
              <title>No-reply.formevaluasiprogram</title>
              <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
              <meta content='width=device-width, initial-scale=1.0' name='viewport'>
          </head>
          <body>
            <div style='background-color:#fff;margin:0 auto 0 auto;padding:30px 0 30px 0;color:#4f565d;font-size:13px;line-height:15px;font-family:Helvetica Neue , Arial, sans-serif;text-align:left;'>
              <center>
                <table style='width:70%;text-align:center'>
                  <tbody>
                    <tr>
                      <td style='padding:0 0 10px 0;border-bottom:1px solid #e9edee;'>
                        <a href='https://127.0.0.1:8000/' style='display:block; margin:0 auto;' target='_blank'>
                          <img src='https://i.ibb.co/K9DwRhD/fep-crop.jpg' width='60%' height='13%' alt='fep logo' style='border: 0px;'>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:10px 0 0 0;'>
                        <p style='color:#1d2227;line-height:28px;font-size:22px;margin:12px 10px 20px 10px;font-weight:400;'>Hi $nama, </p>
                        <p style='margin:0 10px 10px 10px;padding:0;'>Kami hanya memastikan bahwa email anda benar.</p>
                        <p style='margin:0 16% 10% 16%;padding:0;'>jika email ini benar anda, silahkan tekan tombol di bawah ini untuk mengkonfirmasi alamat email anda. Jika anda merasa tidak mendaftarkan email anda pada aplikasi ini, tolong abaikan email.</p>
                        <p>
                          <a style='display:inline-block;text-decoration:none;padding:15px 20px;background-color:#2baaed;border:1px solid #2baaed;border-radius:3px;color:#FFF;font-weight:bold;' href='http://127.0.0.1:8000/verification/$email_encode/$token' target='_blank'>Konfirmasi email</a>
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td colspan='2' style='padding:2% 0;'>
                        <p style='color:#1d2227;font-size:22px;font-weight:200;'>Terima kasih</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </center>
            </div>
          </body>";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: no-reply@formevaluasiprogram.com' . "\r\n";
        // Mail it
        if(mail($to, $subject, $message, $headers)){
             return redirect('dashboard')->with('alert-success','E-mail Berhasil dikirim');
        }else{
             return redirect('dashboard')->with('alert-danger','E-mail gagal dikirim');
        }
    }

    public function verification($email, $token){
        $email_decode = base64_decode($email);
        // echo $email_decode;
        if (User::where('email', $email_decode)->exists() && User::where('token', $token)->exists()) {
            echo "string";
            $user = User::where('email', $email_decode)->first();
            $id = $user->id;

            $data = User::findOrFail($id);
            $data->vertified = "ya";
            $data->save();
             return redirect('login')->with('alert-success', 'Email Sudah tervirifikasi');
        }else{
            return redirect('login')->with('alert-danger', 'Email atau token ada salah');
        }
    }


    public function printdata()
    {
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.datapuskesmas5', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.datatahun', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
        }
    }
    public function savedata()
    {
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.datapuskesmas6', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.datatahun2', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
        }
    }

    public function printdatatahun()
    {
        if(Auth::user()->pos == 'super'){
            return view('superadmin2.chartdata.cetakdata');
        }
        else if(Auth::user()->pos == 'admin'){
            return view('superadmin2.chartdata.cetakdata');
        }
        else{
            return view('puskesmas.index');
        }
    }
    public function savedatatahun()
    {
        if(Auth::user()->pos == 'super'){
            return view('superadmin2.chartdata.savedata');
        }
        else if(Auth::user()->pos == 'admin'){
            return view('superadmin2.chartdata.savedata');
        }
        else{
            return view('puskesmas.index');
        }
    }

    public function datatahun(){
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.datatahun', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.datatahun', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
        }
    }

    public function datatahun2(){
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.datatahun2', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.datatahun2', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
        }
    }
}

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
                $user= new User();
                $user->nama=$request->get('nama');
                $user->email=$request->get('email');
                $user->puskesmas=$request->get('puskesmas');
                $user->password = Hash::make($request->get('password'));
                $user->pos=$request->get('pos');
                $user->token = $token;
                $user->vertified = 'ya';
                $user->remember_token = 'no';
                $user->save();

                return redirect('dashboard')->with('alert-success','Data Berhasil di Masukkan');
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
                    $user->nama = $request->get('nama');
                    $user->email = $request->get('email');
                    $user->puskesmas = $request->get('puskesmas');
                    $user->save();
                    return redirect('dashboard')->with('alert-success','Data Berhasil di Perbaharui');
                }
                else{
                    $validatedData = $request->validate([
                        'nama' => 'required|max:255',
                        'email' => 'unique:users|email',
                        'password' => 'required|confirmed|max:255|min:4',
                    ]);
                    $user->nama = $request->get('nama');
                    $user->email = $request->get('email');
                    $user->puskesmas = $request->get('puskesmas');
                    $user->password = Hash::make($request->get('password'));
                    $user->save();
                    return redirect('dashboard')->with('alert-success','Data Berhasil di Perbaharui');
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

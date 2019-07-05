<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Puskesmas;

class PuskesmasController extends Controller
{
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkakun() == true){
            $data = Puskesmas::all();
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.puskesmas.lihatdatapuskesmas', compact('extends', 'section', 'data'));
        }
        else{
            return redirect('dashboard');
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
            return view('superadmin2.puskesmas.tambahPuskesmas');
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
        if($this->checkakun()==true){
            $puskesmas = Puskesmas::all()->where('nama_puskesmas', ucwords($request->nama_puskesmas));
            if(count($puskesmas) === 0){
                $puskesmas = new Puskesmas();
                $puskesmas->nama_puskesmas = ucwords($request->get('nama_puskesmas'));
                $puskesmas->save();
                return redirect('dashboard/puskesmas')->with('alert-success','Data Berhasil di Masukkan');
            }
            else{
                return redirect('dashboard/puskesmas')->with('alert-success','Data sudah ada');
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
            $puskesmas = Puskesmas::findOrFail($id);
            return view('superadmin2.puskesmas.editpuskesmas', compact('puskesmas', 'id'));
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
        if($this->checkakun()==true){
            $puskesmas = Puskesmas::findOrFail($id);
            $puskesmas->nama_puskesmas = ucwords($request->get('nama_puskesmas'));
            $puskesmas->save();
            return redirect('dashboard/puskesmas')->with('alert-success','Data Berhasil di Ubah');
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
        if($this->checkakun()==true){
            $puskesmas = Puskesmas::findOrFail($id);
            $puskesmas->delete();
            return redirect('dashboard/puskesmas')->with('alert-success', 'Program Berhasil di Hapus');
        }
        else{
            return redirect('dashboard');
        }
    }
}

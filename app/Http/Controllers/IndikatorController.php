<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Indikator;
use App\Program;
use App\Targetumur;

class IndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkakun() ==true){
            if(Auth::user()->pos == 'super'){
                // $data = Indikator::all();
                $data = DB::table('indikator')
                    ->join('program', 'indikator.nama_program', '=', 'program.id')
                    ->select('indikator.id', 'program.nama_program', 'indikator.nama_indikator')
                    ->get();
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.indikator.lihatdataindikator', compact('extends', 'section', 'data'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin.dashboard2', compact('extends', 'section'));
            }
            else{
                return redirect('dashboard');
            }
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
            $program = Program::all();
            return view('superadmin2.indikator.tambahIndikator', compact('program'));
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
            $indikator = new Indikator();
            $indikator->nama_program = $request->get('nama_program');
            $indikator->nama_indikator = $request->get('nama_indikator');
            $indikator->save();
            return redirect('dashboard/indikator')->with('alert-success','Data Berhasil di Masukkan');
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
            // $indikator = Indikator::findOrFail($id);
            $indikator = DB::table('indikator')->where('indikator.id', $id)
                    ->join('program', 'indikator.nama_program', '=', 'program.id')
                    ->select('indikator.id', 'program.nama_program', 'indikator.nama_indikator')
                    ->get();
                    // echo $indikator;
            return view('superadmin2.indikator.editindikator', compact('id', 'indikator'));
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
            $indikator = Indikator::findOrFail($id);
            $indikator->nama_indikator = $request->get('nama_indikator');
            $indikator->save();
            return redirect('dashboard/indikator')->with('alert-success','Data Berhasil di Ubah');
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
            $data = DB::table('data')->where('nama_indikator', $id)->get();
            if(count($data) < 0){
                $data->delete();
            }
            
            $targetumur = DB::table('targetumur')->where('nama_indikator', $id)->get();
            if(count($targetumur) < 0){
                $targetumur->delete();
            }

            $indikator = Indikator::findOrFail($id);
            $indikator->delete();
            return redirect('dashboard/indikator')->with('alert-success', 'Indikator Berhasil di Hapus');
        }
        else{
            return redirect('dashboard');
        }
    }
}

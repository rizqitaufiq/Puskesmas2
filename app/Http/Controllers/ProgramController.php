<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Program;
use App\Indikator;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkakun() == true){
            $data = Program::all();
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.program.lihatdataprogram', compact('extends', 'section', 'data'));
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
            return view('superadmin2.program.tambahProgram');
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
            $program = Program::all()->where('nama_program', strtoupper($request->nama_program));

            if(count($program) === 0){
                $program = new Program();
                $program->nama_program = strtoupper($request->get('nama_program'));
                $program->save();
                return redirect('dashboard/program')->with('alert-success','Data Berhasil di Masukkan');
            }
            else{
                return redirect('dashboard/program')->with('alert-danger','Data sudah ada');
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
            $program = Program::findOrFail($id);
            return view('superadmin2.program.editprogram', compact('program', 'id'));
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
            $program = Program::findOrFail($id);
            $program->nama_program = strtoupper($request->get('nama_program'));
            $program->save();
            return redirect('dashboard/program')->with('alert-success','Data Berhasil di Ubah');
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
            $program = Program::findOrFail($id);
            $program->delete();
            return redirect('dashboard/program')->with('alert-success', 'Program Berhasil di Hapus');
        }
        else{
            return redirect('dashboard');
        }
    }
}

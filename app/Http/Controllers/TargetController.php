<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Indikator;
use App\Program;
use App\Targetumur;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $data = DB::table('targetumur')
                    ->join('program', 'targetumur.nama_program', '=', 'program.id')
                    ->join('indikator', 'targetumur.nama_indikator', '=', 'indikator.id')
                    ->select('targetumur.id', 'program.nama_program', 'indikator.nama_indikator', 'targetumur.nama_targetumur')
                    ->get();
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.targetumur.lihatdatatarget', compact('extends', 'section', 'data'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin.dashboard2', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.index');
            }
        }else{
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
            return view('superadmin2.targetumur.tambahTarget', compact('program'));
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
            $target = new Targetumur();
            $target->nama_program = $request->get('program');
            $target->nama_indikator = $request->get('indikator');
            $target->nama_targetumur = $request->get('target');
            $target->save();
            return redirect('dashboard/target')->with('alert-success','Data Berhasil di Masukkan');
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
            $data = DB::table('targetumur')->where('targetumur.id', $id)
                    ->join('program', 'targetumur.nama_program', '=', 'program.id')
                    ->join('indikator', 'targetumur.nama_indikator', '=', 'indikator.id')
                    ->select('targetumur.id', 'program.nama_program', 'indikator.nama_indikator', 'targetumur.nama_targetumur')
                    ->get();
            // echo $data;
            return view('superadmin2.targetumur.edittarget', compact('id','data'));
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
            $target = Targetumur::findOrFail($id);
            $target->nama_targetumur = $request->get('target');
            $target->save();
            return redirect('dashboard/target')->with('alert-success','Data Berhasil di Ubah');
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
            $data = DB::table('data')->where('nama_targetumur', $id)->get();
            if(count($data) < 0){
                $data->delete();
            }
            
            $targetumur = Targetumur::findOrFail($id);
            $targetumur->delete();
            return redirect('dashboard/target')->with('alert-success', 'Target Umur Berhasil di Hapus');
        }
        else{
            return redirect('dashboard');
        }
    }

    public function fetch(Request $request)
    {
    //www.webslesson.info/2018/03/ajax-dynamic-dependent-dropdown-in-laravel.html
        if($this->checkakun() == true){
            $select = $request->get('select');
            $value = $request->get('value');
            // $dependent = $request->get('dependent');
            $data = DB::table('indikator')
            ->where($select, $value)
            ->get();
            $output = '<option value="">Pilih salah satu</option>';
            foreach($data as $row){
                $output .= '<option value="'.$row->id.'">'.$row->nama_indikator.'</option>';
            }
            echo $output;
        }
        else{
            return redirect('dashboard');
        }
        
    }
}

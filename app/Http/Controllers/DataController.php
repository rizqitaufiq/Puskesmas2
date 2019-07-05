<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Indikator;
use App\Program;
use App\Targetumur;
use App\User;
use App\Data;

class DataController extends Controller
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
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                $user = DB::table('data')
                    ->join('puskesmas', 'puskesmas.id', '=', 'data.nama_puskesmas')
                    ->select('data.nama_puskesmas', 'puskesmas.nama_puskesmas AS puskesmas')
                    ->distinct()
                    ->get();
                return view('superadmin2.data.datapuskesmas', compact('extends', 'section', 'user'));
            }elseif (Auth::user()->pos == 'admin') {
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                $id = Auth::user()->id;
                $program = DB::table('data')
                    ->where('data.nama_puskesmas', Auth::user()->puskesmas)
                    ->join('program', 'program.id', '=', 'data.nama_program')
                    ->select('data.nama_program', 'program.nama_program')
                    ->distinct()
                    ->get();
                return view('superadmin2.data.dataprogram', compact('id','extends', 'section', 'program'));
            }
            else{
                return redirect('dashboard');
            }
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
               $data = Data::all()->where('nama_targetumur', $request->target);
               if(count($data) === 0){
                    echo $request->get('program');
               }
               else{
                    return redirect('dashboard/data/input')->with('alert-danger','Data sudah ada');
               }
            }
            else{
                return redirect('dashboard');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataprog($id){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';

                $program = DB::table('data')
                    ->where('data.nama_puskesmas', $id)
                    ->join('program', 'program.id', '=', 'data.nama_program')
                    ->select('data.nama_program', 'program.nama_program')
                    ->distinct()
                    ->get();
                return view('superadmin2.data.dataprogram', compact('id', 'program', 'section', 'extends'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }
    public function data($id, $nama){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';

                $program = Program::where('nama_program', $nama)->get();
                $indikator = DB::table('data')
                    ->where('data.nama_program', $program[0]->id)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('data.id','indikator.nama_indikator AS indikator', 'targetumur.nama_targetumur AS targetumur', 'data.nama_indikator', 'data.nama_targetumur')
                    ->get();
                // echo $indikator;
                $data = Data::all()->where('nama_program', $program[0]->id);
                return view('superadmin2.data.lihatdata', compact('nama','extends', 'section', 'indikator', 'data'));
            }
            elseif(Auth::user()->pos == 'admin'){
                $id = Auth::user()->puskesmas;
                $extends = 'superadmin.layouts.template';
                $section = 'konten';

                $program = Program::where('nama_program', $nama)->get();
                $indikator = DB::table('data')
                    ->where('data.nama_program', $program[0]->id)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('data.id','indikator.nama_indikator AS indikator', 'targetumur.nama_targetumur AS targetumur', 'data.nama_indikator', 'data.nama_targetumur')
                    ->get();
                // echo $indikator;
                $data = Data::all()->where('nama_program', $program[0]->id);

                return view('superadmin2.data.lihatdata', compact('nama','extends', 'section', 'indikator', 'data'));
            }
            else{
                return redirect('dashboard');
            }
        }else{
            return redirect('dashboard');
        }
    }

    public function dataprograminput(){
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                $program = Program::all();
                return view('superadmin.daftarprogram', compact('program', 'section', 'extends'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function tambahdata($program){
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                $id = DB::table('program')->where('nama_program', $program)->get();
                $indikator = DB::table('indikator')->where('nama_program', $id[0]->id)->get();
                return view('superadmin.inputdata', compact('section', 'extends', 'indikator', 'program', 'id'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
        
    }

     public function fetch(Request $request)
    {
    //www.webslesson.info/2018/03/ajax-dynamic-dependent-dropdown-in-laravel.html
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
                $select = $request->get('select');
                $value = $request->get('value');
                // $dependent = $request->get('dependent');
                $data = DB::table('targetumur')
                ->where('nama_indikator', $value)
                ->get();
                $output = '<option value="">Pilih salah satu</option>';
                foreach($data as $row){
                    $output .= '<option value="'.$row->id.'">'.$row->nama_targetumur.'</option>';
                }
                echo $output;
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        } 
    }
}

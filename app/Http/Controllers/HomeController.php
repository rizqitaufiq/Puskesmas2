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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function lihatdata(){
        if(Auth::check()){
            return redirect('dashboard');
        }
        else{
            $user = DB::table('data')
                ->join('puskesmas', 'puskesmas.id', '=', 'data.nama_puskesmas')
                ->select('data.nama_puskesmas', 'puskesmas.nama_puskesmas AS puskesmas')
                ->distinct()
                ->get();
                return view('puskesmas.listpuskesmas', compact('user'));
        }
        
    }
    public function listprogram($id){
         if(Auth::check()){
            return redirect('dashboard');
        }
        else{
            $check = DB::table('data')->where('nama_puskesmas', $id)->get();
            if(count($check) === 0){
                return view('errors/404');
            }
            else{
                $program = DB::table('data')
                ->where('data.nama_puskesmas', $id)
                ->join('program', 'program.id', '=', 'data.nama_program')
                ->select('data.nama_program as id_program', 'program.nama_program')
                ->distinct()
                ->get();
            return view('puskesmas.listprogram', compact('id', 'program'));
            }
            
        }
    }

    public function dataprogram($id, $nama){
        if(!Auth::check()){
            $program1 = Program::where('nama_program', $nama)->get();
            if(count($program1) === 0){
                $prg = '0';
            }
            else{
                $prg = $program1[0]->id;
            }
            $check = DB::table('data')->where('nama_puskesmas', $id)->where('nama_program', $prg)->get();
            if(count($check) === 0){
                return view('errors/404');
            }
            else{
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';

                $program = Program::where('nama_program', $nama)->get();
                $indikator = DB::table('data')
                    ->where('data.nama_program', $program[0]->id)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('indikator.id as idindikator','indikator.nama_indikator AS indikator', 'targetumur.nama_targetumur AS targetumur', 'data.nama_indikator', 'data.nama_targetumur')
                    ->distinct()
                    ->get();
                $data = Data::all()->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id);
                // dd($indikator);
                return view('puskesmas.lihatdata', compact('id', 'nama','extends', 'section', 'indikator', 'data'));
                
            }
        }else{
            return redirect('dashboard');
        }
    }

    public function chart($id, $nama, $indi){
        if(!Auth::check()){
            $check = Program::where('nama_program', $nama)->get();
            if(count($check) === 0){
                $prg = '0';
            }
            else{
                $prg = $check[0]->id;
            }
            $data = DB::table('data')->where('nama_puskesmas', $id)->where('nama_indikator', $indi)->where('nama_program', $prg)->get();
             
            if(count($data) === 0){
                return view('errors/404');
            }
            else{
                $program = Program::where('nama_program', $nama)->get();

                $indikator = DB::table('data')
                ->where('data.nama_indikator', $indi)
                ->where('data.nama_puskesmas', $id)
                ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                ->select('indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
                ->distinct()
                ->get();
                 $data = Data::all()->where('nama_indikator', $indi)->where('nama_puskesmas', $id);

                 $label = $indikator[0]->indikator;
                 // echo $indikator;
                 $dataindikator = array();
                 $datatarget = array();
                 $datatahun = array();
                 foreach ($data as $data2) {
                     array_push($dataindikator, $data2->pencapaian);
                     array_push($datatarget, $data2->target_pencapaian);
                     array_push($datatahun, $data2->tahun);
                 }
                 // print_r($datatarget);
                 return view('puskesmas.chart', compact('id', 'label', 'program', 'indikator', 'datatahun', 'dataindikator', 'datatarget'));
            }
        }else{
            return redirect('dashboard');
        }
    }
}

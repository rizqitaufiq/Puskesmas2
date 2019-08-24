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
use App\Skdn;

class DataController extends Controller
{
    public function index(){
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
                $id = Auth::user()->puskesmas;
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

    public function create(){}

    public function store(Request $request){
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
               $data = Data::all()->where('nama_indikator', $request->indikator)->where('tahun', $request->tahun)->where('nama_puskesmas', Auth::user()->puskesmas);
                if(count($data) === 0){
                    // dd($request->all());
                    $id = Auth::user()->puskesmas;
                    $adquef = round($request->get('pencapaian')/$request->get('target_pencapaian')*100, 2);
                    $adqupef = round($adquef-100, 2);

                    if($request->get('pencapaian') <= $request->get('target_pencapaian')){
                        $hasil = "Tidak Tercapai";
                    }
                    else{
                        $hasil = "Tercapai";
                    }

                    $data = new Data();
                    $data->nama_puskesmas       = $id;
                    $data->nama_program         = $request->get('program');
                    $data->nama_indikator       = $request->get('indikator');
                    $data->nama_targetumur      = $request->get('target');
                    $data->target_pencapaian    = $request->get('target_pencapaian');
                    $data->pencapaian           = $request->get('pencapaian');
                    $data->total_sasaran        = $request->get('total_sasaran');
                    $data->target_sasaran       = $request->get('target_sasaran');
                    $data->tahun                = $request->get('tahun');                
                    $data->adequasi_effort      = $adquef;
                    $data->adequasi_peformance  = $adqupef;
                    $data->progress             = "-";
                    $data->sensitivitas         = "-";
                    $data->spesifitas           = "-";
                    $data->hasil                = "-";

                    $data->save();
                    return redirect('dashboard/data')->with('alert-success', 'Data berhasil dimasukkan');
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

    public function show($id){}

    public function edit($id){
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';        
                $id_prog = DB::table('data')->where('id', $id)->select('nama_program')->get();
                $program = DB::table('program')->where('id', $id_prog[0]->nama_program)->get();
                
                $data = DB::table('data')
                ->where('data.id', $id)
                ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                ->select('data.id', 'indikator.nama_indikator', 'targetumur.nama_targetumur', 'data.target_pencapaian', 'data.pencapaian', 'data.target_sasaran', 'data.total_sasaran', 'data.tahun')
                ->get();
                return view('superadmin.editdata', compact('id', 'program', 'data', 'extends', 'section'));
            }
            elseif(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                $id_prog = DB::table('data')->where('id', $id)->select('nama_program')->get();
                $program = DB::table('program')->where('id', $id_prog[0]->nama_program)->get();
                $data = DB::table('data')
                ->where('data.id', $id)
                ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                ->select('data.id', 'indikator.nama_indikator', 'targetumur.nama_targetumur', 'data.target_pencapaian', 'data.pencapaian', 'data.target_sasaran', 'data.total_sasaran', 'data.tahun')
                ->get();
                return view('superadmin.editdata', compact('id', 'program', 'data', 'extends', 'section'));
            }
            else{
                return redirect('dashboard');    
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function update(Request $request, $id){
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
            // $id = Auth::user()->puskesmas;
                $adquef = round($request->get('pencapaian')/$request->get('target_pencapaian')*100, 2);
                $adqupef = round($adquef-100);  

                $data = Data::findOrFail($id);
                $data->target_pencapaian    = $request->get('target_pencapaian');
                $data->pencapaian           = $request->get('pencapaian');
                $data->total_sasaran        = $request->get('total_sasaran');
                $data->target_sasaran       = $request->get('target_sasaran');             
                $data->adequasi_effort      = $adquef;
                $data->adequasi_peformance  = $adqupef;

                $data->save();
                return redirect('dashboard/data')->with('alert-success', 'Data berhasil diubah');  
            }
            elseif(Auth::user()->pos == 'super'){
                $adquef = round($request->get('pencapaian')/$request->get('target_pencapaian')*100, 2);
                $adqupef = round($adquef-100);  

                $data = Data::findOrFail($id);
                $data->target_pencapaian    = $request->get('target_pencapaian');
                $data->pencapaian           = $request->get('pencapaian');
                $data->total_sasaran        = $request->get('total_sasaran');
                $data->target_sasaran       = $request->get('target_sasaran');             
                $data->adequasi_effort      = $adquef;
                $data->adequasi_peformance  = $adqupef;

                $data->save();
                return redirect('dashboard/data')->with('alert-success', 'Data berhasil diubah');
            }
            else{
                return redirect('dashboard');
            }
        }
    }

    public function destroy($id){
        if(Auth::check()){
            $data = Data::findOrFail($id);
            $data->delete();
            return redirect('dashboard/data')->with('alert-success', 'Data Berhasil di Hapus');
        }
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
                if(Auth::user()->pos == 'super'){
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
                    $skdn = Skdn::all()->where('nama_puskesmas', $id);
                    $data = Data::all()->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id);

                    //Perhitungan progres
                    $mintahun = Skdn::min('tahun');
                    $maxtahun = Skdn::max('tahun');
                    $data = DB::table('skdn')->where('tahun', min('tahun'))->get();

                    return view('superadmin2.data.lihatdata', compact('skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));
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
                        ->select('indikator.id as idindikator','indikator.nama_indikator AS indikator', 'targetumur.nama_targetumur AS targetumur', 'data.nama_indikator', 'data.nama_targetumur')
                        ->distinct()
                        ->get();
                    // echo $indikator;
                    $skdn = Skdn::all()->where('nama_puskesmas', $id);
                    $data = Data::all()->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id);
                    //perhitungan progress
                    $tahunmin = DB::table('skdn')->where('tahun', Skdn::min('tahun'))->get();
                    $tahunmax = DB::table('skdn')->where('tahun', Skdn::max('tahun'))->get();

                    //progress
                    $rs = round(($tahunmax[0]->Data_S/ $tahunmin[0]->Data_S)-1, 2);
                    $pts = round($tahunmin[0]->Data_S*pow((1+$rs), 5), 2);
                    $rk = round(($tahunmax[0]->Data_K/ $tahunmin[0]->Data_K)-1, 2);
                    $ptk = round($tahunmin[0]->Data_K*pow((1+$rk), 5), 2);
                    $rd = round(($tahunmax[0]->Data_D/ $tahunmin[0]->Data_D)-1, 2);
                    $ptd = round($tahunmin[0]->Data_D*pow((1+$rd), 5), 2);
                    $rn = round(($tahunmax[0]->Data_N/ $tahunmin[0]->Data_N)-1, 2);
                    $ptn = round($tahunmin[0]->Data_N*pow((1+$rn), 5), 2);

                    return view('superadmin2.data.lihatdata', compact('pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));
                }
                else{
                    return redirect('dashboard');
                }
            }
            
        }else{
            return redirect('dashboard');
        }
    }

    public function chart($id, $nama, $indi){
        if(Auth::check()){
            $check = Program::where('nama_program', $nama)->get();
            if(count($check) === 0){
                $prg = '0';
            }
            else{
                $prg = $check[0]->id;
            }
            $data = Data::all()->where('nama_puskesmas', $id)->where('nama_indikator', $indi)->where('nama_program', $prg);
            if(count($data) === 0){
                return view('errors/404');
            }
            else{
                if(Auth::user()->pos == 'super'){
                    $extends = 'superadmin2.layouts.2template';
                    $section = 'konten2';

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
                     return view('superadmin2.data.chartindikator', compact('id', 'label', 'program', 'indikator', 'datatahun', 'dataindikator', 'datatarget', 'extends', 'section'));

                }
                elseif (Auth::user()->pos == 'admin') {
                    $id = Auth::user()->puskesmas;
                    $extends = 'superadmin.layouts.template';
                    $section = 'konten';

                    $program = Program::where('nama_program', $nama)->get();

                    $indikator = DB::table('data')
                    ->where('data.nama_indikator', $indi)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select( 'indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
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
                     return view('superadmin2.data.chartindikator', compact('id', 'label', 'program', 'indikator', 'datatahun', 'dataindikator', 'datatarget', 'extends', 'section'));
                }
                else{
                    return redirect('dashboard');
                }    
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
            $check = DB::table('program')->where('nama_program', $program)->get();
            if(count($check) === 0){
                return view('errors/404');
            }
            else{
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
        }
        else{
            return redirect('dashboard');
        }
        
    }

    public function fetch(Request $request){
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

    public function listpuskesmaslaporan(){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                $user = DB::table('data')
                    ->join('puskesmas', 'puskesmas.id', '=', 'data.nama_puskesmas')
                    ->select('data.nama_puskesmas', 'puskesmas.nama_puskesmas AS puskesmas')
                    ->distinct()
                    ->get();
                // return view('superadmin2.data.datapuskesmas', compact('extends', 'section', 'user'));
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
                // return view('superadmin2.data.dataprogram', compact('id','extends', 'section', 'program'));
            }
            else{
                return redirect('dashboard');
            }
        }
    }

    public function laporandatatahun(){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){

            }
            elseif(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';

                $id = Auth::user()->puskesmas;
                $data = DB::table('data')
                    ->where('nama_puskesmas', $id)
                    ->select('tahun')->distinct()->get();
                return view('superadmin2.laporan.datatahunlaporan', compact('extends', 'section', 'data'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function chart2(Request $request){
        if(Auth::check()){
            $check = Program::where('nama_program', $request->nama)->get();
            if(count($check) === 0){
                $prg = '0';
            }
            else{
                $prg = $check[0]->id;
            }
            $data = Data::all()->where('nama_puskesmas', $request->id)->where('nama_indikator', $request->indi)->where('nama_program', $prg);
            if(count($data) === 0){
                return view('errors/404');
            }
            else{
                if(Auth::user()->pos == 'super'){
                    $extends = 'superadmin2.layouts.2template';
                    $section = 'konten2';

                    $program = Program::where('nama_program', $request->nama)->get();

                    $indikator = DB::table('data')
                    ->where('data.nama_indikator', $request->indi)
                    ->where('data.nama_puskesmas', $request->id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
                    ->distinct()
                    ->get();
                     $data = Data::all()->where('nama_indikator', $request->indi)->where('nama_puskesmas', $request->id);

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
                     return view('superadmin2.data.chartindikator', compact('id', 'label', 'program', 'indikator', 'datatahun', 'dataindikator', 'datatarget', 'extends', 'section'));

                }
                elseif (Auth::user()->pos == 'admin') {
                    $id = Auth::user()->puskesmas;
                    $extends = 'superadmin.layouts.template';
                    $section = 'konten';

                    $program = Program::where('nama_program', $nama)->get();

                    $indikator = DB::table('data')
                    ->where('data.nama_indikator', $request->indi)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select( 'indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
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
                     return view('superadmin2.data.chartindikator', compact('id', 'label', 'program', 'indikator', 'datatahun', 'dataindikator', 'datatarget', 'extends', 'section'));
                }
                else{
                    return redirect('dashboard');
                }    
            }
            
        }else{
            return redirect('dashboard');
        }
    }
}

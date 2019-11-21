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
use App\Notif;

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
                // dd($request->all());
               $data = Data::all()->where('nama_targetumur', $request->target)->where('tahun', $request->tahun)->where('nama_puskesmas', Auth::user()->puskesmas);
               
                if(count($data) === 0){
                    $id = Auth::user()->puskesmas;
                    $adquef = round($request->get('target_pencapaian')/$request->get('target_sasaran')*100, 2);
                    // $adqupef = round($adquef-100, 2);
                    $adqupef = round($adquef-100, 2);

                    if($request->get('target_sasaran') >= $request->get('target_pencapaian')){
                        $hasil = "Tidak Tercapai";
                        $notif = new Notif();
                        $notif->id_puskesmas = $id;
                        $notif->id_program = $request->get('program');
                        $notif->dibaca = "0";
                        $notif->tahun = $request->get('tahun');
                        $notif->save();
                    }
                    else{
                        $hasil = "Tercapai";
                    }
                    //sensitivitas & spesifitas
                    if($request->get('total_sasaran') === "-"){
                        $total = $request->get('total_sasaran');
                        $data = new Data();
                        $data->nama_puskesmas       = $id;
                        $data->nama_program         = $request->get('program');
                        $data->nama_indikator       = $request->get('indikator');
                        $data->nama_targetumur      = $request->get('target');
                        $data->target_pencapaian    = $request->get('target_pencapaian');
                        $data->pencapaian           = "-";
                        $data->total_sasaran        = "-";
                        $data->target_sasaran       = $request->get('target_sasaran');
                        $data->tahun                = $request->get('tahun');                
                        $data->adequasi_effort      = $adquef;
                        $data->adequasi_peformance  = $adqupef;
                        $data->progress             = "-";
                        $data->sensitivitas         = "-";
                        $data->spesifitas           = "-";
                        $data->hasil                = $hasil;

                        $data->save();
                        return redirect('dashboard/data')->with('alert-success', 'Data berhasil dimasukkan');
                    }else{
                        $total = $request->get('total_sasaran');
                        $jumlah_pencapaian_plus = round(($request->get('target_pencapaian')/100)*$request->get('total_sasaran'), 0);
                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                        
                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                        if($request->get('target_pencapaian') == 100){
                            $spes               = "0";
                        }else{
                            $spes                   = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
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
                        $data->sensitivitas         = $sens;
                        $data->spesifitas           = $spes;
                        $data->hasil                = $hasil;

                        $data->save();
                        return redirect('dashboard/data')->with('alert-success', 'Data berhasil dimasukkan');
                    }
                    
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
            // dd($request);
            $adquef = round($request->get('target_pencapaian')/$request->get('target_sasaran')*100, 2);
            $adqupef = round($adquef-100, 2);

            if($request->get('target_sasaran') >= $request->get('target_pencapaian')){
                $hasil = "Tidak Tercapai";
                $data1 = Data::findOrFail($id);
                $notif_id = DB::table('notif')
                    ->where('id_program', $data1->nama_program)
                    ->where('id_puskesmas', $data1->nama_puskesmas)
                    ->where('tahun', $data1->tahun)
                    ->select('id')
                    ->get();
                if(!$notif_id->isEmpty()){
                    $notif = Notif::find($notif_id[0]->id);
                    $notif->id_puskesmas = $data1->nama_puskesmas;
                    $notif->id_program = $data1->nama_program;
                    $notif->dibaca = "0";
                    $notif->tahun = $data1->tahun;
                    $notif->save();     
                }
                else{
                    $notif = new Notif();
                    $notif->id_puskesmas = $data1->nama_puskesmas;
                    $notif->id_program = $data1->nama_program;
                    $notif->dibaca = "0";
                    $notif->tahun = $data1->tahun;
                    $notif->save();
                }
               
            }
            else{
                $hasil = "Tercapai";
                $data1 = Data::findOrFail($id);
                $notif_id = DB::table('notif')
                    ->where('id_program', $data1->nama_program)
                    ->where('id_puskesmas', $data1->nama_puskesmas)
                    ->where('tahun', $data1->tahun)
                    ->select('id')
                    ->get();
                if(!$notif_id->isEmpty()){
                    $notif = Notif::find($notif_id[0]->id);
                    $notif->delete();
                }
            }//sensitivitas & spesifitas
            if($request->get('total_sasaran') === "-"){
                $total = $request->get('total_sasaran');
                $data = Data::findOrFail($id);
                $data->target_pencapaian    = $request->get('target_pencapaian');
                $data->pencapaian           = "-";
                $data->total_sasaran        = "-";
                $data->target_sasaran       = $request->get('target_sasaran');              
                $data->adequasi_effort      = $adquef;
                $data->adequasi_peformance  = $adqupef;
                $data->progress             = "-";
                $data->sensitivitas         = "-";
                $data->spesifitas           = "-";
                $data->hasil                = $hasil;

                $data->save();
                return redirect('dashboard/data')->with('alert-success', 'Data berhasil diubah');
            }else{

                $total = $request->get('total_sasaran');
                $jumlah_pencapaian_plus = round(($request->get('target_pencapaian')/100)*$request->get('total_sasaran'), 0);
                $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                
                $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                if($request->get('target_pencapaian') == 100){
                    $spes               = "0";
                }else{
                    $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                }

                $data = Data::findOrFail($id);
                $data->target_pencapaian    = $request->get('target_pencapaian');
                $data->pencapaian           = $request->get('pencapaian');
                $data->total_sasaran        = $request->get('total_sasaran');
                $data->target_sasaran       = $request->get('target_sasaran');              
                $data->adequasi_effort      = $adquef;
                $data->adequasi_peformance  = $adqupef;
                $data->progress             = "-";
                $data->sensitivitas         = $sens;
                $data->spesifitas           = $spes;
                $data->hasil                = $hasil;

                $data->save();
                return redirect('dashboard/data')->with('alert-success', 'Data berhasil diubah');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function destroy($id){
        if(Auth::check()){
            $data = Data::findOrFail($id);
            $notif_id = DB::table('notif')
                ->where('id_program', $data->nama_program)
                ->where('id_puskesmas', $data->nama_puskesmas)
                ->where('tahun', $data->tahun)
                ->select('id')
                ->get();
            if(!$notif_id->isEmpty()){
                $notif = Notif::find($notif_id[0]->id);
                $notif->delete();
            }   
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
            $cocheck = count($check);
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
                    $data = Data::all()->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id);

                    if($nama === 'SKDN'){
                      $skdn = Skdn::all()->where('nama_puskesmas', $id);
                        if(count($skdn) !== 0){
                            $tahunmin = DB::table('skdn')->where('nama_puskesmas', $id)->where('tahun', DB::table('skdn')->where('nama_puskesmas', $id)->min('tahun'))->get();
                            $tahunmax = DB::table('skdn')->where('nama_puskesmas', $id)->where('tahun', DB::table('skdn')->where('nama_puskesmas', $id)->max('tahun'))->get();
                            if(count($tahunmax) === 0){
                                $tahunmax = $tahunmin;
                            }
                            //sensitifitas dan spesifitas
                            $g = 0;
                            foreach ($data as $value) {
                                foreach ($skdn as $key) {
                                    if($value->tahun == $key->tahun){
                                        if($value->nama_indikator == 4){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                            // echo $total."<br>";
                                            // echo $jumlah_pencapaian_plus."<br>";
                                            // echo $jumlah_pencapaian_min."<br>";
                                            // echo $jumlah_plus_plus."<br>";
                                            // echo $jumlah_plus_min."<br>";
                                            // echo $jumlah_min_min."<br>";
                                            // echo $jumlah_min_plus."<br>"."<br>";
                                        }
                                        elseif($value->nama_indikator == 3){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 5){
                                            $total = $key->Data_D;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 6){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 7){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 8){
                                            $total = $key->Data_K;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                    }
                                    else{
                                        $spsn[$g]['tahun']      = "-";
                                        $spsn[$g]['indikator']  = "-";
                                        $spsn[$g]['spes']       = "-";
                                        $spsn[$g]['sens']       = "-";

                                        // return view('superadmin2.data.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));
                                    }
                                }
                            }
                            //progress
                            $rs  = round(($tahunmax[0]->Data_S/ $tahunmin[0]->Data_S)-1, 2);
                            $pts = round($tahunmin[0]->Data_S*pow((1+$rs), 5), 2);
                            $rk  = round(($tahunmax[0]->Data_K/ $tahunmin[0]->Data_K)-1, 2);
                            $ptk = round($tahunmin[0]->Data_K*pow((1+$rk), 5), 2);
                            $rd  = round(($tahunmax[0]->Data_D/ $tahunmin[0]->Data_D)-1, 2);
                            $ptd = round($tahunmin[0]->Data_D*pow((1+$rd), 5), 2);
                            $rn  = round(($tahunmax[0]->Data_N/ $tahunmin[0]->Data_N)-1, 2);
                            $ptn = round($tahunmin[0]->Data_N*pow((1+$rn), 5), 2);
                            
                            return view('superadmin2.data.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));
                        }
                        else{
                            $pts = 0;
                            $ptk = 0;
                            $ptd = 0;
                            $ptn = 0;  
                            $spsn[0]['tahun']      = 0;
                            $spsn[0]['indikator']  = 0;
                            $spsn[0]['spes']       = 0;
                            $spsn[0]['sens']       = 0;

                            return view('superadmin2.data.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));   
                        }  
                    }

                    else{
                        $g = 0;
                        $datadis = DB::table('data')->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id)->select('nama_indikator', 'nama_targetumur', 'nama_targetumur')->distinct()->get();
                        
                        foreach ($datadis as $value) {
                            $tahunmin =DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->where('tahun', DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->min('tahun'))->get();
                            $tahunmax = DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->where('tahun', DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->max('tahun'))->get();

                            $rs  = round(($tahunmax[0]->pencapaian/ $tahunmin[0]->pencapaian)-1, 2);
                            $pts = round($tahunmin[0]->pencapaian*pow((1+$rs), 5), 2);

                            $dataex[$g]['tahunmax']       = $tahunmax[0]->pencapaian;
                            $dataex[$g]['tahunmin']       = $tahunmin[0]->pencapaian;
                            $dataex[$g]['rs']             = $rs;
                            $dataex[$g]['nama_indikator'] = $value->nama_indikator;
                            $dataex[$g]['nama_targetumur']= $value->nama_targetumur;
                            $dataex[$g]['progress']       = $pts;
                            $g++;
                        }
                        return view('superadmin2.data.lihatdata', compact('dataex', 'cocheck', 'id', 'nama','extends', 'section', 'indikator', 'data'));  
                    }
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

                    $data = Data::all()->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id);

                    if($nama === 'SKDN'){
                        $skdn = Skdn::all()->where('nama_puskesmas', $id);
                        if(count($skdn) !== 0){
                            $tahunmin = DB::table('skdn')->where('nama_puskesmas', $id)->where('tahun', DB::table('skdn')->where('nama_puskesmas', $id)->min('tahun'))->get();
                            $tahunmax = DB::table('skdn')->where('nama_puskesmas', $id)->where('tahun', DB::table('skdn')->where('nama_puskesmas', $id)->max('tahun'))->get();
                            $g = 0;
                            foreach ($data as $value) {
                                foreach ($skdn as $key) {
                                    if($value->tahun == $key->tahun){
                                        if($value->nama_indikator == 4){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;

                                        }
                                        elseif($value->nama_indikator == 3){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 5){
                                            $total = $key->Data_D;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 6){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 7){
                                            $total = $key->Data_S;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        elseif($value->nama_indikator == 8){
                                            $total = $key->Data_K;
                                            $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                            $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                            $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                            $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                            $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                            $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                            $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                            if($value->target_pencapaian == 100){
                                                $spes               = "0";
                                            }else{
                                                $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                            }
                                            $spsn[$g]['tahun']      = $value->tahun;
                                            $spsn[$g]['indikator']  = $value->nama_indikator;
                                            $spsn[$g]['spes']       = $spes;
                                            $spsn[$g]['sens']       = $sens;
                                            $g++;
                                        }
                                        else{
                                            $spsn[$g]['tahun']      = "-";
                                            $spsn[$g]['indikator']  = "-";
                                            $spsn[$g]['spes']       = "-";
                                            $spsn[$g]['sens']       = "-";
                                            $g++;
                                        }
                                    }
                                    else{
                                        $spsn[$g]['tahun']      = "-";
                                        $spsn[$g]['indikator']  = "-";
                                        $spsn[$g]['spes']       = "-";
                                        $spsn[$g]['sens']       = "-";
                                        $g++;
                                    }
                                }
                            }
                            //progress
                            $rs  = round(($tahunmax[0]->Data_S/ $tahunmin[0]->Data_S)-1, 2);
                            $pts = round($tahunmin[0]->Data_S*pow((1+$rs), 5), 2);
                            $rk  = round(($tahunmax[0]->Data_K/ $tahunmin[0]->Data_K)-1, 2);
                            $ptk = round($tahunmin[0]->Data_K*pow((1+$rk), 5), 2);
                            $rd  = round(($tahunmax[0]->Data_D/ $tahunmin[0]->Data_D)-1, 2);
                            $ptd = round($tahunmin[0]->Data_D*pow((1+$rd), 5), 2);
                            $rn  = round(($tahunmax[0]->Data_N/ $tahunmin[0]->Data_N)-1, 2);
                            $ptn = round($tahunmin[0]->Data_N*pow((1+$rn), 5), 2);
                            
                            return view('superadmin2.data.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));
                        }
                        else{
                            $pts = "-";
                            $ptk = "-";
                            $ptd = "-";
                            $ptn = "-";  
                            $spsn[0]['tahun']      = "-";
                            $spsn[0]['indikator']  = "-";
                            $spsn[0]['spes']       = "-";
                            $spsn[0]['sens']       = "-";

                            return view('superadmin2.data.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));   
                        }  
                    }

                    else{

                        $g = 0;
                        $datadis = DB::table('data')->where('nama_program', $program[0]->id)->where('nama_puskesmas', $id)->select('nama_indikator', 'nama_targetumur', 'nama_targetumur')->distinct()->get();
                        
                        foreach ($datadis as $value) {
                            $tahunmin =DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->where('tahun', DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->min('tahun'))->get();
                            $tahunmax = DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->where('tahun', DB::table('data')->where('nama_targetumur', $value->nama_targetumur)->max('tahun'))->get();

                            $rs  = round(($tahunmax[0]->pencapaian/ $tahunmin[0]->pencapaian)-1, 2);
                            $pts = round($tahunmin[0]->pencapaian*pow((1+$rs), 5), 2);

                            $dataex[$g]['tahunmax']       = $tahunmax[0]->pencapaian;
                            $dataex[$g]['tahunmin']       = $tahunmin[0]->pencapaian;
                            $dataex[$g]['rs']             = $rs;
                            $dataex[$g]['nama_indikator'] = $value->nama_indikator;
                            $dataex[$g]['nama_targetumur']= $value->nama_targetumur;
                            $dataex[$g]['progress']       = $pts;
                            $g++;
                        }

                        return view('superadmin2.data.lihatdata', compact('dataex', 'cocheck', 'id', 'nama','extends', 'section', 'indikator', 'data'));  
                    }
                    
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
            $data = Data::all()->where('nama_puskesmas', $id)->where('nama_targetumur', $indi)->where('nama_program', $prg);
            
            if(count($data) === 0){
                return view('errors/404');
            }
            else{
                if(Auth::user()->pos == 'super'){
                    $extends = 'superadmin2.layouts.2template';
                    $section = 'konten2';

                    $program = Program::where('nama_program', $nama)->get();

                    $indikator = DB::table('data')
                    ->where('data.nama_targetumur', $indi)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
                    ->distinct()
                    ->get();
                     $data = Data::all()->where('nama_targetumur', $indi)->where('nama_puskesmas', $id);

                     $label = $indikator[0]->indikator;
                     $dataindikator = array();
                     $datatarget = array();
                     $datatahun = array();
                     array_push($dataindikator, 0);
                     array_push($datatahun, 0);
                     array_push($datatarget, 0);
                     foreach ($data as $data2) {
                         array_push($dataindikator, $data2->target_pencapaian);
                         array_push($datatarget, $data2->target_sasaran);
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
                    ->where('data.nama_targetumur', $indi)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select( 'indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
                    ->distinct()
                    ->get();
                     $data = Data::all()->where('nama_targetumur', $indi)->where('nama_puskesmas', $id);

                     $label = $indikator[0]->indikator;
                     // echo $indikator;

                     $dataindikator = array();
                     $datatarget = array();
                     $datatahun = array();
                     array_push($dataindikator, 0);
                     array_push($datatahun, 0);
                     array_push($datatarget, 0);
                     foreach ($data as $data2) {
                         array_push($dataindikator, $data2->target_pencapaian);
                         array_push($datatarget, $data2->target_sasaran);
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

    public function fetch(Request $request){//www.webslesson.info/2018/03/ajax-dynamic-dependent-dropdown-in-laravel.html
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

    public function chartdata(){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                $user = DB::table('data')
                    ->join('puskesmas', 'puskesmas.id', '=', 'data.nama_puskesmas')
                    ->select('data.nama_puskesmas', 'puskesmas.nama_puskesmas AS puskesmas')
                    ->distinct()
                    ->get();

                return view('superadmin2.chartdata.datapuskesmas', compact('extends', 'section', 'user'));
            }
            else if (Auth::user()->pos == 'admin') {
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                $id = Auth::user()->puskesmas;
                $program = DB::table('data')
                    ->where('data.nama_puskesmas', $id)
                    ->join('program', 'program.id', '=', 'data.nama_program')
                    ->select('data.nama_program', 'program.nama_program')
                    ->distinct()
                    ->get();

                return view('superadmin2.chartdata.dataprogram', compact('program', 'id', 'extends', 'section'));                
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function chartdataprogram($id){
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

                return view('superadmin2.chartdata.dataprogram', compact('program', 'id', 'extends', 'section'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function chartdatatahun($id, $nama){
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
                    $data = DB::table('data')->where('nama_puskesmas', $id)->where('nama_program', $prg)->select('tahun')->distinct()->get();

                    return view('superadmin2.chartdata.datatahun', compact('extends', 'section', 'id', 'data', 'nama'));
                }
                else if(Auth::user()->pos == 'admin'){
                    $extends = 'superadmin.layouts.template';
                    $section = 'konten';
                    $id = Auth::user()->puskesmas;
                    $data = DB::table('data')->where('nama_puskesmas', $id)->where('nama_program', $prg)->select('tahun')->distinct()->get();

                    return view('superadmin2.chartdata.datatahun', compact('extends', 'section', 'id', 'data', 'nama'));
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

    public function showchart($id, $nama, $tahun){
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
                    $data = DB::table('data')->where('data.nama_puskesmas', $id)->where('data.nama_program', $prg)->where('data.tahun', $tahun)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('data.nama_puskesmas', 'data.tahun', 'data.target_pencapaian', 'data.nama_program', 'indikator.nama_indikator', 'targetumur.nama_targetumur')->get();
                    // dd($data);
                   $indikator2 = DB::table('data')->where('data.nama_puskesmas', $id)->where('data.nama_program', $prg)->where('data.tahun', $tahun)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('indikator.nama_indikator')->distinct()->get();

                    $targetumur2 = DB::table('data')->where('data.nama_puskesmas', $id)->where('data.nama_program', $prg)->where('data.tahun', $tahun)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('targetumur.nama_targetumur')->distinct()->get();

                    $targetumur = array();
                    foreach ($targetumur2 as $tg) {
                        array_push($targetumur, $tg->nama_targetumur);
                    }

                    $indikator = array();
                    foreach ($indikator2 as $ind) {
                        array_push($indikator, $ind->nama_indikator);
                    }

                    $label = $nama." ".$tahun;
                    $dataindikator = array();
                    // dd($data);
                    foreach ($data as $data2) {
                        array_push($dataindikator, $data2->target_pencapaian);
                    }
                    // dd($indikator);

                    return view('superadmin2.chartdata.chartData', compact('data', 'targetumur', 'extends', 'section', 'tahun', 'nama', 'id', 'label', 'dataindikator', 'indikator'));
                }
                else if(Auth::user()->pos == 'admin'){
                    $extends = 'superadmin.layouts.template';
                    $section = 'konten';
                    $id = Auth::user()->puskesmas;
                    $data = DB::table('data')->where('data.nama_puskesmas', $id)->where('data.nama_program', $prg)->where('data.tahun', $tahun)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('data.nama_puskesmas', 'data.tahun', 'data.target_pencapaian', 'data.nama_program', 'indikator.nama_indikator', 'targetumur.nama_targetumur')->get();
                    // dd($data);
                   $indikator2 = DB::table('data')->where('data.nama_puskesmas', $id)->where('data.nama_program', $prg)->where('data.tahun', $tahun)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('indikator.nama_indikator')->distinct()->get();

                    $targetumur2 = DB::table('data')->where('data.nama_puskesmas', $id)->where('data.nama_program', $prg)->where('data.tahun', $tahun)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('targetumur.nama_targetumur')->distinct()->get();

                    $targetumur = array();
                    foreach ($targetumur2 as $tg) {
                        array_push($targetumur, $tg->nama_targetumur);
                    }

                    $indikator = array();
                    foreach ($indikator2 as $ind) {
                        array_push($indikator, $ind->nama_indikator);
                    }

                    $label = $nama." ".$tahun;
                    $dataindikator = array();
                    // dd($data);
                    foreach ($data as $data2) {
                        array_push($dataindikator, $data2->target_pencapaian);
                    }
                    // dd($indikator);

                    return view('superadmin2.chartdata.chartData', compact('data', 'targetumur', 'extends', 'section', 'tahun', 'nama', 'id', 'label', 'dataindikator', 'indikator'));
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

    public function laporan(){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';

                $user = DB::table('data')
                    ->join('puskesmas', 'puskesmas.id', '=', 'data.nama_puskesmas')
                    ->select('data.nama_puskesmas', 'puskesmas.nama_puskesmas AS puskesmas')
                    ->distinct()
                    ->get();

                return view('superadmin2.laporan.datapuskesmas', compact('extends', 'section', 'user'));
            }
            elseif(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';

                $id = Auth::user()->puskesmas;
                $data = DB::table('data')
                    ->where('nama_puskesmas', $id)
                    ->select('tahun')->distinct()->get();
                return view('superadmin2.laporan.datatahunlaporan', compact('id', 'extends', 'section', 'data'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function laporandatatahun($id){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                
                $data = DB::table('data')
                    ->where('nama_puskesmas', $id)
                    ->select('tahun')->distinct()->get();
                return view('superadmin2.laporan.datatahunlaporan', compact('id', 'extends', 'section', 'data'));
            }
            else{
                return redirect('dashboard');
            }
        }

    }

    public function cetaklaporan($id, $tahun){
        if(Auth::check()){
            if(Auth::user()->pos =='super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';

                $puskesmas = DB::table('puskesmas')->where('id', $id)->select('nama_puskesmas')->get();
                // $data = DB::table('data')
                // ->where('nama_puskesmas', $id)
                // ->where('tahun', $tahun)
                // ->join('idindikator', 'idindikator.id', '=', 'data.nama_indikator')->get();
                $program = DB::table('data')
                ->where('data.tahun', $tahun)
                ->where('data.nama_puskesmas', $id)
                ->join('program', 'program.id', '=', 'data.nama_program')
                ->distinct()
                ->select('program.nama_program', 'program.id')->get();


                $indikator = DB::table('data')
                        ->where('data.tahun', $tahun)
                        ->where('data.nama_puskesmas', $id)
                        ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                        ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                        ->join('program', 'program.id', '=', 'data.nama_program')
                        ->select('program.nama_program', 'indikator.id as idindikator','indikator.nama_indikator AS indikator', 'targetumur.nama_targetumur AS targetumur', 'data.nama_indikator', 'data.nama_targetumur', 'data.target_pencapaian', 'data.target_sasaran', 'data.adequasi_peformance', 'data.adequasi_effort', 'data.pencapaian', 'data.total_sasaran', 'data.sensitivitas', 'data.spesifitas', 'data.hasil')
                        ->distinct()
                        ->get();
                // dd($indikator);
                $skdn = DB::table('skdn')->where('tahun', $tahun)->where('nama_puskesmas', $id)->get();
                if(count($skdn) !== 0){
                    foreach ($skdn as $skdn2) {
                        $skdndata[0]['Data_S'] = $skdn2->Data_S;
                        $skdndata[0]['Data_K'] = $skdn2->Data_K;
                        $skdndata[0]['Data_D'] = $skdn2->Data_D;
                        $skdndata[0]['Data_N'] = $skdn2->Data_N;
                        $skdndata[0]['tahun'] = $skdn2->tahun;
                    }
                }
                else{
                    $skdndata[0]['Data_S'] = 0;
                    $skdndata[0]['Data_K'] = 0;
                    $skdndata[0]['Data_D'] = 0;
                    $skdndata[0]['Data_N'] = 0;
                    $skdndata[0]['tahun']  = 0;
                }

                $g = 0;
                if(count($indikator) !== 0){
                    foreach ($indikator as $value) {
                        if($value->nama_program == 'SKDN'){
                            if(count($skdn) !== 0){
                                foreach ($skdn as $key) {
                                    if($value->nama_indikator == 4){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;

                                    }
                                    elseif($value->nama_indikator == 3){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 5){
                                        $total = $key->Data_D;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 6){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 7){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 8){
                                        $total = $key->Data_K;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    else{
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = "-";
                                        $data[$g]['spesifitas']             = "-";
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                }
                            }
                            else{

                                $data[$g]['nama_program']           = $value->nama_program;
                                $data[$g]['idindikator']            = $value->idindikator;
                                $data[$g]['indikator']              = $value->indikator;
                                $data[$g]['targetumur']             = $value->targetumur;
                                $data[$g]['nama_indikator']         = $value->nama_indikator;
                                $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                $data[$g]['target_sasaran']         = $value->target_sasaran;
                                $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                $data[$g]['pencapaian']             = $value->pencapaian;
                                $data[$g]['total_sasaran']          = $value->total_sasaran;
                                $data[$g]['sensitivitas']           = $value->sensitivitas;
                                $data[$g]['spesifitas']             = $value->spesifitas;
                                $data[$g]['hasil']                  = $value->hasil;
                                $g++;
                            }
                        }
                        else{
                            $data[$g]['nama_program']           = $value->nama_program;
                            $data[$g]['idindikator']            = $value->idindikator;
                            $data[$g]['indikator']              = $value->indikator;
                            $data[$g]['targetumur']             = $value->targetumur;
                            $data[$g]['nama_indikator']         = $value->nama_indikator;
                            $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                            $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                            $data[$g]['target_sasaran']         = $value->target_sasaran;
                            $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                            $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                            $data[$g]['pencapaian']             = $value->pencapaian;
                            $data[$g]['total_sasaran']          = $value->total_sasaran;
                            $data[$g]['sensitivitas']           = $value->sensitivitas;
                            $data[$g]['spesifitas']             = $value->spesifitas;
                            $data[$g]['hasil']                  = $value->hasil;
                            $g++;
                        }
                    }
                }
                else{
                    $data[0]['nama_program']           = 0;
                    $data[0]['idindikator']            = 0;
                    $data[0]['indikator']              = 0;
                    $data[0]['targetumur']             = 0;
                    $data[0]['nama_indikator']         = 0;
                    $data[0]['nama_targetumur']        = 0;
                    $data[0]['target_pencapaian']      = 0;
                    $data[0]['target_sasaran']         = 0;
                    $data[0]['adequasi_peformance']    = 0;
                    $data[0]['adequasi_effort']        = 0;
                    $data[0]['pencapaian']             = 0;
                    $data[0]['total_sasaran']          = 0;
                    $data[0]['sensitivitas']           = 0;
                    $data[0]['spesifitas']             = 0;
                    $data[0]['hasil']                  = 0;
                }

                return view('superadmin2.laporan.cetaklaporan', compact('skdndata', 'program', 'data', 'puskesmas', 'extends', 'section', 'id', 'data', 'tahun'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';

                $id = Auth::user()->puskesmas;
                $puskesmas = DB::table('puskesmas')->where('id', $id)->select('nama_puskesmas')->get();
                // $data = DB::table('data')
                // ->where('nama_puskesmas', $id)
                // ->where('tahun', $tahun)
                // ->join('idindikator', 'idindikator.id', '=', 'data.nama_indikator')->get();
                $program = DB::table('data')
                ->where('data.tahun', $tahun)
                ->where('data.nama_puskesmas', $id)
                ->join('program', 'program.id', '=', 'data.nama_program')
                ->distinct()
                ->select('program.nama_program', 'program.id')->get();


                $indikator = DB::table('data')
                        ->where('data.tahun', $tahun)
                        ->where('data.nama_puskesmas', $id)
                        ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                        ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                        ->join('program', 'program.id', '=', 'data.nama_program')
                        ->select('program.nama_program', 'indikator.id as idindikator','indikator.nama_indikator AS indikator', 'targetumur.nama_targetumur AS targetumur', 'data.nama_indikator', 'data.nama_targetumur', 'data.target_pencapaian', 'data.target_sasaran', 'data.adequasi_peformance', 'data.adequasi_effort', 'data.pencapaian', 'data.total_sasaran', 'data.sensitivitas', 'data.spesifitas', 'data.hasil')
                        ->distinct()
                        ->get();
                // dd($indikator);
                $skdn = DB::table('skdn')->where('tahun', $tahun)->where('nama_puskesmas', $id)->get();
                if(count($skdn) !== 0){
                    foreach ($skdn as $skdn2) {
                        $skdndata[0]['Data_S'] = $skdn2->Data_S;
                        $skdndata[0]['Data_K'] = $skdn2->Data_K;
                        $skdndata[0]['Data_D'] = $skdn2->Data_D;
                        $skdndata[0]['Data_N'] = $skdn2->Data_N;
                        $skdndata[0]['tahun'] = $skdn2->tahun;
                    }
                }
                else{
                    $skdndata[0]['Data_S'] = 0;
                    $skdndata[0]['Data_K'] = 0;
                    $skdndata[0]['Data_D'] = 0;
                    $skdndata[0]['Data_N'] = 0;
                    $skdndata[0]['tahun']  = 0;
                }

                $g = 0;
                if(count($indikator) !== 0){
                    foreach ($indikator as $value) {
                        if($value->nama_program == 'SKDN'){
                            if(count($skdn) !== 0){
                                foreach ($skdn as $key) {
                                    if($value->nama_indikator == 4){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;

                                    }
                                    elseif($value->nama_indikator == 3){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 5){
                                        $total = $key->Data_D;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 6){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 7){
                                        $total = $key->Data_S;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    elseif($value->nama_indikator == 8){
                                        $total = $key->Data_K;
                                        $jumlah_pencapaian_plus = round(($value->target_pencapaian/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->target_pencapaian == 100){
                                            $spes               = "0";
                                        }else{
                                            $spes               = round($jumlah_min_min/$jumlah_pencapaian_min*100, 2);    
                                        }
                                        
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = $sens;
                                        $data[$g]['spesifitas']             = $spes;
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                    else{
                                        $data[$g]['nama_program']           = $value->nama_program;
                                        $data[$g]['idindikator']            = $value->idindikator;
                                        $data[$g]['indikator']              = $value->indikator;
                                        $data[$g]['targetumur']             = $value->targetumur;
                                        $data[$g]['nama_indikator']         = $value->nama_indikator;
                                        $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                        $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                        $data[$g]['target_sasaran']         = $value->target_sasaran;
                                        $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                        $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                        $data[$g]['pencapaian']             = $value->pencapaian;
                                        $data[$g]['total_sasaran']          = $value->total_sasaran;
                                        $data[$g]['sensitivitas']           = "-";
                                        $data[$g]['spesifitas']             = "-";
                                        $data[$g]['hasil']                  = $value->hasil;
                                        $g++;
                                    }
                                }
                            }
                            else{

                                $data[$g]['nama_program']           = $value->nama_program;
                                $data[$g]['idindikator']            = $value->idindikator;
                                $data[$g]['indikator']              = $value->indikator;
                                $data[$g]['targetumur']             = $value->targetumur;
                                $data[$g]['nama_indikator']         = $value->nama_indikator;
                                $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                                $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                                $data[$g]['target_sasaran']         = $value->target_sasaran;
                                $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                                $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                                $data[$g]['pencapaian']             = $value->pencapaian;
                                $data[$g]['total_sasaran']          = $value->total_sasaran;
                                $data[$g]['sensitivitas']           = $value->sensitivitas;
                                $data[$g]['spesifitas']             = $value->spesifitas;
                                $data[$g]['hasil']                  = $value->hasil;
                                $g++;
                            }
                        }
                        else{
                            $data[$g]['nama_program']           = $value->nama_program;
                            $data[$g]['idindikator']            = $value->idindikator;
                            $data[$g]['indikator']              = $value->indikator;
                            $data[$g]['targetumur']             = $value->targetumur;
                            $data[$g]['nama_indikator']         = $value->nama_indikator;
                            $data[$g]['nama_targetumur']        = $value->nama_targetumur;
                            $data[$g]['target_pencapaian']      = $value->target_pencapaian;
                            $data[$g]['target_sasaran']         = $value->target_sasaran;
                            $data[$g]['adequasi_peformance']    = $value->adequasi_peformance;
                            $data[$g]['adequasi_effort']        = $value->adequasi_effort;
                            $data[$g]['pencapaian']             = $value->pencapaian;
                            $data[$g]['total_sasaran']          = $value->total_sasaran;
                            $data[$g]['sensitivitas']           = $value->sensitivitas;
                            $data[$g]['spesifitas']             = $value->spesifitas;
                            $data[$g]['hasil']                  = $value->hasil;
                            $g++;
                        }
                    }
                }
                else{
                    $data[0]['nama_program']           = 0;
                    $data[0]['idindikator']            = 0;
                    $data[0]['indikator']              = 0;
                    $data[0]['targetumur']             = 0;
                    $data[0]['nama_indikator']         = 0;
                    $data[0]['nama_targetumur']        = 0;
                    $data[0]['target_pencapaian']      = 0;
                    $data[0]['target_sasaran']         = 0;
                    $data[0]['adequasi_peformance']    = 0;
                    $data[0]['adequasi_effort']        = 0;
                    $data[0]['pencapaian']             = 0;
                    $data[0]['total_sasaran']          = 0;
                    $data[0]['sensitivitas']           = 0;
                    $data[0]['spesifitas']             = 0;
                    $data[0]['hasil']                  = 0;
                }

                return view('superadmin2.laporan.cetaklaporan', compact('skdndata', 'program', 'data', 'puskesmas', 'extends', 'section', 'id', 'data', 'tahun'));
            }
            else{
                return redirect('dashboard');
            }
        }
        else{
            return redirect('dashboard');
        }
    }

    public function chart2(Request $request){ //menggunakan method post
        if(Auth::check()){
            $check = Program::where('nama_program', $request->nama)->get();
            if(count($check) === 0){
                $prg = '0';
            }
            else{
                $prg = $check[0]->id;
            }
            $data = Data::all()->where('nama_puskesmas', $request->id)->where('nama_targetumur', $request->indi)->where('nama_program', $prg);
            if(count($data) === 0){
                return view('errors/404');
            }
            else{
                if(Auth::user()->pos == 'super'){
                    $extends = 'superadmin2.layouts.2template';
                    $section = 'konten2';

                    $program = Program::where('nama_program', $request->nama)->get();

                    $indikator = DB::table('data')
                    ->where('data.nama_targetumur', $request->indi)
                    ->where('data.nama_puskesmas', $request->id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select('indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
                    ->distinct()
                    ->get();
                     $data = Data::all()->where('nama_targetumur', $request->indi)->where('nama_puskesmas', $request->id);

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
                    ->where('data.nama_targetumur', $request->indi)
                    ->where('data.nama_puskesmas', $id)
                    ->join('indikator', 'indikator.id', '=', 'data.nama_indikator')
                    ->join('targetumur', 'targetumur.id', '=', 'data.nama_targetumur')
                    ->select( 'indikator.nama_indikator as indikator', 'targetumur.nama_targetumur as targetumur')
                    ->distinct()
                    ->get();
                     $data = Data::all()->where('nama_targetumur', $indi)->where('nama_puskesmas', $id);

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

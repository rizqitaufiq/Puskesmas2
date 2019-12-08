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
Use App\Skdn;

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
            $cocheck = count($check);
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
                if($nama === 'SKDN'){
                  $skdn = Skdn::all()->where('nama_puskesmas', $id);
                    if(count($skdn) !== 0){
                        $tahunmin = DB::table('skdn')->where('nama_puskesmas', $id)->where('tahun', Skdn::min('tahun'))->get();
                        $tahunmax = DB::table('skdn')->where('nama_puskesmas', $id)->where('tahun', Skdn::max('tahun'))->get();
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
                                        $jumlah_pencapaian_plus = round(($value->cakupan/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->cakupan == 100){
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
                                        $jumlah_pencapaian_plus = round(($value->cakupan/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->cakupan == 100){
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
                                        $jumlah_pencapaian_plus = round(($value->cakupan/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->cakupan == 100){
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
                                        $jumlah_pencapaian_plus = round(($value->cakupan/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->cakupan == 100){
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
                                        $jumlah_pencapaian_plus = round(($value->cakupan/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->cakupan == 100){
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
                                        $jumlah_pencapaian_plus = round(($value->cakupan/100)*$total, 0);
                                        $jumlah_pencapaian_min  = round($total-$jumlah_pencapaian_plus, 2);
                                        $jumlah_plus_plus       = round($jumlah_pencapaian_plus*(95/100), 2);
                                        $jumlah_plus_min        = round($jumlah_pencapaian_plus-$jumlah_plus_plus, 2);
                                        $jumlah_min_min         = round($jumlah_pencapaian_min*(95/100), 2);
                                        $jumlah_min_plus        = round($jumlah_pencapaian_min-$jumlah_min_min, 2);
                                        $sens                   = round($jumlah_plus_plus/$jumlah_pencapaian_plus*100, 2);
                                        if($value->cakupan == 100){
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
                        
                        return view('puskesmas.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));
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

                        return view('puskesmas.lihatdata', compact('spsn', 'cocheck', 'pts', 'ptk', 'ptd', 'ptn','skdn', 'id', 'nama','extends', 'section', 'indikator', 'data'));   
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
                    return view('puskesmas.lihatdata', compact('dataex',  'cocheck', 'id', 'nama','extends', 'section', 'indikator', 'data'));
                }
                // dd($indikator);
                
                
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
            $data = DB::table('data')->where('nama_puskesmas', $id)->where('nama_targetumur', $indi)->where('nama_program', $prg)->get();
             
            if(count($data) === 0){
                return view('errors/404');
            }
            else{
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
                 // echo $indikator;
                 $dataindikator = array();
                 $datatarget = array();
                 $datatahun = array();
                 array_push($dataindikator, 0);
                     array_push($datatahun, 0);
                     array_push($datatarget, 0);
                 foreach ($data as $data2) {
                     array_push($dataindikator, $data2->cakupan);
                         array_push($datatarget, $data2->target);
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

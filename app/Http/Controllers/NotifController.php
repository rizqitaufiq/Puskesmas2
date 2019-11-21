<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Notif;
use App\Program;

class NotifController extends Controller
{
    public function notifskdn(){
    	if (Auth::user()->pos == 'super'){
    		$extends = 'superadmin2.layouts.2template';
	        $section = 'konten2';
	    	return view('superadmin2.notif.notif-skdn', compact('extends', 'section'));
    	}
    	
    }
    public function notif($id){
        if(Auth::check()){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                $program = Program::all()->where('id', $id)->first();
                
                if($program->nama_program == "PEMBERIAN MAKAN TAMBAHAN"){
                    return view('superadmin2.notif.notif-pmt', compact('extends', 'section'));
                }
                elseif($program->nama_program == "SKDN"){
                    return view('superadmin2.notif.notif-skdn', compact('extends', 'section'));
                }
                elseif($program->nama_program == "KADARZI"){
                    return view('superadmin2.notif.notif-kadarzi', compact('extends', 'section'));
                }
                elseif($program->nama_program == "TABLET TAMBAH DARAH"){
                    return view('superadmin2.notif.notif-ttd', compact('extends', 'section'));
                }
                else{
                    return redirect('dashboard');
                }
            }
            elseif(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                $program = Program::all()->where('id', $id)->first();
                if($program->nama_program == "PEMBERIAN MAKAN TAMBAHAN"){
                    return view('superadmin2.notif.notif-pmt', compact('extends', 'section'));
                }
                elseif($program->nama_program == "SKDN"){
                    return view('superadmin2.notif.notif-skdn', compact('extends', 'section'));
                }
                elseif($program->nama_program == "KADARZI"){
                    return view('superadmin2.notif.notif-kadarzi', compact('extends', 'section'));
                }
                elseif($program->nama_program == "TABLET TAMBAH DARAH"){
                    return view('superadmin2.notif.notif-ttd', compact('extends', 'section'));
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

}

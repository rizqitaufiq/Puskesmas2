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

class NotifController extends Controller
{
    public function notifskdn(){
    	if (Auth::user()->pos == 'super'){
    		$extends = 'superadmin2.layouts.2template';
	        $section = 'konten2';
	    	return view('superadmin2.notif.notif-pmt', compact('extends', 'section'));
    	}
    	
    }
}

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
        $user = DB::table('data')
                ->join('puskesmas', 'puskesmas.id', '=', 'data.nama_puskesmas')
                ->select('data.nama_puskesmas', 'puskesmas.nama_puskesmas AS puskesmas')
                ->distinct()
                ->get();
                return view('puskesmas.lihatdata', compact('user'));
    }
    public function listprogram($id){
        $program = DB::table('data')
            ->where('data.nama_puskesmas', $id)
            ->join('program', 'program.id', '=', 'data.nama_program')
            ->select('data.nama_program', 'program.nama_program')
            ->distinct()
            ->get();
        return view('puskesmas.listprogram', compact('id', 'program'));
    }
    public function dataprogram($id){

    }
}

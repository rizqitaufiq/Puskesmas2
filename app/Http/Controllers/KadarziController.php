<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KadarziController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.lihatdata.lihatdatakadarzi', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.lihatdata.lihatdatakadarzi', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.entrydata.inputkadarzi', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.entrydata.inputkadarzi', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
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
        return redirect('dashboard/kadarzi')->with('alert-success','Data Berhasil di Masukkan');
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
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.editdata.editdatakadarzi', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.editdata.editdatakadarzi', compact('extends', 'section'));
        }
        else{
            return view('puskesmas.index');
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
        return redirect('dashboard/kadarzi')->with('alert-success','Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('dashboard/kadarzi')->with('alert-success','Data Berhasil di Hapus');
    }

    public function chart(){
       if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.chartdata.chart', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.chartdata.chart', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.chartdata.chartdata');
            }
        }else{
            return view('puskesmas.chartdata.chartdata');
        }
    }

    public function datapus(){
        return view('superadmin2.datapuskesmas2');
    }
     public function lihatdata(){
        return view ('puskesmas.lihatdata.lihatdatakadarzi');
    }
    public function printdata(){
       if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.chartdata.cetakdata', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.chartdata.cetakdata', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.chartdata.cetakdata');
            }
        }else{
            return view('puskesmas.chartdata.cetakdata');
        }
    }

    public function laporan(){
        if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.datapuskesmas8', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.datatahun4', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.index');
            }
        }else{
            return view('puskesmas.index');
        }   
    }
    public function datatahun(){
        if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.datatahun4', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.datatahun4', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.index');
            }
        }else{
            return view('puskesmas.index');
        }   
    }

    public function lihat(){
        if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.chartdata.chartKadarzi', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.chartdata.chartKadarzi', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.index');
            }
        }else{
            return view('puskesmas.index');
        }   
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Skdn;
use App\Data;

class SkdnController extends Controller
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
            return view('superadmin2.lihatdata.lihatdataskdn', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.lihatdata.lihatdataskdn', compact('extends', 'section'));
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
        if(Auth::user()->pos == 'super'){
            $extends = 'superadmin2.layouts.2template';
            $section = 'konten2';
            return view('superadmin2.entrydata.inputskdn', compact('extends', 'section'));
        }
        else if(Auth::user()->pos == 'admin'){
            $extends = 'superadmin.layouts.template';
            $section = 'konten';
            return view('superadmin2.entrydata.inputskdn', compact('extends', 'section'));
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
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
                $skdn = new Skdn();
                $skdn->nama_puskesmas   = $request->get('nama_puskesmas');
                $skdn->Data_S           = $request->get('data_s');
                $skdn->Data_K           = $request->get('data_k');
                $skdn->Data_D           = $request->get('data_d');
                $skdn->Data_N           = $request->get('data_n');
                $skdn->tahun            =$request->get('tahun');
                $skdn->save();

                return redirect('dashboard/data')->with('alert-success','Data Berhasil di Masukkan');
            }
            else{
                return redirect('dashboard');
            }
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
        if(Auth::check()){
            if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten'; 

                $skdn = Skdn::all();
                return view('superadmin.editdataskdn', compact('id','skdn', 'extends', 'section'));
            }
            elseif(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';

                $skdn = Skdn::all();

                return view('superadmin.editdataskdn', compact('id', 'skdn', 'extends', 'section'));
            }
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
        if(Auth::check()){
            $data = Skdn::findOrFail($id);
            $data->Data_S       = $request->get('data_s');
            $data->Data_K       = $request->get('data_k');
            $data->Data_D       = $request->get('data_d');
            $data->Data_N       = $request->get('data_n');
            $data->tahun        = $request->get('tahun');
            $data->save();
            return redirect('dashboard/data')->with('alert-success', 'Data berhasil diubah');
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
        if(Auth::check()){
            $data = Skdn::findOrFail($id);
            $data->delete();
            return redirect('dashboard/data')->with('alert-success', 'Data Berhasil di Hapus');
        }
        else{
            return redirect('dashboard');
        }
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
        return view('superadmin2.datapuskesmas');
    }

    public function lihatdata(){
        return view ('puskesmas.lihatdata.lihatdataskdn');
    }
    public function laporan(){
        if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                $extends = 'superadmin2.layouts.2template';
                $section = 'konten2';
                return view('superadmin2.datapuskesmas7', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.datatahun3', compact('extends', 'section'));
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
                return view('superadmin2.datatahun3', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.datatahun3', compact('extends', 'section'));
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
                return view('superadmin2.chartdata.chartSKDN', compact('extends', 'section'));
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin2.chartdata.chartSKDN', compact('extends', 'section'));
            }
            else{
                return view('puskesmas.index');
            }
        }else{
            return view('puskesmas.index');
        }   
    }

    public function input(){
        if(Auth::check() == true){
            if(Auth::user()->pos == 'super'){
                return redirect('dashboard');
            }
            else if(Auth::user()->pos == 'admin'){
                $extends = 'superadmin.layouts.template';
                $section = 'konten';
                return view('superadmin.inputskdn', compact('extends', 'section'));
            }
        }else{
            return view('puskesmas.index');
        }
    }

}

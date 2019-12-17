@extends('puskesmas.layouts.template')

@section('main')
<script type="text/javascript">
    $(document).ready(function() {
        $("table[id^='TABLE']").DataTable( {
            "scrollCollapse": false,
            "searching": true,
            "paging": true
        } );
    } );
</script>
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
                @if($nama == 'SKDN')
<!-- data S K D dan N -->
                <div class="row" style="margin: 50px 20px 20px 20px;">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="" style="margin: 10px 0px 5px 0px;">Data S K D dan N</h3>
                                <!-- <strong class="card-title mb-3">Data S K D dan N</strong> -->
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <table id="skdnTABLE_1" class="table">
                                        <thead>
                                            <tr align="center" style="font-size: 14px; ">
                                                <th style="text-align: center;">tahun</th>
                                                <th style="text-align: center;"> S</th>
                                                <th style="text-align: center;"> K</th>
                                                <th style="text-align: center;"> D</th>
                                                <th style="text-align: center;"> N</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($skdn as $skdn2)
                                            <tr align="center" style="font-size: 12px">
                                                <td>{{$skdn2->tahun}}</td>
                                                <td>{{$skdn2->Data_S}}</td>
                                                <td>{{$skdn2->Data_K}}</td>
                                                <td>{{$skdn2->Data_D}}</td>
                                                <td>{{$skdn2->Data_N}}</td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin: 20px 20px 0px 20px;">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="" style="margin: 10px 0px 5px 0px;" >Progress {{$nama}} (5 tahun kedepan)</h3>
                                <!-- <strong class="card-title mb-3">Progress {{$nama}}(5 tahun kedepan)</strong> -->
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <div class="row">
                                        <div class="col">
                                            <section class="" style="margin-bottom: 5%">
                                                <div class="card-body text-secondary">
                                                    <table class="table" style="margin-bottom: 0px">
                                                        <thead>
                                                            <tr align="center" style="font-size: 14px">
                                                                <th style="text-align: center;">Data S</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$pts}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col">
                                            <section class="" style="margin-bottom: 5%">
                                                <div class="card-body text-secondary">
                                                    <table class="table" style="margin-bottom: 0px">
                                                        <thead>
                                                            <tr align="center" style="font-size: 14px">
                                                                <th style="text-align: center;">Data K</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr align="center" style="font-size: 12px">
                                                                <td style="text-align: center;">{{$ptk}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col">
                                            <section class="" style="margin-bottom: 5%">
                                                <div class="card-body text-secondary">
                                                    <table class="table" style="margin-bottom: 0px">
                                                        <thead>
                                                            <tr align="center" style="font-size: 14px">
                                                                <th style="text-align: center;">Data D</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$ptd}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </section>
                                        </div>
                                        <div class="col">
                                            <section class="" style="margin-bottom: 5%">
                                                <div class="card-body text-secondary">
                                                    <table class="table" style="margin-bottom: 0px">
                                                        <thead>
                                                            <tr align="center" style="font-size: 14px">
                                                                <th style="text-align: center;">Data N</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$ptn}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>      
                            </div>
                        </div>
                    </div>                  
                </div>
<!-- end data S K D dan N -->
                @else
                <div class="card" style="margin: 50px 30px 20px 30px;">
                    <div class="card-header">
                        <h3 class="" style="margin: 10px 0px 5px 0px;" >Progress {{$nama}} (5 tahun kedepan)</h3>
                        <!-- <strong class="card-title mb-3">Progress {{$nama}} (5 tahun kedepan)</strong> -->
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <div class="row">
                                @php
                                    $g = 0;
                                @endphp
                                @foreach($indikator as $indi)
                                @if($g == 3)
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <section class="" style="margin-bottom: 5%">
                                            <div class="card-body text-secondary">
                                                <table class="table" style="margin-bottom: 0px">
                                                    <thead>
                                                        <tr align="center" style="font-size: 14px">
                                                            <th style="text-align: center;">{{$indi->indikator}} pada {{$indi->targetumur}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($dataex as $dataex2)
                                                        @if($indi->nama_indikator == $dataex2['nama_indikator'] && $indi->nama_targetumur == $dataex2['nama_targetumur'])
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$dataex2['progress']}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                @php
                                    $g++;
                                @endphp
                                @elseif($g > 4 && $g%3 ==0 && $g < $cocheck)
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <section class="" style="margin-bottom: 5%">
                                            <div class="card-body text-secondary">
                                                <table class="table" style="margin-bottom: 0px">
                                                    <thead>
                                                        <tr align="center" style="font-size: 14px">
                                                            <th style="text-align: center;">{{$indi->indikator}} pada {{$indi->targetumur}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($dataex as $dataex2)
                                                        @if($indi->nama_indikator == $dataex2['nama_indikator'] && $indi->nama_targetumur == $dataex2['nama_targetumur'])
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$dataex2['progress']}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                @php
                                    $g++;
                                @endphp
                                @elseif($g == $cocheck)
                                    <div class="col">
                                        <section class="" style="margin-bottom: 5%">
                                            <div class="card-body text-secondary">
                                                <table class="table" style="margin-bottom: 0px">
                                                    <thead>
                                                        <tr align="center" style="font-size: 14px">
                                                            <th style="text-align: center;">{{$indi->indikator}} pada {{$indi->targetumur}}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($dataex as $dataex2)
                                                        @if($indi->nama_indikator == $dataex2['nama_indikator'] && $indi->nama_targetumur == $dataex2['nama_targetumur'])
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$dataex2['progress']}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                @else
                                <div class="col">
                                    <section class="" style="margin-bottom: 5%">
                                        <div class="card-body text-secondary">
                                            <table class="table" style="margin-bottom: 0px">
                                                <thead>
                                                    <tr align="center" style="font-size: 14px">
                                                        <th style="text-align: center;">{{$indi->indikator}} pada {{$indi->targetumur}}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($dataex as $dataex2)
                                                        @if($indi->nama_indikator == $dataex2['nama_indikator'] && $indi->nama_targetumur == $dataex2['nama_targetumur'])
                                                            <tr align="center" style="font-size: 12px">
                                                                <td>{{$dataex2['progress']}}</td>
                                                            </tr>
                                                        @endif
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </section>
                                </div>
                                @php
                                    $g++;
                                @endphp
                                @endif
                                @endforeach
                            </div>
                        </div>      
                    </div>
                </div>
                @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 20px 30px 20px 30px;">
                    <h3 class="card-header" style="margin: 10px 0px 5px 0px;">Data {{$nama}}</h3>
                    @php
                        $b = "TABLE_";
                        $i = 0;
                    @endphp
                    @if($nama == 'SKDN')
                    @foreach($indikator as $indikator)
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" data-toggle="collapse" href="#collapse{{$b.$i+=1}}">
                            <div class="card-header">
                                <strong class="card-title">{{$indikator->indikator}} pada {{$indikator->targetumur}}</strong>
                            </div>
                        </a>
                        <div id="collapse{{$b.$i}}" class="collapse hide">
                            <div class="card-body">
                                <table id="{{$b.$i}}" class="table">
                                    @php
                                    $a = 0;
                                    @endphp
                                    <thead align="center">
                                        <tr align="center">
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">tahun</th>
                                            <th style="text-align: center">Cakupan (%)</th>
                                            <!-- <th>Pencapaian</th>
                                            <th>Total Sasaran</th> -->
                                            <th style="text-align: center">Target (%)</th>
                                            <!-- <th>Nilai</th> -->
                                            <th style="text-align: center">Adequasi of Effort (Kecukupan Upaya)</th>
                                            <th style="text-align: center">Adequasi of Performance (Kecukupan Kinerja)</th>
                                            <!-- <th>Progress</th> -->
                                            <th style="text-align: center">Sensitivitas dan Spesifitas</th>
                                            <th style="text-align: center">Kategori</th>
                                            <th style="text-align: center">Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data2)
                                            @if($data2->nama_indikator == $indikator->nama_indikator &&
                                            $data2->nama_targetumur == $indikator->nama_targetumur)
                                            <tr align="center">
                                                <td >{{$a+=1}}</td>
                                                <td>{{$data2->tahun}}</td>
                                                <td>{{$data2->cakupan}}%</td>
                                                <!-- <td>{{$data2->pencapaian}}</td>
                                                <td>{{$data2->total_sasaran}}</td> -->
                                                <td>{{$data2->target}}%</td>
                                                <!-- <td>{{$data2->nilai}}</td> -->
                                                <td>{{$data2->adequasi_effort}}%</td>
                                                <td>{{$data2->adequasi_peformance}}%</td>
                                                <!-- <td>{{$data2->progress}}</td> -->
                                                <td>{{$data2->sensitivitas}}</td>
                                                <td>{{$data2->spesifitas}}</td>
                                                <td>{{$data2->hasil}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                <a href="{{route('puskesmas.data.chart', ['id' => $id, 'nama' => $nama, 'indi' => $indikator->nama_targetumur])}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    @foreach($indikator as $indikator)
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" data-toggle="collapse" href="#collapse{{$b.$i+=1}}">
                            <div class="card-header">
                                <strong class="card-title">{{$indikator->indikator}} pada {{$indikator->targetumur}}</strong>
                            </div>
                        </a>
                        <div id="collapse{{$b.$i}}" class="collapse hide">
                            <div class="card-body">
                                <table id="{{$b.$i}}" class="table">
                                    @php
                                    $a = 0;
                                    @endphp
                                    <thead align="center">
                                        <tr align="center">
                                            <th style="text-align: center">No</th>
                                            <th style="text-align: center">Tahun</th>
                                            <th style="text-align: center">Cakupan (%)</th>
                                            <th style="text-align: center">Pencapaian</th>
                                            <th style="text-align: center">Total Sasaran</th>
                                            <th style="text-align: center">Target (%)</th>
                                            <!-- <th>Nilai</th> -->
                                            <th style="text-align: center">Adequasi of Effort (Kecukupan Upaya)</th>
                                            <th style="text-align: center">Adequasi of Performance (Kecukupan Kinerja)</th>
                                            <!-- <th style="text-align: center">Progress</th> -->
                                            <th style="text-align: center">Sensitivitas dan Spesifitas</th>
                                            <th style="text-align: center">Kategori</th>
                                            <th style="text-align: center">Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data2)
                                            @if($data2->nama_indikator == $indikator->nama_indikator &&
                                            $data2->nama_targetumur == $indikator->nama_targetumur)
                                            <tr align="center">
                                                <td >{{$a+=1}}</td>
                                                <td>{{$data2->tahun}}</td>
                                                <td>{{$data2->cakupan}}%</td>
                                                <td>{{$data2->pencapaian}}</td>
                                                <td>{{$data2->total_sasaran}}</td>
                                                <td>{{$data2->target}}%</td>
                                                <!-- <td>{{$data2->nilai}}</td> -->
                                                <td>{{$data2->adequasi_effort}}%</td>
                                                <td>{{$data2->adequasi_peformance}}%</td>
                                                <!-- <td>{{$data2->progress}}</td> -->
                                                <td>{{$data2->sensitivitas}}</td>
                                                <td>{{$data2->spesifitas}}%</td>
                                                <td>{{$data2->hasil}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('puskesmas.data.chart', ['id' => $id, 'nama' => $nama, 'indi' => $indikator->nama_targetumur])}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
           </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@endsection
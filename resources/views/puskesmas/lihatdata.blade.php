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
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin: 40px 30px 20px 30px;">
                    <h1 class="card-header" style="margin: 10px 0px 5px 0px;">Data {{$nama}}</h1>
                    @php
                        $b = "TABLE_";
                        $i = 0;
                    @endphp
                    @foreach($indikator as $indikator)
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" data-toggle="collapse" href="#collapse{{$b.$i+=1}}">
                            <div class="card-header">
                                <strong class="card-title">{{$indikator->indikator}} pada {{$indikator->targetumur}}</strong>
                            </div>
                        </a>
                        <div id="collapse{{$b.$i}}" class="collapse hide">
                            <div class="card-body">
                                <table id="{{$b.$i}}" class="table table-striped table-bordered">
                                    @php
                                    $a = 0;
                                    @endphp
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>tahun</th>
                                            <th>Target Pencapaian</th>
                                            <th>Pencapaian</th>
                                            <th>Total Sasaran</th>
                                            <th>Target Sasaran</th>
                                            <th>Nilai</th>
                                            <th>Adequasi Effort</th>
                                            <th>Adequasi Performance</th>
                                            <th>Progress</th>
                                            <th>sensitivitas</th>
                                            <th>spesifitas</th>
                                            <th>Target</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $data2)
                                            @if($data2->nama_indikator == $indikator->nama_indikator &&
                                            $data2->nama_targetumur == $indikator->nama_targetumur)
                                            <tr>
                                                <td align ="center">{{$a+=1}}</td>
                                                <td>{{$data2->tahun}}</td>
                                                <td>{{$data2->target_pencapaian}}</td>
                                                <td>{{$data2->pencapaian}}</td>
                                                <td>{{$data2->total_sasaran}}</td>
                                                <td>{{$data2->target_sasaran}}</td>
                                                <td>{{$data2->nilai}}</td>
                                                <td>{{$data2->adequasi_effort}}</td>
                                                <td>{{$data2->adequasi_peformance}}</td>
                                                <td>{{$data2->progress}}</td>
                                                <td>{{$data2->sensitivitas}}</td>
                                                <td>{{$data2->spesifitas}}</td>
                                                <td>{{$data2->hasil}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <a href="{{route('puskesmas.data.chart', ['id' => $id, 'nama' => $nama, 'indi' => $indikator->idindikator])}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
           </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@endsection
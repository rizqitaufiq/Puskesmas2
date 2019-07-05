@extends($extends)

@section($section)
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
                    <div class="page-title">
                        <h1>Dashboard Admin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Lihat Data</a></li>
                            <li class="active">{{$nama}}</li>
                        </ol>
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
                @if(\Session::has('alert-success'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Success</span>
                    {{Session::get('alert-success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @php
                    $b = "TABLE_";
                    $i = 0;
                @endphp
                @foreach($indikator as $indikator)
	                <div class="card">
	                	<a class="card-link" data-toggle="collapse" href="#collapse{{$b.$i+=1}}">
		                    <div class="card-header">
						    	<strong class="card-title">{{$indikator->indikator}} pada {{$indikator->targetumur}} </strong>	
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
		                                    <th>Action</th>
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
			                                    <td align ="center"><a href="{{route('skdn.edit', 1)}}" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <form action="{{action('SkdnController@destroy', 1)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger" type="submit">Delete</button>
				                                    </form>
				                                </td>
			                                </tr>
		                            		@endif
		                            	@endforeach
		                            </tbody>
		                        </table>
		                        <a href="{{route('skdn.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
		            </div>
		            @endforeach
	            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
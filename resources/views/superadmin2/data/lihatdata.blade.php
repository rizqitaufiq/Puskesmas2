@extends($extends)

@section($section)
<script type="text/javascript">
	$(document).ready(function() {
	    $("table[id^='TABLE']").DataTable( {
	        "scrollCollapse": false,
	        "searching": true,
	        "paging": true,
	    } );
	} );


</script>
<script type="text/javascript">
	$(document).ready(function() {
	    $("table[id^='skdnTABLE']").DataTable( {
	        "scrollCollapse"	: false,
	        "searching"			: false,
	        "paging"			: false,
	        "info" 				: false
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
                @if($nama == 'SKDN')
                <div class="row">
	                <div class="col">
						<div class="card">
	                        <div class="card-header">
	                            <strong class="card-title mb-3">Data S K D dan N</strong>
	                        </div>
	                        <div class="card-body">
	                            <div class="mx-auto d-block">
	                                <table id="skdnTABLE_1" class="table">
			                            <thead>
			                                <tr align="center">
			                                    <th>tahun</th>
			                                    <th>S</th>
			                                    <th>K</th>
			                                    <th>D</th>
			                                    <th>N</th>
			                                    <th>Action</th>
			                                </tr>
			                            </thead>
			                            <tbody>
			                                <tr>
			                                    <td>2011</td>
			                                    <td>96</td>
			                                    <td>96</td>
			                                    <td>96</td>
			                                    <td>96</td>
			                                    <td align ="center"><a href="{{route('skdn.edit', 1)}}" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <form action="{{action('SkdnController@destroy', 1)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger" type="submit">Delete</button>
				                                    </form>
				                                </td>
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td align ="center"><a href="{{route('skdn.edit', 1)}}" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <form action="{{action('SkdnController@destroy', 1)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger" type="submit">Delete</button>
				                                    </form>
				                                </td>
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td align ="center"><a href="{{route('skdn.edit', 1)}}" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <form action="{{action('SkdnController@destroy', 1)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger" type="submit">Delete</button>
				                                    </form>
				                                </td>
			                                </tr>
			                            </tbody>
			                        </table>
	                                <div class="location text-sm-center"></div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <div class="col">
						<div class="card">
	                        <div class="card-header">
	                            <strong class="card-title mb-3">Progress</strong>
	                        </div>
	                        <div class="card-body">
	                            <div class="mx-auto d-block">
	                                <h5 class="text-sm-center mt-2 mb-1">Steven Lee</h5>
	                                <div class="row">
					                    <div class="col">
					                        <section class="card">
					                            <div class="card-body text-secondary">.col</div>
					                        </section>
					                    </div>
					                    <div class="col">
					                        <section class="card">
					                            <div class="card-body text-secondary">.col</div>
					                        </section>
					                    </div>
					                    <div class="col">
					                        <section class="card">
					                            <div class="card-body text-secondary">.col</div>
					                        </section>
					                    </div>
					                    <div class="col">
					                        <section class="card">
					                            <div class="card-body text-secondary">.col</div>
					                        </section>
					                    </div>
					                </div>
	                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> California, United States</div>
	                            </div>
	                            <hr>
	                            <div class="card-text text-sm-center">
	                                <a href="#"><i class="fa fa-facebook pr-1"></i></a>
	                                <a href="#"><i class="fa fa-twitter pr-1"></i></a>
	                                <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
	                                <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
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
		                                    <th>Adequasi Effort</th>
		                                    <th>Adequasi Performance</th>
		                                    <th>sensitivitas</th>
		                                    <th>spesifitas</th>
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
			                                    <td>{{$data2->adequasi_effort}}</td>
			                                    <td>{{$data2->adequasi_peformance}}</td>
			                                    <td>{{$data2->sensitivitas}}</td>
			                                    <td>{{$data2->spesifitas}}</td>
			                                    <td align ="center">
			                                    	<a href="{{route('skdn.edit', 1)}}" class="btn btn-warning btn-sm">&nbsp Edit &nbsp</a>
			                                    	<a href="javascript:void(0)" class="btn btn-danger btn-sm delete" id_delete="{{ $data2->id }}">delete</a>
			                                        <!-- <form action="{{action('SkdnController@destroy', 1)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger" type="submit">Delete</button>
				                                    </form> -->
				                                </td>
			                                </tr>
		                            		@endif
		                            	@endforeach
		                            </tbody>
		                        </table>
		                        <form id="dataDelete" action="" method="POST">
		                        	{{ csrf_field() }}
		                        	<input name="id_data" type="text" hidden>
		                        </form>
		                        <!-- <form action="{{route('data.indi.chart2')}}" method="post">
                                      @csrf
                                      <input type="text" name="id" value="{{$id}}" hidden>
                                      <input type="text" name="nama" value="{{$nama}}" hidden>
                                      <input type="text" name="indi" value="{{$indikator->idindikator}}" hidden>
                                      <button class="btn btn-danger" type="submit">Chart</button>
                                </form> -->
		                        <a href="{{route('data.indi.chart', ['id' => $id, 'nama' => $nama, 'indi' => $indikator->idindikator])}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
		            </div>
		            @endforeach
	            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.delete').on('click', function() {
			var delete_id     =   $(this).attr("delete_id");
	        $("#id_data").val(delete_id);
	        if(confirm('Apakah anda yakin akan menghapus data ini ?')){
	            $("#dataDelete").submit();
	        } else{
	            return false;
	        }
		});	

	});
</script>
@stop
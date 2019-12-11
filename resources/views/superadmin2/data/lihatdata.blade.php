@extends($extends)

@section($section)
<script type="text/javascript">
	$(document).ready(function() {
	    $("table[id^='TABLE']").DataTable( {
	        "scrollCollapse"	: false,
	        "searching"			: true,
	        "paging"			: true,
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
<!-- data S K D dan N -->
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
			                                <tr align="center" style="font-size: 14px">
			                                    <th>tahun</th>
			                                    <th> S</th>
			                                    <th> K</th>
			                                    <th> D</th>
			                                    <th> N</th>
			                                    
			                                    <th> K/S</th>
			                                    <th> D/K</th>
			                                    <th> N/D</th>
			                                    <th> D/S </th>
			                                    <th> N/S</th>
			                                    <th colspan="2">Action</th>
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

			                                    <td>{{number_format($skdn2->Data_K/$skdn2->Data_S*100,2)}}%</td>
			                                    <td>{{number_format($skdn2->Data_D/$skdn2->Data_K*100,2)}}%</td>
			                                    <td>{{number_format($skdn2->Data_N/$skdn2->Data_D*100,2)}}%</td>
			                                    <td>{{number_format($skdn2->Data_D/$skdn2->Data_S*100,2)}}%</td>
			                                    <td>{{number_format($skdn2->Data_N/$skdn2->Data_S*100,2)}}%</td>
			                                    <td style="width: 1%; padding-right: 0; padding-left: 2"><a href="{{route('skdn.edit', $skdn2->id)}}" class="btn btn-warning btn-sm">&nbsp Edit &nbsp</a></td>
			                                    <td style="width: 1%; padding-right: 0; padding-left: 2">
			                                        <form action="{{action('SkdnController@destroy', $skdn2->id)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
				                                    </form>

				                                </td>
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
	            <div class="row">
	                <div class="col">
						<div class="card">
	                        <div class="card-header">
	                            <strong class="card-title mb-3">Progress {{$nama}}(5 tahun kedepan)</strong>
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
					                            				<th>Data S</th>
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
					                            				<th>Data K</th>
					                            			</tr>
					                            		</thead>
					                            		<tbody>
					                            			<tr align="center" style="font-size: 12px">
					                            				<td>{{$ptk}}</td>
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
					                            				<th>Data D</th>
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
					                            				<th>Data N</th>
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
                @endif
                @php
                    $b = "TABLE_";
                    $i = 0;
                @endphp
<!-- tampilan skdn -->
                @if($nama == 'SKDN')
                @foreach($indikator as $indikator)
	                <div class="card">
	                	<a class="card-link" data-toggle="collapse" href="#collapse{{$b.$i+=1}}">
		                    <div class="card-header">
						    	<strong class="card-title">{{$indikator->indikator}} pada {{$indikator->targetumur}} </strong>	
		                    </div>
	                    </a>
	                    <div id="collapse{{$b.$i}}" class="collapse show">
		                    <div class="card-body">
		                        <table id="{{$b.$i}}" class="table">
		                        	@php
					                    $a = 0;
					                @endphp
					                
		                            <thead>
		                                <tr align="center" style="font-size: 14px">
		                                	<th>No</th>
		                                    <th>Tahun</th>
		                                    <th>Cakupan (%)</th>
		                                    <th>Target (%)</th>
		                                    <th>Adequasi Effort</th>
		                                    <th>Adequasi Performance</th>
		                                    <th>Sensitivitas dan Spesifitas</th>
		                                    <th>Kategori</th>
		                                    <th colspan="2">Action</th>
		                                </tr>
		                            </thead>
		                        	
		                            <tbody>
		                            	@foreach($data as $data2)
		                            		@if($data2->nama_indikator == $indikator->nama_indikator &&
		                            		$data2->nama_targetumur == $indikator->nama_targetumur)
		                            		<tr align="center" style="font-size: 12px">
		                            			<td>{{$a+=1}}</td>
			                                    <td>{{$data2->tahun}}</td>
			                                    <td>{{$data2->cakupan}}%</td>
			                                    <td>{{$data2->target}}%</td>
			                                    <td>{{$data2->adequasi_effort}}%</td>
			                                    <td>{{$data2->adequasi_peformance}}%</td>
			                                    <td>{{$data2->sensitivitas}}</td>
			                                    <td>{{$data2->spesifitas}}</td>
			                                    <td style="width: 1%; ">
			                                    	<a href="{{route('data.edit2', ['id' => $data2->id, 'nama'=> $nama])}}" class="btn btn-warning btn-sm">&nbsp Edit &nbsp</a>
			                                    </td>
			                                    <td style="width: 1%;">
			                                    	<!-- <a href="javascript:void(0)" class="btn btn-danger btn-sm delete" id_delete="{{ $data2->id }}">delete</a> -->
			                                        <form action="{{action('DataController@destroy', $data2->id)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
				                                    </form>
				                                </td>
			                                </tr>
		                            		@endif
		                            	@endforeach
		                            </tbody>
		                        </table>
		                        <a href="{{route('data.indi.chart', ['id' => $id, 'nama' => $nama, 'indi' => $indikator->nama_targetumur])}}" class="btn btn-primary btn-sm">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
		            </div>
		            @endforeach
<!-- end tampilan skdn -->
<!-- tampilan selain skdn -->
		            @else
		            <div class="card">
	                        <div class="card-header">
	                            <strong class="card-title mb-3">Progress {{$nama}} (5 tahun kedepan)</strong>
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
						                            				<th>{{$indi->indikator}} pada {{$indi->targetumur}}</th>
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
						                            				<th>{{$indi->indikator}} pada {{$indi->targetumur}}</th>
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
						                            				<th>{{$indi->indikator}} pada {{$indi->targetumur}}</th>
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
					                            				<th>{{$indi->indikator}} pada {{$indi->targetumur}}</th>
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
		            @foreach($indikator as $indikator)
	                <div class="card">
	                	<a class="card-link" data-toggle="collapse" href="#collapse{{$b.$i+=1}}">
		                    <div class="card-header">
						    	<strong class="card-title">{{$indikator->indikator}} pada {{$indikator->targetumur}} </strong>	
		                    </div>
	                    </a>
	                    <div id="collapse{{$b.$i}}" class="collapse show">
		                    <div class="card-body">
		                        <table id="{{$b.$i}}" class="table">
		                        	@php
					                    $a = 0;
					                @endphp
					                
		                            <thead>
		                                <tr align="center" style="font-size: 14px">
		                                	<th>No</th>
		                                    <th>Tahun</th>
		                                    <th>Pencapaian (N)</th>
		                                    <th>Cakupan (%)</th>
		                                    <th>Jumlah Sasaran (N)</th>
		                                    <th>Target (%)</th>
		                                    <th>Adequasi Effort</th>
		                                    <th>Adequasi Performance</th>
		                                    <th>Sensitivitas dan Spesifitas</th>
		                                    <th>Kategori</th>
		                                    <th>Hasil</th>
		                                    <th colspan="2">Action</th>
		                                </tr>
		                            </thead>
		                        	
		                            <tbody>
		                            	@foreach($data as $data2)
		                            		@if($data2->nama_indikator == $indikator->nama_indikator &&
		                            		$data2->nama_targetumur == $indikator->nama_targetumur)
		                            		<tr align="center" style="font-size: 12px">
		                            			<td>{{$a+=1}}</td>
			                                    <td>{{$data2->tahun}}</td>
			                                    <td>{{$data2->pencapaian}}</td>
			                                    <td>{{$data2->cakupan}}%</td>
			                                    <td>{{$data2->total_sasaran}}</td>
			                                    <td>{{$data2->target}}%</td>
			                                    <td>{{$data2->adequasi_effort}}%</td>
			                                    <td>{{$data2->adequasi_peformance}}%</td>
			                                    <td>{{$data2->sensitivitas}}</td>
			                                    <td>{{$data2->spesifitas}}</td>
			                                    <td>{{$data2->hasil}}</td>
			                                    <td style="width: 1%; ">
			                                    	<a href="{{route('data.edit2', ['id' => $data2->id, 'nama'=> $nama])}}" class="btn btn-warning btn-sm">&nbsp Edit &nbsp</a>
			                                    </td>
			                                    <td style="width: 1%;">
			                                    	<!-- <a href="javascript:void(0)" class="btn btn-danger btn-sm delete" id_delete="{{ $data2->id }}">delete</a> -->
			                                        <form action="{{action('DataController@destroy', $data2->id)}}" method="post">
				                                      @csrf
				                                      <input name="_method" type="hidden" value="DELETE">
				                                      <button class="btn btn-danger btn-sm" type="submit">Delete</button>
				                                    </form>
				                                </td>
			                                </tr>
		                            		@endif
		                            	@endforeach
		                            </tbody>
		                        </table>
		                        <!-- <form id="dataDelete" action="" method="POST">
		                        	{{ csrf_field() }}
		                        	<input name="id_data" type="text" hidden>
		                        </form> -->
		                        <!-- <form action="{{route('data.indi.chart2')}}" method="post">
                                      @csrf
                                      <input type="text" name="id" value="{{$id}}" hidden>
                                      <input type="text" name="nama" value="{{$nama}}" hidden>
                                      <input type="text" name="indi" value="{{$indikator->idindikator}}" hidden>
                                      <button class="btn btn-danger" type="submit">Chart</button>
                                </form> -->
		                        <a href="{{route('data.indi.chart', ['id' => $id, 'nama' => $nama, 'indi' => $indikator->nama_targetumur])}}" class="btn btn-primary btn-sm">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
		            </div>
		            @endforeach
		            @endif
<!-- end tampilan selain skdn -->
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
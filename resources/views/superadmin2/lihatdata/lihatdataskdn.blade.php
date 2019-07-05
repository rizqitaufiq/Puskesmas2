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
                            <li><a href="#">Lihatdata</a></li>
                            <li class="active">SKDN</li>
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
	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehoe">
						    	<strong class="card-title">D/S </strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehoe" class="collapse hide">
		                    <div class="card-body">
		                        <table id="TABLE_1" class="table table-striped table-bordered">
		                            <thead>
		                                <tr align="center">
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
		                                <tr>
		                                    <td>2011</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>tercapai</td>
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
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>tercapai</td>
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
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>tidak tercapai</td>
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
		                        <a href="{{route('skdn.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
		            </div>

	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehop">
						    	<strong class="card-title">N/D </strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehop" class="collapse hide">
		                    <div class="card-body">
		                        <table id="TABLE_2" class="table table-striped table-bordered">
		                            <thead>
		                                <tr align="center">
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
		                                <tr>
		                                    <td>2011</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>tercapai</td>
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
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>tercapai</td>
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
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>

		                                    <td>tidak tercapai</td>
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
		                        <a href="{{route('kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
	                </div>

	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehpr">
						    	<strong class="card-title">K/S </strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehpr" class="collapse hide">
		                    <div class="card-body">
		                        <table id="TABLE_3" class="table table-striped table-bordered">
		                            <thead>
		                                <tr align="center">
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
		                                <tr>
		                                    <td>2011</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>tercapai</td>
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
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>tercapai</td>
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
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>tidak tercapai</td>
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
		                        <a href="{{route('kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
	                </div>

	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehsn">
						    	<strong class="card-title">BGM/D</strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehsn" class="collapse hide">
		                    <div class="card-body">
		                        <table id="TABLE_4" class="table table-striped table-bordered">
		                            <thead>
		                                <tr align="center">
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
		                                <tr>
		                                    <td>2011</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>tercapai</td>
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
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>tercapai</td>
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
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>tidak tercapai</td>
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
		                        <a href="{{route('kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
	                </div>

	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehsp">
						    	<strong class="card-title">D/K</strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehsp" class="collapse hide">
		                    <div class="card-body">
		                        <table id="TABLE_5" class="table table-striped table-bordered">
		                            <thead>
		                                <tr align="center">
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
		                                <tr>
		                                    <td>2011</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>tercapai</td>
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
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>tercapai</td>
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
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>tidak tercapai</td>
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
		                        <a href="{{route('kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
	                </div>

	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehsp1">
						    	<strong class="card-title">N/S </strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehsp1" class="collapse hide">
		                    <div class="card-body">
		                        <table id="TABLE_6" class="table table-striped table-bordered">
		                            <thead>
		                                <tr align="center">
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
		                                <tr>
		                                    <td>2011</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>96</td>
		                                    <td>tercapai</td>
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
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>81</td>
		                                    <td>tercapai</td>
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
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>60</td>
		                                    <td>tidak tercapai</td>
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
		                        <a href="{{route('kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
		                    </div>
		                </div>
	                </div>
	            </div>
	       

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
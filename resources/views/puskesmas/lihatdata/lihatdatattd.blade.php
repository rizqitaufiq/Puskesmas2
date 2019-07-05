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
                            <li class="active">TTD</li>
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
                <div id="accordion">
	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehoe">
						    	<strong class="card-title">Pemberian Tablet Tambah Darah Ibu Hamil </strong>
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
			                                    <td>tercapai</td>
			                                    <td align ="center"><a href="#" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <a href="#" class="btn btn-danger">delete</a></td>
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    <td align ="center"><a href="#" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <a href="#" class="btn btn-danger">delete</a></td>
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    <td align ="center"><a href="#" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <a href="#" class="btn btn-danger">delete</a></td>
			                                </tr>
			                            </tbody>
		                        </table>
		                    </div>
		                </div>
	                </div>

	                <div class="card">
	                    <div class="card-header">
	                        <!-- <strong class="card-title">Hasil Adequasi Effort </strong> -->
	                        <a class="card-link" data-toggle="collapse" href="#collapsehop">
						    	<strong class="card-title">Pemberian Tablet Tambah Darah Remaja Putri </strong>
						    </a>
	                    </div>
<!-- 	                    <div id="collapsehoe" class="collapse show" data-parent="#accordion"> -->
	                    <div id="collapsehop" class="collapse hide">
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
			                                    <td>tercapai</td>
			                                    <td align ="center"><a href="#" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <a href="#" class="btn btn-danger">delete</a></td>
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    <td align ="center"><a href="#" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <a href="#" class="btn btn-danger">delete</a></td>
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    <td align ="center"><a href="#" class="btn btn-warning">&nbsp Edit &nbsp</a> 
			                                        <a href="#" class="btn btn-danger">delete</a></td>
			                                </tr>
			                            </tbody>
		                        </table>
		                    </div>
		                </div>
	                </div>

	            </div>
	        </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
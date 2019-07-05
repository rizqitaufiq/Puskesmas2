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
	                	<h1 class="card-header" style="margin: 10px 0px 5px 0px;">Data SKDN</h1>
	                    <div class="card" style="margin: 15px 25px 15px 25px;">
		                	<a class="card-link" data-toggle="collapse" href="#collapsehoe">
			                    <div class="card-header">
								    <strong class="card-title">D/S </strong>
			                    </div>
		                    </a>
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
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    
			                                </tr>
			                            </tbody>
			                        </table>
			                        <a href="{{route('user.kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
			                    </div>
			                </div>
		                </div>
		            

		                <div class="card" style="margin: 15px 25px 15px 25px;">
		                	<a class="card-link" data-toggle="collapse" href="#collapsehop">
			                    <div class="card-header">
								    <strong class="card-title">N/D </strong>
			                    </div>
		                    </a>
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
			                                    <th>Target</th>
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
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    
			                                </tr>
			                            </tbody>
			                        </table>
			                        <a href="{{route('user.kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
			                    </div>
			                </div>
		                </div>

		                <div class="card" style="margin: 15px 25px 15px 25px;">
		                	<a class="card-link" data-toggle="collapse" href="#collapsehpr">
			                    <div class="card-header">
								    <strong class="card-title">K/S </strong>
			                    </div>
		                    </a>
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
			                                    <th>Target</th>
			                                    
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
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    
			                                </tr>
			                            </tbody>
			                        </table>
			                        <a href="{{route('user.kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
			                    </div>
			                </div>
		                </div>

		                <div class="card" style="margin: 15px 25px 15px 25px;">
		                	<a class="card-link" data-toggle="collapse" href="#collapsehsn">
			                    <div class="card-header">
								    <strong class="card-title">BGM/D</strong>
			                    </div>
		                    </a>
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
			                                    <th>Target</th>
			                                    
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
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    
			                                </tr>
			                            </tbody>
			                        </table>
			                        <a href="{{route('user.kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
			                    </div>
			                </div>
		                </div>

		                <div class="card" style="margin: 15px 25px 15px 25px;">
		                	<a class="card-link" data-toggle="collapse" href="#collapsehsp">
			                    <div class="card-header">
								   <strong class="card-title">D/K</strong>
			                    </div>
		                    </a>
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
			                                    <th>Target</th>
			                                    
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
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    
			                                </tr>
			                            </tbody>
			                        </table>
			                        <a href="{{route('user.kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
			                    </div>
			                </div>
		                </div>

		                <div class="card" style="margin: 15px 25px 15px 25px;">
		                	<a class="card-link" data-toggle="collapse" href="#collapsehsp1">
			                    <div class="card-header">
								    <strong class="card-title">N/S </strong>
			                    </div>
		                    </a>
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
			                                    <th>Target</th>
			                                    
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
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2012</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>81</td>
			                                    <td>tercapai</td>
			                                    
			                                </tr>
			                                <tr>
			                                    <td>2013</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>60</td>
			                                    <td>tidak tercapai</td>
			                                    
			                                </tr>
			                            </tbody>
			                        </table>
			                        <a href="{{route('user.kadarzi.chart')}}" class="btn btn-primary">&nbsp Chart &nbsp</a>
			                    </div>
			                </div>
		                </div>
	            </div>
	       </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@endsection
<?php
$filename = 'Laporan Form Evaluasi Program '.$puskesmas[0]->nama_puskesmas.' ('.$tahun.')';
// header("Content-type: application/x-msdownload");
// header("Content-Disposition: attachment; filename=".$filename.".doc");
header('Content-Type: application/octet-stream');
header("Content-Disposition: attachment; filename=".$filename.".doc");
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<html lang="{{ app()->getLocale() }}">
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset("../../medica/img/core-img/favicon.ico") }} ">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	
	<!-- Site Title -->
	<title>Form Evaluasi Program</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.min.js'></script>
    
	<style type="text/css">
    			@media print {
    			    #Header, #Footer { display: none !important; }
    			}
    		.table{ border:2px solid gray; border-collapse:collapse; width:100%; }
    		.table th{ border:2px solid #CCC; background:#A9A9A9; padding:5px 3px 5px 3px;  color:#FFFFFF; font-size:13px}
    		.table td{ border:2px solid #CCC; padding:3px 2px; font-size:12px; background:#FFFFFF}
    </style>
</head>
<body style=" max-width: 100%; overflow-x: hidden; ">
    <div style="margin: 5% 10% 5% 10%">
        <div id="printableArea">
    		<h1><center>Laporan Form Evaluasi Program</center></h1>
            <br><br>

    		<b>Nama Puskesmas : </b> {{$puskesmas[0]->nama_puskesmas}}
    		<br><b>Tahun : </b> {{$tahun}}
    		<br><b>Tanggal Cetak : </b> <?php echo date("d-m-Y") ?>
    		<br>

            @foreach($program as $pr)
                @if($pr->nama_program == 'SKDN')
                    <h4 align="center"> {{$pr->nama_program}} </h4>

                    <table class="table">
                        <thead>
                            @php
                                $a = 0;
                            @endphp
                            <tr align="center">
                                <th style="width: 3%">No</th>
                                <th>Data S</th>
                                <th>Data K</th>
                                <th>Data D</th>
                                <th>Data N</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skdndata as $indi2)
                                <tr>
                                    <td align="center">{{$a+=1}}</td>
                                    <td align="center">&nbsp {{$indi2['Data_S']}}</td>
                                    <td align="center">{{$indi2['Data_K']}}</td>
                                    <td align="center">{{$indi2['Data_D']}}</td>
                                    <td align="center">{{$indi2['Data_N']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    

                    <table class="table">
                        <thead>
                            @php
                                $a = 0;
                            @endphp
                            <tr align="center">
                                <th style="width: 3%">No</th>
                                <th style="width: 27%">Jenis Kegiatan</th>
                                <th>Cakupan (%)</th>
                                <th>Target (%)</th>
                                <th>Adequasi of Effort (Kecukupan Upaya)</th>
                                <th>Adequasi of Performance (Kecukupan Kinerja)</th>
                                <th>Sensitivitas dan Spesifitas</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $indi)
                                @if($pr->nama_program == $indi['nama_program'])
                                    <tr>
                                        <td align="center">{{$a+=1}}</td>
                                        <td>&nbsp {{$indi['indikator']}} pada {{$indi['targetumur']}}</td>
                                        <td align="center">{{$indi['cakupan']}}%</td>
                                        <td align="center">{{$indi['target']}}%</td>
                                        <td align="center">{{$indi['adequasi_effort']}}%</td>
                                        <td align="center">{{$indi['adequasi_peformance']}}%</td>
                                        <td align="center">{{$indi['sensitivitas']}}</td>
                                        <td align="center">{{$indi['spesifitas']}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>  
                    
                @else
                <h4 align="center"> {{$pr->nama_program}} </h4>
                    <table class="table">
                        <thead>
                            @php
                                $a = 0;
                            @endphp
                            <tr align="center">
                                <th style="width: 3%">No</th>
                                <th style="width: 27%">Jenis Kegiatan</th>
                                <th>Pencapaian (N)</th>
                                <th>Cakupan (%)</th>
                                <th>Jumlah Sasaran (N)</th>
                                <th>Target (%)</th>
                                <th>Adequasi of Effort (Kecukupan Upaya)</th>
                                <th>Adequasi of Performance (Kecukupan Kinerja)</th>
                                <th>Sensitivitas dan Spesifitas</th>
                                <th>Kategori</th>
                                <th>Hasil</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $indi)
                                @if($pr->nama_program == $indi['nama_program'])
                                    <tr>
                                        <td align="center">{{$a+=1}}</td>
                                        <td>&nbsp {{$indi['indikator']}} pada {{$indi['targetumur']}}</td>
                                        <td align="center">{{$indi['pencapaian']}}</td>
                                        <td align="center">{{$indi['cakupan']}}%</td>
                                        <td align="center">{{$indi['total_sasaran']}}</td>
                                        <td align="center">{{$indi['target']}}%</td>
                                        <td align="center">{{$indi['adequasi_effort']}}%</td>
                                        <td align="center">{{$indi['adequasi_peformance']}}%</td>
                                        <td align="center">{{$indi['sensitivitas']}}%</td>
                                        <td align="center">{{$indi['spesifitas']}}%</td>
                                        <td align="center">{{$indi['hasil']}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>  
                @endif
            @endforeach
        </div>             
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</html>
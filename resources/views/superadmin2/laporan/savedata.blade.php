<?php
$filename = 'Laporan Form Evaluasi tahun 2012';
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
        <style type="text/css">
            @media print {
                #Header, #Footer { display: none !important; }
            }
        .table{ border:2px solid gray; border-collapse:collapse; width:100%; }
        .table th{ border:2px solid #CCC; background:#A9A9A9; padding:5px 3px 5px 3px;  color:#FFFFFF; font-size:13px}
        .table td{ border:2px solid #CCC; padding:3px 2px; font-size:12px; background:#FFFFFF}
</style>
    </head>
    <body style=" max-width: 100%; overflow-x: hidden;">
        <h1><center>Laporan Form Evaluasi Program</center></h1>

        <b>Nama Puskesmas : </b> Puskesmas Dinoyo
        <br><b>Tahun : </b>2011
        <br><b>Tanggal Cetak : </b>22-06-2019
        <br>
        <h4 align="center"> KADARZI </h4>
        <table class="table">
            <thead>
                <tr align="center">
                    <th>Jenis Kegiatan</th>
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
                    <td>Menimbang berat badan secara teratur (Bayi (0-6 bulan))</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>

                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>Menimbang berat badan secara teratur(Baduta (6-11 bulan))</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    
                    <td>81</td>
                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>Menimbang berat badan secara teratur (Balita (12-60 Bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Pemberian asi ekslusif bayi usia 0-6 bulan (Bayi (0-6 Bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Makan makanan beraneka ragam (Keluarga)</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Menggunakan garam beryodium (Keluarga)</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Pemberian vitamin A (Balita (12-60 Bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Pemberian vitamin A (Baduta (6-11 Bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Pemberian vitamin A (Ibu Nifas)</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Pemberian tablet tambah darah (Ibu Hamil)</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>Pemberian tablet tambah darah (Remaja Putri)</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
            </tbody>
        </table>
        <h4 align="center"> SKDN </h4>
        <table class="table">
            <thead>
                <tr align="center">
                    <th>Jenis Kegiatan</th>
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
                    <td>K/S (Balita (12-60 bulan))</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>

                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>D/S (Balita (12-60 bulan))</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>D/K (Balita (12-60 bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>N/S (Balita (12-60 bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>N/D (Balita (12-60 bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
                <tr>
                    <td>BGM/D (Balita (12-60 bulan))</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>tidak tercapai</td>
                    
                </tr>
            </tbody>
        </table>
        <h4 align="center"> PMT </h4>
        <table class="table">
            <thead>
                <tr align="center">
                    <th>Jenis Kegiatan</th>
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
                    <td>pemberian makanan tambahan gizi kurang (Baduta (6-11 Bulan))</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    
                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>pemberian makanan tambahan gizi kurang (Balita (12-60 Bulan))</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    
                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>Pemberian Makanan Tambahan ibu hamil KEK (Ibu Hamil)</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    <td>60</td>
                    
                    <td>tidak tercapai</td>
                    
                </tr>
            </tbody>
        </table>
        <h4 align="center"> TTD </h4>
        <table class="table">
            <thead>
                <tr align="center">
                    <th>Jenis Kegiatan</th>
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
                    <td>Pemberian Tablet  Tambah Darah(Ibu Hamil)</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    <td>96</td>
                    
                    <td>tercapai</td>
                </tr>
                <tr>
                    <td>Pemberian Tablet  Tambah Darah (Remaja Putri)</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    <td>81</td>
                    
                    <td>tercapai</td>
                </tr>
                
            </tbody>
        </table>
    </body>
</html>
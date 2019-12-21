@extends($extends)

@section($section)
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
                            <li><a href="#">Rekomendasi</a></li>
                            <li class="active">Kadarzi</li>
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
	                		<a class="card-link">
						    	<strong class="card-title">Rekomendasi</strong>
						    </a>
	                	</div>
	                	<div class="vue-lists">
	                		<h4 class="card-body" style="padding-bottom: 0 ">
	                			<strong>Jika Belum Mencapai Target (turun/ rendah)</strong>
	                		</h4>
                            <ul style="margin-left: 15px;">
                            	<li class="card-body" style="padding: 10px 10px 0 15px">
                                    <strong> Menimbang Berat Badan Secara Teratur</strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Dilakukan pembinaan, pelatihan, sosialisasi pada kader dan masyarakat mengenai menimbang berat badan secara teratur .
	                                	</li>
	                                </ul>
                                </li>
                                <li class="card-body" style="padding: 10px 10px 0 15px">
                                    <strong> Pemberian Asi Eksklusif pada bayi usia 0 – 6 bulan </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Dilakukan sosialasi mengenai  program pemberian Asi Eksklusif pada lintas sektor, tenaga kesehatan dan sarana kesehatan, tempat kerja, tempat umum, dan masyarakat.
	                                	</li>
	                                	<li>
	                                		Melakukan penyuluhan, konseling, atau pendampingan kepada ibu dan keluarganya sejak pertama kali memeriksakan kandungan.
	                                	</li>
	                                	<li>
	                                		Menyediakan ketersediaan akses terhadap informasi dan edukasi mengenai Asi Eksklusif.
	                                	</li>
	                                </ul>
                                </li>
                                <li class="card-body" style="padding: 10px 10px 0 15px">
                                    <strong> Makan Beraneka Ragam </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Dilakukan sosialisasi  pada lintas sektor dan kader mengenai makan beraneka ragam serta dilakukan pendampingan keluarga pada masyarakat mengenai makanan beraneka ragam.
	                                	</li>
	                                </ul>
                                </li>
                                <li class="card-body" style="padding: 10px 10px 0 15px">
                                    <strong> Menggunakan Garam Beryodium </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Dilakukan pembinaan dan penyuluhan pada masyarakat mengenai garam beryodium, serta dilakukan survey dan tes yodium garam di tingkat rumah tangga dan sekolah.
	                                	</li>
	                                </ul>
                                </li>
                                <li class="card-body" style="padding: 10px 10px 20px 15px">
                                   <strong>  Minum Sumplemen Gizi </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	<strong> Pemberian Tablet Fe </strong>
	                                    	<ul >
	                                    		<li>
	                                    			<strong> Pemberian Tablet Fe ibu hamil </strong>
	                                    			<ul class="vue-list-inner">
	                                    				<li>
	                                    					Dilakukan sosialisasi kepada bidan desa atau kelurahan dan kader mengenai program tablet fe. Dilakukan penyuluhan, konseling, dan pendampingan  pada ibu hamil  mengenai tablet fe dan kesehatan ibu hamil.  dilakukan pencatatan dan pelaporan kegiatan distribusi pemberian fe, mendata ibu hamil yang menerima, dan yang meminum tablet fe. Melakukan kunjungan kerumah – rumah untuk pemantauan konsumsi tablet FE.
	                                    				</li>
	                                	            </ul>
	                                    		</li>
	                                    		<li>
	                                    			<strong> Pemberian Tablet Fe Remaja Putri </strong>
	                                    			<ul class="vue-list-inner">
	                                    				<li>
															Dilakukan sosialisasi kepada lintas program dan sektor mengenai tablet FE.
														</li>
														<li> 
															Dilakukan penyuluhan, konseling, dan pembinaan deteksi dini kepada keluarga remaja, guru sekolah dan sasaran mengenai tablet fe, serta mendata remaja putri yang menerima dan meminum tablet FE.
	                                    				</li>
	                                    			</ul>
	                                    		</li>
	                                    	</ul>
	                                	</li>
	                                	<li>
	                                    	<strong> Pemberian Vitamin A </strong>
	                                    	<ul >
	                                    		<li>
	                                    			<strong> Pemberian Kapsul Vitamin A </strong>
	                                    			<ul class="vue-list-inner">
	                                    				<li>
	                                    					Dilakukan penyuluhan dan  konseling pada ibu nifas mengenai kapsul vitamin A.
	                                    				</li>
	                                    				<li>
	                                    					Dilakukan pencatatan dan pelaporan kegiatan distribusi kapsul vitamin A, mendata ibu nifas yang menerima dan yang meminum kapsul vitamin A.
	                                    				</li>
	                                    				<li>
	                                    					Melakukan kunjungan kerumah – rumah untuk pemantauan konsumsi kapsul vitamin A dan memberikan kapsul vitamin A jika belum mendapatkannya
	                                    				</li>
	                                    			</ul>
	                                    		</li>
	                                    		<li>
	                                    			<strong> Pemberian vitamin A balita </strong>
	                                    			<ul class="vue-list-inner">
	                                    				<li>
															Dilakukan penyuluhan dan  konseling  pada ibu balita mengenai kapsul vitamin A.
														</li>
														<li> 
															Dilakukan pencatatan dan pelaporan kegiatan distribusi kapsul vitamin A, mendata balita yang menerima dan yang meminum kapsul vitamin A.
	                                    				</li>
	                                    				<li>
	                                    					Melakukan kunjungan kerumah – rumah untuk pemantauan konsumsi kapsul vitamin A dan memberikan kapsul vitamin A jika belum mendapatkannya.
	                                    				</li>
	                                    			</ul>
	                                    		</li>
	                                    	</ul>
	                                	</li>
	                                </ul>
                                </li>
                          </ul>
                         <!--  <h4 class="card-body" style="padding-bottom: 0 "><strong>Jika Sudah Mencapai Target (naik)</strong></h4>
                            <ul style="margin-left: 15px;padding-right: 30px" class="vue-list-inner" align = "justify">
                                <li class="card-body" style="padding: 10px 0 20px 15px">
                                    Mempertahankan dan meningkatkan program yang telah berjalan.
                                </li>
                          </ul> -->
                      </div>
	                </div>
		        </div>
			</div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
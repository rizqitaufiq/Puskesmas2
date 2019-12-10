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
                <div id="accordion">
	                <div class="card">
	                	<div class="card-header">
	                		<a class="card-link">
						    	<strong class="card-title">Rekomendasi</strong>
						    </a>
	                	</div>
	                	<div class="vue-lists">
	                		<h4 class="card-body" style="padding-bottom: 0 "><strong>Jika Belum Mencapai Target</strong></h4>
                            <ul style="margin-left: 15px">
                                <li class="card-body" style="padding: 10px 0 0 15px">
                                    Pembinaan dan pelatihan posyandu.
                                </li>
                                <li class="card-body" style="padding: 10px 0 0 15px">
                                	Motivasi Kader, Ibu Hamil, dan Ibu Balita.
                                </li>
                                <li class="card-body" style="padding: 10px 0 0 15px">
                            		Dukungan tokoh masyarakat dan swadaya masyarakat dalam kegiatan posyandu serta membantu dalam menggiatkan kader dalam mengelola kegiatan Posyandu.
                            	</li>
                            	<li class="card-body" style="padding: 10px 0 0 15px">
                            		Kegiatan tambahan.
                            	</li>
                            	<li class="card-body" style="padding: 10px 0 0 15px">
                            		Mengoptimalkan kelas ibu hamil dan kelas ibu balita.
                            	</li>
                            	<li class="card-body" style="padding: 10px 0 0 15px">
                            		Sertifikasi bagi kader aktif.
                            	</li>
                            	<li class="card-body" style="padding: 10px 0 0 15px">
                            		Penyuluhan kepada kader dan ibu balita tentang makna penimbangan.
                            	</li>
                            	<li class="card-body" style="padding: 10px 0 0 15px">
                            		Penguatan koordinasi lintas program dan lintas sektor.
                            	</li>
								<li class="card-body" style="padding: 10px 0 0 15px">
                            		Pemberian PMT (Pemberian Makanan Tambahan) pada balita dengan gizi kurang.
                            	</li>    
                            	<li class="card-body" style="padding: 10px 0 0 15px">
                            		Melakukan pendampingan kepada balita yang menerima PMT untuk mengetahui bahwa PMT telah dikonsumsi oleh balita yang tepat serta memantau pertumbuhan dan perkembangan balita.
                            	</li>
                                <li class="card-body" style="padding: 10px 0 0 15px">
                                    Mengoptimalkan jumlah kader sesusai persyaratan dalam pedoman Pengelolaan Posyandu.
                                </li>
                                <li class="card-body" style="padding: 10px 0 0 15px">
                                    Perlu evaluasi terhadap keterampilan kader dalam pengukuran.
                                </li>
                                <li class="card-body" style="padding: 10px 0 0 15px">
                                    Perhatikan kondisi alat antrophometri mengenai kelayakan dan kesesuaian penggunaan.
                                </li>
                          </ul>
                          <h4 class="card-body" style="padding-bottom: 0 "><strong>Jika Sudah Mencapai Target</strong></h4>
                            <ul style="margin-left: 15px">
                                <li class="card-body" style="padding: 10px 0 0px 15px">
                                    Mempertahankan metode yang sudah dilakukan dan tetap dilakukan pemantauan secara terus menerus dan sistematis.
                                </li>
                                <li class="card-body" style="padding: 10px 0 0px 15px">
                                    Tetap menjalin kerja sama dengan masyarakat dengan baik.
                                </li>
                                <li class="card-body" style="padding: 10px 0 20px 15px">
                                    Tetap mengikuti pedoman yang sudah berlaku.
                                </li>
                          </ul>
                      </div>
	                </div>
		        </div>
			</div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
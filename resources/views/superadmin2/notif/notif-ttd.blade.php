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
                            <li class="active">Tablet Tambah Darah</li>
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
	                			<strong>Jika Belum Mencapai Target</strong>
	                		</h4>
                            <ul style="margin-left: 15px;">
                                <li class="card-body" style="padding: 10px 10px 0 15px">
                                  <strong> Rekomendasi Distribusi tablet Fe untuk ibu hamil </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
                                        <li>
                                            Diperlukan penyuluhan kesehatan dengan didukung materi Komunikasi, Informasi dan Edukasi (KIE) yang tepat untuk tenaga kesehatan.
                                        </li>
	                                    <li>
	                                    	Tenaga kesehatan Puskesmas harus aktif dalam melayani ibu hamil yang datang, selain memberikan tablet Fe, tenaga kesehatan juga sebaiknya memberi edukasi mengenai manfaat dan dampak tablet Fe untuk ibu hamil dan memastikan ibu hamil tersebut benar benar mengonsumsi tablet Fe.
	                                	</li>
	                                    <li>
	                                    	Untuk ibu hamil yang tidak datang di Puskesmas, Tenaga kesehatan mendata jumlah ibu hamil melalui kader serta meyakinkan ibu hamil agar memperiksakan kehamilannya ke Puskesmas agar mendapat tablet Fe.
	                                    </li>
	                                </ul>
                                </li>
                                <li class="card-body" style="padding: 10px 0 20px 15px">
                                    <strong> Rekomendasi Distribusi tablet Fe untuk Remaja putri </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Petugas kesehatan memberikan penyuluhan ke sekolah sekolah tentang anemia dan menjelaskan manfaat tablet Fe bagi remaja putri, serta pihak sekolah  dihimbau untuk mendistribusikan tablet Fe sesuai dengan anjuran dan memastikan setiap siswi mendapat dan mengonsumsi tablet Fe.
	                                	</li>
	                                </ul>
                                </li>
                          </ul>
                          <!-- <h4 class="card-body" style="padding-bottom: 0 "><strong>Jika Sudah Mencapai Target</strong></h4>
                            <ul style="margin-left: 15px;padding-right: 30px" class="vue-list-inner" align = "justify">
                                <li class="card-body" style="padding: 10px 0 20px 15px">
                                    Mempertahankan dengan cara memberikan tablet tersebut secara rutin dan tetap mengawasi Remaja putri mengonsumsinya.
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
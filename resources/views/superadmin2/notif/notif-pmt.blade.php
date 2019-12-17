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
                            <li class="active">Pemberian Makanan Tambahan</li>
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
                                  <strong>   Rekomendasi Program PMT untuk Balita </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Melakukan kegiatan sosialisasi dan penyuluhan  kepada ibu balita yang dilakukan oleh tenaga kesehatan agar ibu balita mengetahui pentingnya Pemberian Makanan Tambahan. Sosialisasi dan penyuluhan dapat dilakukan ketika melakukan pembagian PMT.
	                                	</li>
	                                    <li>
	                                    	Melakukan pendampingan kepada balita yang menerima PMT untuk mengetahui bahwa PMT telah dikonsumsi oleh balita yang tepat serta memantau pertumbuhan dan perkembangan balita.
	                                    </li>
	                                    <li>
	                                    	Membuat kelompok yang beranggotakan ibu balita untuk memudahkan tenaga kesehatan dalam mendata jumlah balita yang mendapat PMT.
	                                    </li>
	                                    <li>
	                                    	Meningkatkan pengawasan terhadap pelaksanaan program PMT.
	                                    </li>
	                                </ul>
                                </li>
                                <li class="card-body" style="padding: 10px 0 20px 15px">
                                    <strong> Rekomendasi Program PMT untuk Ibu Hamil </strong>
                                    <ul class="vue-list-inner" align = "justify" style="padding-right: 30px">
	                                    <li>
	                                    	Melakukan kegiatan sosialisasi dan penyuluhan  kepada ibu hamil yang dilakukan oleh tenaga kesehatan agar ibu hamil mengetahui pentingnya Pemberian Makanan Tambahan. Sosialisasi dan penyuluhan dapat dilakukan ketika melakukan pembagian PMT.
	                                	</li>
	                                	<li>
	                                    	Melakukan pendampingan kepada ibu hamil yang menerima PMT untuk mengetahui bahwa PMT telah dikonsumsi oleh ibu hamil yang tepat serta memantau pertumbuhan dan perkembangan ibu ham.
	                                	</li>
	                                	<li>
	                                    	Membuat kelompok yang beranggotakan ibu hamil untuk memudahkan tenaga kesehatan dalam mendata jumlah ibu hamil yang mendapat PMT.
	                                	</li>
	                                	<li>
	                                    	Meningkatkan pengawasan terhadap pelaksanaan program PMT.
	                                	</li>
	                                </ul>
                                </li>
                          </ul>
                          <!-- <h4 class="card-body" style="padding-bottom: 0 "><strong>Jika Sudah Mencapai Target</strong></h4>
                            <ul style="margin-left: 15px;padding-right: 30px" class="vue-list-inner" align = "justify">
                                <li class="card-body" style="padding: 10px 0 20px 15px">
                                    Mempertahankan metode yang sudah dilakukan, memberikan PMT kepada sasaran balita yang tepat secara rutin serta tetap memantau balita yang mengonsumsinya.
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
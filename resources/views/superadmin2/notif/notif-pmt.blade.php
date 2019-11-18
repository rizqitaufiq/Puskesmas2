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
                            <li><a href="#">Rekomendasi</a></li>
                            <li class="active">Penberian Makan Tambah</li>
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
						    	<strong class="card-title">Rekomendasi </strong>
						    </a>
	                	</div>
	                    <div class="card-body" style="padding: 10px 0 0 15px">
	                        <a class="card-link">
						    	<strong class="card-title">Melakukan kegiatan sosialisasi dan penyuluhan  kepada ibu balita yang dilakukan oleh tenaga kesehatan agar ibu balita mengetahui pentingnya Pemberian Makanan Tambahan. Sosialisasi dan penyuluhan dapat dilakukan ketika melakukan pembagian PMT
									</strong>
						    </a>
	                    </div>

	                    <div class="card-body" style="padding: 10px 0 0 15px">
	                        <a class="card-link">
						    	<strong class="card-title">Melakukan pendampingan kepada balita yang menerima PMT untuk mengetahui bahwa PMT telah dikonsumsi oleh balita yang tepat serta memantau pertumbuhan dan perkembangan balita</strong>
						    </a>
	                    </div>

	                    <div class="card-body" style="padding: 10px 0 0 15px">
	                        <a class="card-link">
						    	<strong class="card-title">Membuat kelompok yang beranggotakan ibu balita untuk memudahkan tenaga kesehatan dalam mendata jumlah balita yang mendapat PMT</strong>
						    </a>
	                    </div>

	                    <div class="card-body" style="padding: 10px 0 10px 15px">
	                        <a class="card-link">
						    	<strong class="card-title">Meningkatkan pengawasan terhadap pelaksanaan program PMT</strong>
						    </a>
	                    </div>
	                     
	                </div>
		        </div>
			</div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
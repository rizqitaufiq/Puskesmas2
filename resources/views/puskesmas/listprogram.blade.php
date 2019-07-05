@extends('puskesmas.layouts.template')
@section('main')
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
                	<h1 class="card-header" style="margin: 10px 0px 5px 0px;">List Program</h1>
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('listprogram.skdn')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">SKDN</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('listprogram.kadarzi')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">KADARZI</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('pmt.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">PMT</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('ttd.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;"> TAMBAH DARAH</h3> </strong>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

@endsection
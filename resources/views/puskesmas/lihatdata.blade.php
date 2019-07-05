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
                	<h1 class="card-header" style="margin: 10px 0px 5px 30px;">Data Puskesmas</h1>
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Kedungkandang</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Gribig</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;"> Puskesmas Arjowinangun</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;"> Puskesmas Janti</h3> </strong>
                            </div>
                        </a>
                    </div>
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Ciptomulyo</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Mulyorejo</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('pmt.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Arjuno</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('ttd.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Bareng</h3> </strong>
                            </div>
                        </a>
                    </div>
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('skdn.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Rampal Celaket</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('kadarzi.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;"> Puskesmas Dinoyo</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('pmt.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Mojolangu</h3> </strong>
                            </div>
                        </a>
                    </div>

                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('ttd.index')}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">Puskesmas Kendalsari</h3> </strong>
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
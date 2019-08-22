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
                    @php
                        $a = 0;
                    @endphp
                    @foreach($user as $user)
                    <div class="card" style="margin: 15px 25px 15px 25px;">
                        <a class="card-link" href="{{route('puskesmas.listprogram', $user->nama_puskesmas)}}">
                            <div class="card-header">
                                    <strong class="card-title"><h3 style="color: #007bff;">{{$user->puskesmas}}</h3> </strong>
                            </div>
                        </a>
                    </div>
                    @endforeach
                                        
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

@endsection
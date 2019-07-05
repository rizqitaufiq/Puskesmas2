@extends('superadmin2.layouts.2template')

@section('konten2')
<!-- Bread crumb -->
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
                            <li><a href="#">Indikator</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-primary">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Edit Data Indikator</strong>
                    </div>
                    <div class="card-body">
                        <form class="form p-t-20" method="POST" action="{{ route('indikator.update', $indikator[0]->id) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Program</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-suitcase"></i></div>
                                    <select name="nama_program" id="select_indikator" class="form-control" disabled>
                                        <option value="{{$indikator[0]->id}}">{{$indikator[0]->nama_program}}</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputuname">Nama Indikator</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-suitcase"></i></div>
                                    <input name="nama_indikator" type="text" class="form-control" id="exampleInputuname" value="{{$indikator[0]->nama_indikator}}" required>
                                </div>
                            </div>
                           
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                            <a href="{{ route('indikator.index')}}" class="btn btn-danger waves-effect waves-light m-r-10">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
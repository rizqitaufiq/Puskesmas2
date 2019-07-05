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
                            <li><a href="#">User</a></li>
                            <li class="active">Tambah User</li>
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
                        <strong class="card-title">Tambah Data User</strong>
                    </div>
                    <div class="card-body">
                        <form class="form p-t-20" method="POST" action="{{ route('dashboard.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputuname">Nama</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input name="nama" type="text" class="form-control" id="exampleInputuname" placeholder="Masukkan Nama">
                    </div>
                </div>
                <div class="form-group has-success">
                    <label class="control-label">E-mail</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputuname">Nama Puskesmas</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-home"></i></div>
                        <select name="puskesmas" id="select_indikator" class="form-control">
                            <<option value="">Pilih salah satu</option>}
                            option
                            @foreach($puskesmas as $puskesmas)
                            <option value="{{$puskesmas->id}}">
                                {{$puskesmas->nama_puskesmas}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi Password" required>
                    </div>
                </div>
                <div class="form-group has-success">
                    <div class="input-group">
                        <input type="text" name="pos" value="admin" hidden>
                    </div>
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Create</button>
                <a href="{{ route('dashboard.index')}}" class="btn btn-danger waves-effect waves-light m-r-10">Cancel</a>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
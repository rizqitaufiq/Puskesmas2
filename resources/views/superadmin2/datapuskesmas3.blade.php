@extends('superadmin2.layouts.2template')

@section('konten2')
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
                            <li><a href="#">Lihat Data</a></li>
                            <li class="active">Data Puskesmas</li>
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
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Puskesmas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 0;
                                @endphp
                                
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas KedungKandang</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Gribig</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Arjowinangun</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Janti</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas CiptoMulyo</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Mulyorejo</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Arjuno</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Bareng</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Rampal Celaket</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Cisadea</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Pandanwangi</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Dinyoyo</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Kendalsari</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Mojolangu</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">Puskesmas Kendalkerep</td>
                                    <td align ="center"><a href="{{route('pmt.index')}}" class="btn btn-warning">Lihat</a> 
                                        <a href="#" class="btn btn-danger">delete</></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
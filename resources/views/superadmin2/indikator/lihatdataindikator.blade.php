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
                            <li class="active">Indikator</li>
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
                        <strong class="card-title">Data Indikator</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Program</th>
                                    <th>Indikator</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 0;
                                @endphp
                                @foreach($data as $indikator)
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">{{$indikator->nama_program}}</td>
                                    <td align ="center">{{$indikator->nama_indikator}}</td>
                                    <td align ="center"><a href="{{route('indikator.edit', $indikator->id)}}" class="btn btn-warning">ubah</a> 
                                        <a href="indikator/{{ $indikator->id }}/delete" class="btn btn-danger">hapus</a></td>
                                </tr>
                                
                                @endforeach
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">SKDN</td>
                                    <td align ="center">D/S</td>
                                    <td align ="center"><a href="{{route('indikator.edit', 1)}}" class="btn btn-warning">Edit</a> 
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
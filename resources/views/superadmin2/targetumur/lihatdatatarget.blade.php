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
                            <li class="active">Target Umur</li>
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
                        <strong class="card-title">Data Target Umur</strong>
                    </div>
                    <div class="card-body">
                         <div>
                            <a href="{{route('target.create')}}" class="btn btn-primary"> Tambah Target Umur </a><br><br>
                        </div>
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Nama Program</th>
                                    <th>Nama Indikator</th>
                                    <th>Target Umur</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 0;
                                @endphp
                                @foreach($data as $target)
                                <tr>
                                    <td align ="center">{{$a+=1}}</td>
                                    <td align ="center">{{$target->nama_program}}</td>
                                    <td align="center">{{$target->nama_indikator}}</td>
                                    <td align="center">{{$target->nama_targetumur}}</td>
                                    <td align ="center"><a href="{{route('target.edit', $target->id)}}" class="btn btn-warning">ubah</a> 
                                        <a href="target/{{ $target->id }}/delete" class="btn btn-danger">hapus</a></td>
                                </tr>
                                @endforeach
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
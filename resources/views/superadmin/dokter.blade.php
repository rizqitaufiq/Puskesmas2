@extends('superadmin.layouts.template')

@section('konten')
<!-- Bread crumb -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-primary">Dashboard</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
<!-- Start Page Content -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Doctor Data</h4>
                <div class="table-responsive m-t-20">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Doctor Name</th>
                                <th>No Handphone</th>
                                <th>Gender</th>
                                <th>Specialist</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <td colspan="2" style="font-weight:bold" >Action</td>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
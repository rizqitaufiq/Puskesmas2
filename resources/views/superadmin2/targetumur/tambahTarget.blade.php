@extends('superadmin2.layouts.2template')

@section('konten2')
<!-- https://www.webslesson.info/2018/03/ajax-dynamic-dependent-dropdown-in-laravel.html -->
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
                            <li><a href="#">Target Umur</a></li>
                            <li class="active">Tambah Target Umur</li>
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
                        <strong class="card-title">Tambah Target Umur</strong>
                    </div>
                    <div class="card-body">
                        <form class="form p-t-20" method="POST" action="{{ route('target.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputuname">Nama Program</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-suitcase"></i></div>
                        <select name="program" id="nama_program" class="form-control dynamic" data-dependent="nama_indikator" required>
                            <option value="">Pilih salah satu</option>
                             @foreach($program as $program)
                            <option value="{{$program->id}}">{{$program->nama_program}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputuname">Nama Indikator</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-suitcase"></i></div>
                        <select name="indikator" id="nama_indikator" class="form-control" required>
                            <option value="">Pilih salah satu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">Target Umur</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" id="target" name="target" placeholder="Masukkan Target Umur" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Create</button>
                <a href="{{ route('program.index')}}" class="btn btn-danger waves-effect waves-light m-r-10">Batal</a>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>


<script>
$(document).ready(function(){
    $('.dynamic').change(function(){
        if($(this).val() != ''){
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{ route('target.fetch') }}",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result){
                    $('#'+dependent).html(result);
                }
            })
        }
    });
    $('#nama_program').change(function(){
        $('#nama_indikator').html('<option value="">Pilih salah satu</option>');
    });
});
</script>
@stop
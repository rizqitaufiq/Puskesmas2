@extends($extends)

@section($section)
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
                            <li><a href="#">Masukkan Data</a></li>
                            <li class="active">Data S K D N</li>
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
                @if(Session::has('alert-success'))
                    <div class="alert alert-primary">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tambah Data S K D N</strong>
                    </div>
                    <div class="card-body">
                        <form class="form p-t-20" method="POST" action="{{ route('data.store') }}" enctype="multipart/form-data">
			                {{ csrf_field() }}
			                <div class="form-group">
			                    <label for="exampleInputuname">Data S</label>
			                    <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                    <input type="number" id="data_s" step="any" name="data_s" placeholder="Masukkan Data S" class="form-control" required>
                                </div>
			                </div>
			                <div class="form-group has-success">
			                    <label class="control-label">Data K</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
			                        <input type="number" id="data_k" step="any" name="data_k" placeholder="Masukkan Data K" class="form-control" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="exampleInputuname">Data D</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
			                        <input name="data_d" type="number" step="any" class="form-control" id="data_d" placeholder="Masukkan Data D" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Data N</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
			                        <input type="number" id="data_n" name="data_n" placeholder="Masukkan Data N" class="form-control" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Tahun</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			                        <input type="number" id="tahun" name="tahun" placeholder="Masukkan Tahun" class="form-control" required>
			                    </div>
			                </div>
                            <input type="number" id="nama_program" name="program" value="" hidden>
			                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Input</button>
			                <a href="{{ route('data.input')}}" class="btn btn-danger waves-effect waves-light m-r-10">Cancel</a>
			            </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
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
                            <li class="active">TTD</li>
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
                        <strong class="card-title">Tambah Data TTD</strong>
                    </div>
                    <div class="card-body">
                        <form class="form p-t-20" method="POST" action="{{ route('pmt.store') }}" enctype="multipart/form-data">
			                {{ csrf_field() }}
			                <div class="form-group">
			                    <label class="control-label">Indikator</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                        <select name="indikator" class="form-control" required>
										<option value="Pemberian Tablet  Tambah Darah">Pemberian Tablet  Tambah Darah</option>
									</select>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Target</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                        <select name="target" class="form-control" required>
			                        	<option value="">Pilih salah satu</option>
									  	<option value="ibu hamil">Ibu Hamil</option>
									  	<option value="remaja putri">Remaja Putri</option>
									</select>
			                    </div>
			                </div>
			                <div class="form-group has-success">
			                    <label class="control-label">Target Pencapaian</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
			                        <input type="number" id="target_pencapaian" name="target_pencapaian" placeholder="Masukkan Target Pencapaian" class="form-control" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="exampleInputuname">Pencapaian</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
			                        <input name="pencapaian" type="number" class="form-control" id="exampleInputuname" placeholder="Masukkan Pencapaian" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Total Sasaran</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
			                        <input type="number" id="total_sasaran" name="total_sasaran" placeholder="Masukkan Total Sasaran" class="form-control" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Target Sasaran</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-bullseye"></i></div>
			                        <input id="target_sasaran" type="number" class="form-control" name="target_sasaran" placeholder="Masukkan Target Sasaran" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Tahun</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			                        <input type="number" id="tahun" name="tahun" placeholder="Masukkan Tahun" class="form-control" required>
			                    </div>
			                </div>
			                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Input</button>
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
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
                            <li class="active">{{$program}}</li>
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
                        <strong class="card-title">Tambah Data {{$program}}</strong>
                    </div>
                    <div class="card-body">
                        @if($program == 'SKDN')
                        <div>
                            <a href="{{route ('skdn.input')}}" class="btn btn-primary"> Tambah S K D N </a><br><br>
                        </div>
                        <form class="form p-t-20" method="POST" action="{{ route('data.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputuname">Indikator</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <select name="indikator" id="nama_indikator" class="form-control dynamic" data-dependent="nama_targetumur" required>
                                        <option value="">Pilih salah satu</option>
                                        @foreach($indikator as $indikator)
                                            <option value="{{$indikator->id}}">{{$indikator->nama_indikator}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputuname">Target Indikator</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <select name="target" id="nama_targetumur" class="form-control" required>
                                        <option value="">Pilih salah satu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputuname">Cakupan (%)</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
                                    <input name="cakupan" type="number" step="any" class="form-control" id="cakupan" placeholder="Masukkan Cakupan" required>
                                </div>
                            </div>
                            <div class="form-group has-success">
                                <label class="control-label">Target (%)</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-users"></i></div>
                                    <input type="number" id="target" step="any" name="target" placeholder="Masukkan Target" class="form-control" required>
                                </div>
                            </div>
                                <input type="text" step="any" id="total_sasaran" name="total_sasaran" placeholder="Masukkan Total Sasaran" class="form-control" value="-" hidden>
                                <input id="pencapaian" step="any" type="text" class="form-control" name="pencapaian" placeholder="Masukkan Target Sasaran" value="-" hidden>
                            <div class="form-group">
                                <label class="control-label">Tahun</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="number" id="tahun" name="tahun" placeholder="Masukkan Tahun" class="form-control" required>
                                </div>
                            </div>
                            <input type="number" id="nama_program" name="program" value="{{$id[0]->id}}" hidden>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Input</button>
                            <a href="{{ route('data.input')}}" class="btn btn-danger waves-effect waves-light m-r-10">Cancel</a>
                        </form>
                        @else
                        <form class="form p-t-20" method="POST" action="{{ route('data.store') }}" enctype="multipart/form-data">
			                {{ csrf_field() }}
			                <div class="form-group">
			                    <label for="exampleInputuname">Indikator</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                        <select name="indikator" id="nama_indikator" class="form-control dynamic" data-dependent="nama_targetumur" required>
			                        	<option value="">Pilih salah satu</option>
			                        	@foreach($indikator as $indikator)
											<option value="{{$indikator->id}}">{{$indikator->nama_indikator}}</option>
										@endforeach
									</select>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="exampleInputuname">Target Indikator</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                        <select name="target" id="nama_targetumur" class="form-control" required>
			                        	<option value="">Pilih salah satu</option>
									</select>
			                    </div>
			                </div>
                            <div class="form-group">
                                <label for="exampleInputuname">Pencapaian (N)</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bar-chart-o"></i></div>
                                    <input name="pencapaian" type="number" step="any" class="form-control" id="exampleInputuname" placeholder="Masukkan Pencapaian" required>
                                </div>
                            </div>
			                <div class="form-group has-success">
			                    <label class="control-label">Cakupan (%)</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-users"></i></div>
			                        <input type="number" id="cakupan" step="any" name="cakupan" placeholder="Masukkan Cakupan" class="form-control" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Jumlah Sasaran (N)</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
			                        <input type="number" step="any" id="total_sasaran" name="total_sasaran" placeholder="Masukkan Jumlah Sasaran" class="form-control" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Target (%)</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-bullseye"></i></div>
			                        <input id="target" step="any" type="number" class="form-control" name="target" placeholder="Masukkan Target" required>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label class="control-label">Tahun</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			                        <input type="number" id="tahun" name="tahun" placeholder="Masukkan Tahun" class="form-control" required>
			                    </div>
			                </div>
                            <input type="number" id="nama_program" name="program" value="{{$id[0]->id}}" hidden>
			                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Input</button>
			                <a href="{{ route('data.input')}}" class="btn btn-danger waves-effect waves-light m-r-10">Cancel</a>
			            </form>
                        @endif
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
                url:"{{ route('data.fetch') }}",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result){
                    $('#'+dependent).html(result);
                }
            })
        }
    });
    $('#nama_indikator').change(function(){
        $('#nama_targetumur').html('<option value="">Pilih salah satu</option>');
    });
});
</script>
@stop
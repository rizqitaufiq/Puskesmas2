@extends($extends)

@section($section)
<script language="javascript" type="text/javascript">  
	$(document).ready(function(){
	var beratbadan = [
		{display: "Pilih salah satu", value: "" },
		{display: "Bayi (0-6 bulan)", value: "Bayi (0-6 bulan)" }, 
		{display: "Baduta (6-11 bulan)", value: "Baduta (6-11 bulan)" }, 
		{display: "Balita (12-60 bulan)", value: "Balita (12-60 bulan)" }];
		
	var asi = [
		{display: "Bayi (0-6 bulan)", value: "Bayi (0-6 bulan)" }];
		
	var makan = [
		{display: "Keluarga", value: "Keluarga" }];

	var garam = [
		{display: "Keluarga", value: "Keluarga" }];

	var vitamin = [
		{display: "Pilih salah satu", value: "" },
		{display: "Baduta (6-11 bulan)", value: "Baduta (6-11 bulan)" }, 
		{display: "Balita (12-60 bulan)", value: "Balita (12-60 bulan)" },
		{display: "Ibu Nifas", value: "Ibu Nifas" }];

	var darah = [
		{display: "Pilih salah satu", value: "" },
		{display: "Ibu Hamil", value: "Ibu Hamil" },
		{display: "Remaja Putri", value: "Remaja Putri" }];
	var kosong = [
		{display: "Pilih salah satu", value: "" }];

	//If parent option is changed
	$("#select_indikator").change(function() {
			var parent = $(this).val(); //get option value from parent 
			
			switch(parent){ //using switch compare selected option and populate child
				  case 'Menimbang berat badan secara teratur':
				 	list(beratbadan);
					break;
				  case 'Pemberian asi ekslusif bayi usia 0-6 bulan':
				 	list(asi);
					break;				
				  case 'Makan makanan beraneka ragam':
				 	list(makan);
					break;
					case 'Menggunakan garam beryodium':
				 	list(garam);
					break;
					case 'Pemberian vitamin A':
				 	list(vitamin);
					break;
					case 'Pemberian tablet tambah darah':
				 	list(darah);
					break;	
					default: //default child option is blank
					list(kosong);
					// $("#select_target").html('');	 
					break;
			   }
	});

	//function to populate child select box
	function list(array_list)
	{
		$("#select_target").html(""); //reset child options
		$(array_list).each(function (i) { //populate child options 
			$("#select_target").append("<option value=\""+array_list[i].value+"\">"+array_list[i].display+"</option>");
		});
	}

	});
</script>

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
                            <li class="active">Kadarzi</li>
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
                        <strong class="card-title">Tambah Data Kadarzi</strong>
                    </div>
                    <div class="card-body">
                        <form class="form p-t-20" method="POST" action="{{ route('kadarzi.store') }}" enctype="multipart/form-data">
			                {{ csrf_field() }}
			                <div class="form-group">
			                    <label for="exampleInputuname">Indikator</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                        <select name="indikator" id="select_indikator" class="form-control" required>
			                        	<option value="">Pilih salah satu</option>
										<option value="Menimbang berat badan secara teratur">Menimbang berat badan secara teratur</option>
										<option value="Pemberian asi ekslusif bayi usia 0-6 bulan">Pemberian asi ekslusif bayi usia 0-6 bulan</option>
									  	<option value="Makan makanan beraneka ragam">Makan makanan beraneka ragam</option>
									  	<option value="Menggunakan garam beryodium">Menggunakan garam beryodium</option>
									  	<option value="Pemberian vitamin A">Pemberian vitamin A</option>
									  	<option value="Pemberian tablet tambah darah">Pemberian tablet tambah darah</option>
									</select>
			                    </div>
			                </div>
			                <div class="form-group">
			                    <label for="exampleInputuname">Target</label>
			                    <div class="input-group">
			                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
			                        <select name="target" id="select_target" class="form-control" required>
			                        	<option value="">Pilih salah satu</option>
										<!-- <option value="bayi">Bayi (0-6 Bulan)</option>
										<option value="baduta">Baduta (6-11 Bulan)</option>
									  	<option value="balita">Balita (12-60 Bulan)</option>
									  	<option value="ibu hamil">Ibu Hamil</option>
									  	<option value="ibu nifas">Ibu Nifas/ Ibu Menyusui</option>
									  	<option value="remaja putri">Remaja Putri</option> -->
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
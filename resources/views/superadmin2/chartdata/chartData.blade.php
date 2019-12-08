@extends($extends)

@section($section)
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script src="{{ asset('../../creative-agency/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
       
    var ctx = document.getElementById('myChart').getContext('2d');
    
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',


        // The data for our dataset
        data: {
            labels: <?php echo json_encode($indikator);?>,
           
            datasets: [
                <?php 
                $warna = array('rgb(204, 133, 2)', 'rgb(0, 92, 4)', 'rgb(92, 0, 0)', 'rgb(0, 92, 90)', 'rgb(0, 35, 92)', 'rgb(92, 48, 0)');
                for($i = 0; $i<count($targetumur); $i++){
                    ?>
                    {
                        label: "<?php echo $targetumur[$i];?>",
                        fill: true,
                        backgroundColor: "<?php echo $warna[$i];?>",
                        pointBorderWidth: 3,
                        data: <?php
                                $nilai = array();
                                for($o=0; $o<count($indikator);$o++){
                                    $fill = 0;
                                    foreach ($data as $dt) {
                                        if($dt->nama_targetumur === $targetumur[$i] && $dt->nama_indikator === $indikator[$o]){ 
                                            $fill = 1;
                                            array_push($nilai, $dt->cakupan);
                                        }

                                    }
                                    if($fill == 0){
                                        $inserted = array(null);
                                        array_splice( $nilai, $o, 0, $inserted);
                                    }
                                }
                            ?>
                            <?php echo json_encode($nilai);?>
                    },
                <?php
                } 
                ?>
            
            ]
        },

        // Configuration options go here
        options: {
            responsive :true,
            chartArea: {
                backgroundColor: 'rgba(255,255,255,0.4)'
            },
            title: {
              display: true,
              text: <?php echo json_encode($label); ?>,
              padding : 40
            },
            tooltips: {
              mode: 'point',
              intersect: false
            },
             legend: {
              display: true,
              position:'right'
            },
            plugins: {
                    datalabels: {
                        align: 'end',
                        anchor: 'end',
                        backgroundColor: function(context) {
                            return context.dataset.backgroundColor;
                        },
                        borderRadius: 4,
                        color: 'rgb(0,0,0)',
                        font: {
                            weight: 'bold'
                        },
                        formatter: Math.round
                    }
                },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 100
                    }
                }]
            }
        }
    });
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
                            <li><a href="#">{{$nama}}</a></li>
                            <li class="active">Chart</li>
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
                <div id="accordion">

	                <div class="card">
	                    <div class="card-header">
						    	<strong class="card-title">{{$nama}} {{$tahun}}</strong>
	                    </div>
	                    <div class="card-body">
	                        <canvas id="myChart"></canvas>
                            <div style="margin-top: 3%">
                                <input type="text" id="SimpanChart" value="Chart {{$nama}} {{$tahun}}" hidden>
                                <input class="btn btn-primary" type="button" onclick="downloadPDF2()" value="Simpan" id="SimpanChart"/>
                                 <!-- <input class="btn btn-primary" type="button" onclick="printDiv('myChart')" value="Print" /> -->
                                <!-- <a class="btn btn-primary" href="{{route('user.save.data')}}">Simpan</a> -->
                            </div>
	                    </div>
		                
	                </div>
	            </div>
	        </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>
      function PrintImage() {
    var canvas = document.getElementById("myChart");
    var win = window.open();
    win.document.write("<br><img src='" + canvas.toDataURL("image/jpeg") + "'/>");
    win.print();
    win.location.reload();

}
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
    function downloadPDF2() {
        var newCanvas = document.querySelector('#myChart');
        var nama = document.getElementById("SimpanChart").value;

        //create image from dummy canvas
        var newCanvasImg = newCanvas.toDataURL("image/jpeg;base64", 1.0);

        //creates PDF from img
        var doc = new jsPDF('landscape');
        doc.setFontSize(20);
        doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150 );
        doc.save(nama);
        }

    //window.print();
</script>

<div class="clearfix"></div>
@stop
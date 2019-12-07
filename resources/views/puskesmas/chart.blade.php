@extends('puskesmas.layouts.template')
@section('main')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
<script src="{{ asset('../../creative-agency/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script type="text/javascript">
	$(function() {
	var ctx = document.getElementById('myChart').getContext('2d');
    
	var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',


        // The data for our dataset
        data: {
            labels: <?php echo json_encode($datatahun); ?>,
            datasets: [{

                label: <?php echo json_encode($label); ?>,
                fill: false,
                // backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(0,191,255)',
                pointBorderWidth: 3,
                data: <?php echo json_encode($dataindikator); ?>
            },{

                label: 'Target',
                fill: false,
                // backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255,0,0)',
                pointBorderWidth: 3,
                data: <?php echo json_encode($datatarget); ?>
            }
            ]
        },

        // Configuration options go here
        options: {
            plugins: {
                    datalabels: {
                        align: 'end',
                        anchor: 'end',
                        backgroundColor: function(context) {
                            return context.dataset.backgroundColor;
                        },
                        borderRadius: 4,
                        color: 'rgb(0,191,255)',
                        font: {
                            weight: 'bold'
                        },
                        formatter: Math.round
                    }
                },
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMin: 50,
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
                    
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        
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
                <div id="card" style="margin: 40px 30px 20px 30px;">
                    <div id="accordion">
                        @foreach($indikator as $indikator2)
    	                <div class="card" style="margin: 20px 50px 20px 50px;">
    	                    <div class="card-header">
                                <strong class="card-title">{{$indikator2->indikator}} pada {{$indikator2->targetumur}} </strong>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                            </div>
    	                </div>
                        @endforeach
                    </div>
	            </div>
	        </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
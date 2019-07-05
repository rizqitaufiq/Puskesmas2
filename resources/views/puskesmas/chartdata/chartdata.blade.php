@extends('puskesmas.layouts.template')
@section('main')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
<script type="text/javascript">
	$(function() {
	var ctx = document.getElementById('myChart').getContext('2d');
    
	var chart = new Chart(ctx, {
	    // The type of chart we want to create
	    type: 'line',


	    // The data for our dataset
	    data: {
	        labels: ['2011', '2012', '2013', '2014', '2015', '2016', '2017'],
	        datasets: [{

	            label: 'Menimbang Berat Badan Secara teratur (Bayi)',
                fill: false,
	            // backgroundColor: 'rgb(255, 99, 132)',
	            borderColor: 'rgb(0,191,255)',
	            pointBorderWidth: 3,
	            data: [96, 81, 60, 71, 85, 62, 90]
	        },{

                label: 'Target',
                fill: false,
                // backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255,0,0)',
                pointBorderWidth: 3,
                data: [60, 70, 80, 81, 85, 82, 75]
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

	                <div class="card" style="margin: 20px 50px 20px 50px;">
	                    <div class="card-header">
						    <strong class="card-title">Menimbang Berat Badan Secara teratur (Bayi) </strong>
	                    </div>
		                    <div class="card-body">
		                        <canvas id="myChart"></canvas>
		                    </div>
		                
	                </div>
	            </div>
	        </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
@stop
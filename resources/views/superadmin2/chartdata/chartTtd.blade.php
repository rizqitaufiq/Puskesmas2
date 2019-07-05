@extends($extends)

@section($section)
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.5.0"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function() {
       
    var ctx = document.getElementById('myChart').getContext('2d');
    
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',


        // The data for our dataset
        data: {
            labels: ["Pemberian Tablet Tambah Darah"],
            datasets: [
             {
                label: 'Ibu Hamil',
                fill: true,
                backgroundColor: 'rgb(242, 37, 14)',
                // borderColor: 'rgb(0,191,255)',
                pointBorderWidth: 0,
                data: [42]
            }, 
            {
                label: 'Remaja Putri',
                fill: true,
                backgroundColor: 'rgb(191, 8, 237)',
                // borderColor: 'rgb(0,191,255)',
                pointBorderWidth: 0,
                data: [54]
            }, 
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
              text: "SKDN Chart"
            },
            
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
                xAxes:[{
                    ticks:{
                    }
                }],
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
                            <li><a href="#">Kadarzi</a></li>
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
                                <strong class="card-title">Kadarzi 2011 </strong>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                            <div style="margin-top: 3%">
                                <input class="btn btn-primary" type="button" onclick="downloadPDF2()" value="Simpan" />
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

        //create image from dummy canvas
        var newCanvasImg = newCanvas.toDataURL("image/jpeg;base64", 1.0);

        //creates PDF from img
        var doc = new jsPDF('landscape');
        doc.setFontSize(20);
        doc.addImage(newCanvasImg, 'JPEG', 10, 10, 280, 150 );
        doc.save('chart TTD 2011.pdf');
        }

    //window.print();
</script>

<div class="clearfix"></div>
@stop
@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$callrecord['inboundcalls']}}</h3>
                <p>Inbound Calls</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$callrecord['outboundcalls']}}</h3>
                <p>Outbound Calls</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$callrecord['totalcalls']}}</h3>
                <p>Total Calls</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>

    @if(Session::get('role') && Session::get('role')== 'Head of Department' )
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$active_dialers}}</h3>
                <p>Active Dialers</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{$valued_calls}}</h3>
                <p>Values OutBound Calls</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{$total_dialers}}</h3>
                <p>No of Dialers</p>
            </div>
            <div class="icon">
                <i class="fa fa-phone"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
        </div>
    </div>
    @endif
</div>

 <div calss="row" style="display:flex;">
    <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Call Responses</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 450px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    <!-- Future Investment Chart -->
    <!-- /.col (LEFT) -->
    </div>
    <div class="col-md-6">
        <!-- LINE CHART -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Future Investment</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                  <canvas id="investmentChart" style="min-height: 250px; height: 250px; max-height: 450px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
        var dates = [];
        var investment_dates = [];
        var responses = [];
        var investment = [];
        var dataset = <?php echo json_encode($dataset);?>;
        var investmentdataset = <?php echo json_encode($investments_details);?>;

        var investmentbar = $('#investmentChart');
        var barCanvas = $('#barChart');
        for(let i in dataset){
            dates.push(dataset[i].date);
            responses.push(dataset[i].responses);
        }

        var barChart = new Chart(barCanvas,{
            type : 'bar',
            data:{
                labels:dates,
                datasets:[
                    {
                        label :'Call Responses',
                        data : responses,
                        backgroundColor :['#003f5c','#58508d','#bc5090','#ff6361','#ffa600']
                    },

                ]
            },
            options:{
                scales:{
                    yAxes:[
                        {
                            ticks:{
                                beginAtZero : true
                            }
                        }
                    ]
                }
            }
        });
        for(let i in investmentdataset){
            investment_dates.push(investmentdataset[i].date);
            investment.push(investmentdataset[i].investment);
        }

        var investmentbarChart = new Chart(investmentbar,{
            type : 'bar',
            data:{
                labels:investment_dates,
                datasets:[
                    {
                        label :'Future Investment',
                        data : investment,
                        backgroundColor :['#003f5c','#58508d','#bc5090','#ff6361','#ffa600']
                    },

                ]
            },
            options:{
                scales:{
                    yAxes:[
                        {
                            ticks:{
                                beginAtZero : true
                            }
                        }
                    ]
                }
            }
        });
    });
</script>
@endsection

@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


@include('includes.cards-status')

  <div class="row">
      <!-- /.col (LEFT) -->
      <div class="col-md-9">
        <!-- LINE CHART -->
        <div class="card card-info">
          <div class="card-header with-border">
            <h3 class="card-title">Line Chart</h3>

          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="lineChart" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

    

      </div>
      <!-- /.col (RIGHT) -->
  
      <div class="col-md-3">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">Title</h5>
                  <p class="card-text">Content</p>
              </div>
          </div>
      </div>
    </div>
    <!-- /.row -->

@stop

@section('js')
<script>




var lineCanva          = $('#lineChart').get(0).getContext('2d');

var dataFirst = {
  label: "Car A - Speed (mph)",
  data: @json($purchases),
 lineTension: 0,
    fill: false,
    borderColor: 'orange',
    backgroundColor: 'transparent',
    borderDash: [5, 5],
    pointBorderColor: 'orange',
    pointBackgroundColor: 'rgba(255,150,0,0.5)',
    pointRadius: 5,
    pointHoverRadius: 10,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rectRounded'


  // Set More Options
};

var dataSecond = {
  label: "Car B - Speed (mph)",
  data: @json($sales),
  lineTension: 0,
    fill: false,
    borderColor: 'blue',
    backgroundColor: 'transparent',
    borderDash: [5, 5],
    pointBorderColor: 'blue',
    pointBackgroundColor: 'rgba(255,150,0,0.5)',
    pointRadius: 5,
    pointHoverRadius: 10,
    pointHitRadius: 30,
    pointBorderWidth: 2,
    pointStyle: 'rectRounded'


  // Set More Options
};

var speedData = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [dataFirst, dataSecond,]
};


var lineChart = new Chart(lineCanva, {
type: 'line',
  data: speedData
})


</script>
@stop

@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">

      <div class="col-md-6">
        <!-- AREA CHART -->
        <div class="card card-primary">
          <div class="card-header with-border">
            <h3 class="card-title">Area Chart</h3>
          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="areaChart" style="height:250px"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- DONUT CHART -->
        <div class="card card-danger">
          <div class="card-header with-border">
            <h3 class="card-title">Donut Chart</h3>
          </div>
          <div class="card-body">
            <canvas id="pieChart" style="height:250px"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col (LEFT) -->
      <div class="col-md-6">
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

        <!-- BAR CHART -->
        <div class="card card-success">
          <div class="card-header with-border">
            <h3 class="card-title">Bar Chart</h3>

          </div>
          <div class="card-body">
            <div class="chart">
              <canvas id="barChart" style="height:230px"></canvas>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col (RIGHT) -->
    </div>
    <!-- /.row -->

@stop

@section('js')
<script>


var areaCanva = document.getElementById('areaChart').getContext('2d');
var areaChart = new Chart(areaCanva, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
        {
          label               : 'Electronics',

          data                : [65, 59, 80, 81, 56, 55, 40]
        },
        {
            label               : 'Digital Goods',
            backgroundColor :     'rgba(54, 162, 235, 0.2)',

          data                : [28, 48, 40, 19, 86, 27, 90]
        }
      ]
    },

    // Configuration options go here
    options: {
    }
});


var lineCanva          = $('#lineChart').get(0).getContext('2d');

var dataFirst = {
  label: "Car A - Speed (mph)",
  data: [0, 59, 75, 20, 20, 55, 40],
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
  data: [20, 15, 60, 60, 65, 30, 70],
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


var pieCanvas = $('#pieChart').get(0).getContext('2d')
var myPieChart = new Chart(pieCanvas, {
    type: 'pie',
   data :  {
    datasets: [{
        backgroundColor :[
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
        ],
        data: [
            10, 20, 30
        ]
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: [
        'Red',
        'Yellow',
        'Blue'
    ],

},
    options: {}
});

var barCanvas = $('#barChart').get(0).getContext('2d');
var densityData = {
  label: 'Density of Planets (kg/m3)',
  data: [5427, 5243, 5514, 3933, 1326, 687, 1271, 1638]
};
var myBarChart = new Chart(barCanvas, {
    type: 'bar',
  data: {
    labels: ["Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune"],
    datasets: [densityData]
  }

});

</script>
@stop

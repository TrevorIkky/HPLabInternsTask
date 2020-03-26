@extends('layouts.app')

@section('styles')
<style>
  body {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-align: center;
    padding: 20px;
  }

  .main-container {
    display: flex;
    justify-content: center;

  }
</style>
@endsection


@section('content')
<h3 id="chart-title">
  Students Per Course
</h3>
<div class="main-container mt-5">
  <div id="pie-chart" class="pie-chart" style="width: 600px; height:600px; margin-top:-20px;">
  </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  let chartData = {
    !!json_encode($chartdata) !!
  }
  console.log(chartData)
  google.charts.load('current', {
    'packages': ['corechart']
  });
  let cd = [
    ['Courses', 'Students Per Course'],
  ]

  chartData.countPerCourse.forEach((x) => {
    cd.push([x.course.split('/')[0], parseInt(x.course.split('/')[1])])
  })
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable(cd);

    var options = {
      legend: 'none',
    };
    var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
    chart.draw(data, options);
  }
</script>
@endsection
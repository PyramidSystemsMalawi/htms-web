@extends('layouts.main')

@section('content')
<div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$stats['cases']}}</h3>

                <p>Total Cases</p>
              </div>
              <div class="icon">
                <i class="fa fa-folder-open"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$stats['victims']}}<sup style="font-size: 20px"></sup></h3>

                <p>Total Victims</p>
              </div>
              <div class="icon">
                <i class="fa fa-street-view"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$stats['suspects']}}</h3>

                <p>Total Suspects</p>
              </div>
              <div class="icon">
                <i class="fa fa-mask"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-12"><hr></div>
          <div class="col-12">
              <div id="curve_chart" style="width: 100%; height: 500px"></div>
          </div>
        </div>
        <script src="dist/js/pages/dashboard.js"></script>
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = new google.visualization.DataTable()
                data.addColumn('string', 'Years')
                data.addColumn('number', 'Cases')

                data.addRow(
                    ['2012',  1000],
                    ['2013',  460],
                    ['2014',   1120],
                    ['2015',     540],
                    ['2016',    6000],
                    ['2017',   0],
                    ['2018',    540]
                    ['2019',      837],
                    ['2020',  540],
                    ['2021',  3535],
                    ['2022',  10]
                )

                 var options = {
                    title: 'Human Trafficking Index',
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    height:250
                };

                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                chart.draw(data, options);
            }
            </script>
@endsection

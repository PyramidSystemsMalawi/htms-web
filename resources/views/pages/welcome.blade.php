@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col-lg-4 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{ $stats['cases'] }}</h3>
        <p>Total Cases</p>
      </div>
      <div class="icon">
        <i class="fa fa-folder-open"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{ $stats['victims'] }}</h3>
        <p>Total Victims</p>
      </div>
      <div class="icon">
        <i class="fa fa-street-view"></i>
      </div>
      <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <div class="col-lg-4 col-6">
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>{{ $stats['suspects'] }}</h3>
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
    <canvas id="myChart" style="width: 80%; height:200px;"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  const ctx = document.getElementById('myChart').getContext('2d');

  // Data passed from the controller
  const labels = @json($topDistricts->pluck('district'));
  const data = @json($topDistricts->pluck('total_cases'));

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Total Cases',
        data: data,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },

    layout: {
      padding: {
        top: 5,
        right: 5,
        bottom: 5,
        left: 5
      }
    },

    options: {
      responsive: true,
      scales: {
        x: {
          ticks: {
            autoSkip: false, // Ensure all labels are displayed
            maxRotation: 45, // Rotate labels to prevent overlap
            minRotation: 30
          },
          title: {
            display: true,
            text: 'District Name'
          }
        },
        y: {
          title: {
            display: true,
            text: 'Total Cases'
          },
          beginAtZero: true
        }
      }
    }
  });
});
</script>
@endsection

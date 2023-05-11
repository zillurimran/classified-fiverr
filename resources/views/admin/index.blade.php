@extends('layouts.dashboard')

@section('title')
{{ config('app.name') }} | Dashboard
@endsection

@section('dashboard')
    active
@endsection

@section('content')
    <!-- Dashboard Analytics Start -->
    <style>
      .apexcharts-menu-icon{
        display: none !important;
      }
    </style>
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-xl-6 col-12">
                <div class="card pb-4">
                    <div class="card-header flex-column align-items-start">
                        <h4 class="card-title mb-75">Total Items</h4>
                        <span class="card-subtitle text-muted">Statistics of total Ads </span>
                    </div>
                    <div class="card-body">
                        <div id="items_chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-12 pb-0">
                <div class="card">
                    <div class="card-header flex-column align-items-start">
                        <h4 class="card-title mb-75">Total User</h4>
                        <span class="card-subtitle text-muted">Statistic of total Users</span>
                    </div>
                    <div class="card-body">
                        <div id="userChart"></div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-6 col-12 pb-0">
                <div class="card">
                    <div class="card-header flex-column align-items-start">
                        <h4 class="card-title mb-75">Monthly Ads</h4>
                        <span class="card-subtitle text-muted">Statistic of Weekly</span>
                    </div>
                    <div class="card-body">
                        <div id="monthly"></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Dashboard Analytics end -->
@endsection
@push('page-js')
{{-- <script>
  var options = {
    chart: {
      type: 'bar'
    },
    series: [{
      name: 'Day Wise Ads',
      data: [30,40,45,50,49,60,70,91,125]
    }],
    xaxis: {
      categories: ['Saturday','Sunday','Monday','Tuesday',"Wednesday",'Thirsday','Friday']
      }
  }

  var chart = new ApexCharts(document.querySelector("#monthly"), options);

chart.render();

</script> --}}

<script>
    var options = {
            series: [{
                name: 'Item Created',
                data: @json($total_items)
                }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false,
            }
        },
        xaxis: {
          categories: ['January', 'Fabruary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        }
    };
    var chart = new ApexCharts(document.querySelector("#items_chart"), options);
    chart.render();
</script>
<script>
    var options = {
          series:[{
                    name: 'Total User',
                    data: @json($monthly_users)
                    }
                ],
          chart: {
          type: 'bar',
          height: 350
        },
        annotations: {
          xaxis: [{
            x: 500,
            borderColor: '#00E396',
            label: {
              borderColor: '#00E396',
              style: {
                color: '#fff',
                background: '#00E396',
              },
            }
          }]
        },
        plotOptions: {
          bar: {
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: ['January', 'Fabruary', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        },
        grid: {
          xaxis: {
            lines: {
              show: true
            }
          }
        },
        yaxis: {
          reversed: true,
          axisTicks: {
            show: true
          }
        }
        };
        var chart = new ApexCharts(document.querySelector("#userChart"), options);
        chart.render();
</script>

@endpush
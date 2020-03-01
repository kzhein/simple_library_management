@extends('layouts.dashboard')

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totalBooks }}</h3>

                <p>Total Books</p>
              </div>
              <div class="icon">
                <i class="fas fa-book"></i>
              </div>
              <a href="{{ url('dashboard/book/create') }}" class="small-box-footer">Add New <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3>{{ $borrowedBooks }} / {{ $availableBooks }}</h3>

                <p>Borrowed / Available</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ url('/dashboard/rent') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalBorrowers }}</h3>

                <p>Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ url('/dashboard/borrower/create') }}" class="small-box-footer">Add New <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $totalOverdueBooks }}</h3>

                <p>Overdue books</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ url('/dashboard/return') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>     
          </div>
          <div class="col-md-6 col-lg-4"></div>
        </div>


      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



    <script>

      $(document).ready(function() {

        var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
        var pieData = {
          labels: [
            @foreach($categoryIdCounts as $key => $value)
            '{!! $key !!}',
            @endforeach
          ],
          datasets: [
            {
              data: [
                @foreach($categoryIdCounts as $categoryIdCount)
                {{ $categoryIdCount }},
                @endforeach                
              ],
              backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
          ]
        };

        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
          tooltips: {
            callbacks: {
              label: function(tooltipItem, data) {
                return data['labels'][tooltipItem['index']] + ': ' + data['datasets'][0]['data'][tooltipItem['index']] + '%';
              }
            }
          },
          title: {
            display: true,
            text: 'Rented books categories of all time'
          }
        };


        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions     
        })



      });


      setCurrentTab();

      function setCurrentTab() {

          let current = document.querySelector('#nav-dashboard');
          if(!current.classList.contains('active')) {
              current.classList.add('active');
          }

          
      }

</script>




@endsection
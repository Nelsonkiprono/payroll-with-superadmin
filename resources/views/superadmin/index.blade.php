@extends('layouts.main_hr')
@section('xara_cbs')
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->


<?php use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

?>
    <div class="row m-1">
	<section class="content">
		
		<div class="row">
			<div class="col-md-12 col-xs-12">
			<div class="btn-group pull-right" data-toggle="buttons">
				<label class="btn btn-info active">
    				<input type="radio" name="date-filter"
    				data-start="{{ date('Y-m-d') }}" 
    				data-end="{{ date('Y-m-d') }}"
    				checked> Today
  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="{{ $date_filters['this_week']['start']}}" 
    				data-end="{{ $date_filters['this_week']['end']}}" 
    				> This Week
  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter"
    				data-start="{{ $date_filters['this_month']['start']}}" 
    				data-end="{{ $date_filters['this_month']['end']}}"
    				> This Month
  				</label>
  				<label class="btn btn-info">
    				<input type="radio" name="date-filter" 
    				data-start="{{ $date_filters['this_yr']['start']}}" 
    				data-end="{{ $date_filters['this_yr']['end']}}"  
    				> This Year
  				</label>
            </div>
			</div>

		</div>
		<br/>
		<div class="row">
	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-aqua">
	            <div class="inner">
	              <h3><span class="new_subscriptions">&nbsp;</span></h3>

	              <p>New Subscriptions</p>
				  <canvas id="genderChart" height="200" width="200"></canvas>
	            </div>
	            <div class="icon">
	              <i class="fa fa-refresh"></i>
	            </div>
	            <a href="{{ url('newSubscription')}} " class="small-box-footer"> More Info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->

	        <!-- <div class="col-lg-4 col-xs-6">
	          <div class="small-box bg-green">
	            <div class="inner">
	              <h3>53<sup style="font-size: 20px">%</sup></h3>

	              <p>Bounce Rate</p>
	            </div>
	            <div class="icon">
	              <i class="ion ion-stats-bars"></i>
	            </div>
	            <a href="#" class="small-box-footer">More Info<i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div> -->
	        <!-- ./col -->

	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-yellow">
	            <div class="inner">
	              <h3><span class="new_registrations">&nbsp;</span></h3>

	              <p>New Registrations</p>
				  <canvas id="genderChart1" height="200" width="200"></canvas>
	            </div>
	            <div class="icon">
	              <i class="ion ion-person-add"></i>
	            </div>
	            <a href="{{ url ('app\Http\Controllers\BusinessController@index')}}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
	        <!-- ./col -->
	        
	        <div class="col-lg-4 col-xs-6">
	          <!-- small box -->
	          <div class="small-box bg-red">
	            <div class="inner">
	              <h3>{{$not_subscribed}}</h3>
	              <p>Not Subscribed</p>
				  <canvas id="genderChart2" height="200" width="200"></canvas>
	            </div>
	            <div class="icon">
	              <i class="ion ion-pie-graph"></i>
	            </div>
	            <a href="{{ url ('app\Http\Controllers\BusinessController@index')}}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
	          </div>
	        </div>
        	<!-- ./col -->
    	</div>

    	<div class="row m-3">
	  		<div class="col-sm-12">
	  			<div class="box box-primary">
	  				<div class="box-header">
	         			<h3 class="box-title">Monthly Sales Trend</h3>
						<canvas id="genderChart3" height="200" width="200"></canvas>
	         		</div>
		            <div class="box-body">
		            </div>
		            <!-- /.box-body -->
	          	</div>
	  		</div>
  		</div>

	</section>

        </div>

@stop



	


{{ <?php //!! $monthly_sells_chart->script() ?>}}




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const genderData = {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
                label: 'Gender Distribution',
                data: [25, 30, 15], // Dummy data (replace with your actual data)
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1,
            }],
        };

        const gender = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(gender, {
            type: 'bar',
            data: genderData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const genderData = {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
                label: 'Gender Distribution',
                data: [25, 30, 15], // Dummy data (replace with your actual data)
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1,
            }],
        };

        const gender = document.getElementById('genderChart1').getContext('2d');
        const genderChart = new Chart(gender, {
            type: 'bar',
            data: genderData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const genderData = {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
                label: 'Gender Distribution',
                data: [25, 30, 15], // Dummy data (replace with your actual data)
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1,
            }],
        };

        const gender = document.getElementById('genderChart2').getContext('2d');
        const genderChart = new Chart(gender, {
            type: 'bar',
            data: genderData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const genderData = {
            labels: ['Male', 'Female', 'Other'],
            datasets: [{
                label: 'Gender Distribution',
                data: [25, 30, 15], // Dummy data (replace with your actual data)
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1,
            }],
        };

        const gender = document.getElementById('genderChart3').getContext('2d');
        const genderChart = new Chart(gender, {
            type: 'bar',
            data: genderData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    });
</script>







    








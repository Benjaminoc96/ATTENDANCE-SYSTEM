@extends('layouts.master')

{{-- @section('title', $title) --}}

@section('content')


<h1 class="text-center">VISITORS LOGGING SYSTEM</h1>
<br><br>
<div class="row">
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-dark text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">people</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Visitors</p>
            <h4 class="mb-0">

              <?php
              $connection = mysqli_connect("localhost","root","","logging");
  
                        $query = "SELECT id FROM visitors where visitor_type = 'visitor' ORDER BY id";
                        $query_run = mysqli_query($connection, $query);
  
                        $row = mysqli_num_rows($query_run);
  
                        echo '<a style="text-decoration: none;" href="#"> '.$row.' </a>';
  
                        ?>

            </h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"> <a href="#">Total Visits Today --> </a> <span class="text-success text-sm font-weight-bolder">
            <?php
                      $connection = mysqli_connect("localhost","root","","logging");
                      $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
                      $created_at_query = date($castToDate);;

                      $query = "SELECT id FROM visitors where visitor_type = 'visitor' and DATE(created_at) = '{$created_at_query}' ORDER BY id";
                      $query_run = mysqli_query($connection, $query);
                      $row = mysqli_num_rows($query_run);  

                      echo '<a style="text-decoration: none;color:blue;font-weight:bolder;font-size: 20px;" href="#"> '.$row.' </a>';

            ?>
          </span></p>
        </div>
      </div>
    </div>


{{-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">people</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Student</p>
            <h4 class="mb-0">
              <?php
              $connection = mysqli_connect("localhost","root","","logging");
  
                        $query = "SELECT id FROM visitors where visitor_type = 'student' ORDER BY id";
                        $query_run = mysqli_query($connection, $query);
  
                        $row = mysqli_num_rows($query_run);
  
                        echo '<a style="text-decoration: none;" href="#"> '.$row.' </a>';
  
                        ?>
            </h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0">Total Students Today --><span class="text-success text-sm font-weight-bolder">
            <?php
                      $connection = mysqli_connect("localhost","root","","logging");
                      $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
                      $created_at_query = date($castToDate);;

                      $query = "SELECT id FROM visitors where visitor_type = 'student' and DATE(created_at) = '{$created_at_query}' ORDER BY id";
                      $query_run = mysqli_query($connection, $query);
                      $row = mysqli_num_rows($query_run);

                      echo '<a style="text-decoration: none;color:blue;font-weight:bolder;font-size: 20px;" href="#"> '.$row.' </a>';

                      ?>
          </span></p>
        </div>
      </div>
</div> --}}




<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">login</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Login Today</p>
            <h4 class="mb-0">
              <?php
              $connection = mysqli_connect("localhost","root","","logging");
              $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
              $created_at_query = date($castToDate);;

              $query = "SELECT id FROM visitors_logs where log_type = 'IN' and DATE(created_at) = '{$created_at_query}' ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $loginToday = mysqli_num_rows($query_run);

              echo '<a style="text-decoration: none;" href="#"> '.$loginToday.' </a>';

              ?>
            </h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></span> Login</p>
        </div>
      </div>
</div>



<div class="col-xl-4 col-sm-6">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">logout</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Logout Today</p>
            <h4 class="mb-0">
              <?php
              $connection = mysqli_connect("localhost","root","","logging");
              $castToDate = date("Y-m-d", strtotime(date('Y-m-d')));
              $created_at_query = date($castToDate);

              $query = "SELECT id FROM visitors_logs where log_type = 'OUT' and DATE(created_at) = '{$created_at_query}' ORDER BY id";
              $query_run = mysqli_query($connection, $query);
              $loggoutToday = mysqli_num_rows($query_run);

              echo '<a style="text-decoration: none;" href="#"> '.$loggoutToday.' </a>';

              ?>
            </h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"> <a href="{{ route('users.visitorslog') }}"> Visitors Not Logged Out Today --></a><span class="text-success text-sm font-weight-bolder">
            
            <?php

            echo '<a style="text-decoration: none;color:red;font-weight:bolder;font-size: 20px;" href="#"> '.$loginToday - $loggoutToday.' </a>';

            ?>
          
          
          </span></p>
        </div>
      </div>
    </div>
</div>



  @endsection

@push('scripts')


@endpush
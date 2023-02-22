@extends('layouts.master')

@section('title', $title)

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
            <h4 class="mb-0">{{ $count_total_visitors }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"> <a href="{{ route('visitorlog.visitortoday') }}">Total Visits Today: </a> 
            <i style="text-decoration: none;color:blue;font-weight:bold;font-size: 20px;">
              {{ $count_total_visit_today }}
            </i>
        </div>
      </div>
    </div>






<div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
          <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
            <i class="material-icons opacity-10">login</i>
          </div>
          <div class="text-end pt-1">
            <p class="text-sm mb-0 text-capitalize">Total Login Today</p>
            <h4 class="mb-0">{{ $count_total_login_today }}</h4>
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
            <h4 class="mb-0">{{ $count_total_logout_today }}</h4>
          </div>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"> <a href="{{ route('visitorlog.visitorsnotloggedout') }}"> Visitors Not Logged Out Today: </a><span class="text-success text-sm font-weight-bolder">
            
            <?php

            echo '<a style="text-decoration: none;color:red;font-weight:bolder;font-size: 20px;" href="#"> '.$count_total_login_today - $count_total_logout_today.' </a>'

            ?>


          </span></p>
        </div>
      </div>
    </div>
</div>



  @endsection

@push('scripts')


@endpush

@extends ('layouts.master')

@section('title', $title)

@section ('content')



<style>
  .select,
  #locale {
    width: 100%;
  }
  .like {
    margin-right: 10px;
  }
</style>



<div class="card card-outline card-primary">
    <h1 class="text-center">Visitors Log List</h1>
    <div class="card-tools">
          <a  href="javascript:void(0);" onclick="printPageArea('printableArea')" class="btn btn-flat btn-success" style="float: right;"><span class="fas fa-print"></span>  
            Print
          </a>
    </div>


  <div class="card-body">
		<fieldset>
			<legend class="text-info">Filter Date Range</legend>
			<form action="" id="filter-data">
				<div class="row align-items-end">
					<div class="col-md-4">
						<div class="form-group">
							<label for="date_from" class="control-label text-info">From</label>
							<input type="date" id="from" name="from" class="form-control form-control-sm rounded-0" value="{{ $from }}" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="date_to" class="control-label text-info">To</label>
							<input type="date" id="to" name="to" class="form-control form-control-sm rounded-0" value="{{ $to }}" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<button class="btn btn-flat btn-sm btn-primary"><i class="fa fa-filter"></i> Filter</button>
						</div>
					</div>
				</div>
			</form>
		</fieldset>

    <br><br>

<div id="printableArea">
            <style>
              .img-avatar{
                width:45px;
                height:45px;
                object-fit:cover;
                object-position:center center;
                border-radius:100%;
              }
            </style>
                <div class="container-fluid">


                  <table id="myTable" class="table table-bordered table-stripped table-hover">
                    <colgroup>
                      <col width="15%">
                      <col width="22%">
                      <col width="22%">
                      {{-- <col width="25%"> --}}
                      <col width="15%">
              
                    </colgroup>
                    <thead style="font-size: 16px;font-weight: bold;text-align: center;">
                        <tr>

                            <th>Time In</th> 
                            <th>Visitor Info</th>
                            <th>Visit Details</th>
                            {{-- <th>Purpose</th> --}}
                            <th>Time Out</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($findVisitorsLogs as $findVisitorsLog)


                <tr>
                  
        
                  
              <td class="text-right" style="font-size: 16px;">{{$findVisitorsLog->created_at}}</td>
                
              
              

              <td>
                <p class="m-0">
                  <small>
                    <span class="text-muted" style="font-size: 16px;font-weight: bold;">Name: </span><span style="font-size: 16px;">{{$findVisitorsLog->name}}</span><br>
                    <span class="text-muted" style="font-size: 16px;font-weight: bold;">Contact: </span><span style="font-size: 16px;">{{$findVisitorsLog->contact}}</span><br>
                    <span class="text-muted" style="font-size: 16px;font-weight: bold;">Address: </span><span style="font-size: 16px;">{{$findVisitorsLog->address}}</span>
                  </small>
                </p>
              </td>

              <td>
                <p class="m-0">
                  <small>
                    <span class="text-muted" style="font-size: 16px;font-weight: bold;">Staff: </span><span style="font-size: 16px;">{{$findVisitorsLog->staff}}</span><br>
                    <span class="text-muted" style="font-size: 16px;font-weight: bold;">Department: </span><span style="font-size: 16px;">{{$findVisitorsLog->department}}</span><br>
                    <span class="text-muted" style="font-size: 16px;font-weight: bold;">  Purpose: </span><span style="font-size: 16px;">{{$findVisitorsLog->purpose}}</span>
                  </small>
                </p>
              </td>
              
              {{-- <td style="font-size: 16px;">{{$findVisitorsLog->purpose}}</td> --}}

              @if ($findVisitorsLog->timeout == '')
              <td class="text-center" style="color: red; font-weight: bolder;">Not Logged Out</td>
              @else
              <td class="text-center">{{$findVisitorsLog->timeout}}</td>
              @endif


            </tr>
            @empty
            <p>No visitor record found</p>
            @endforelse
                  </tbody>
</table>



{{-- <table id="myTable" class="table table-bordered table-stripped table-hover">
                            <colgroup>
                              <col width="15%">
                              <col width="25%">
                              <col width="22%">
                              <col width="25%">
                              <col width="5%">
                            </colgroup>
                            <thead style="font-size: 16px;font-weight: bold;">
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Visitor Details</th>
                                    <th>Visit Details</th>
                                    <th>Purpose</th>
                                    <th>Log Type</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($findVisitorsLogs as $findVisitorsLog)


                        <tr>

                      <td class="text-right" style="font-size: 16px;">{{$findVisitorsLog->created_at}}</td>
                      <td>
                        <p class="m-0">
                          <small>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Name: </span><span style="font-size: 16px;">{{$findVisitorsLog->name}}</span><br>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Contact: </span><span style="font-size: 16px;">{{$findVisitorsLog->contact}}</span>
                          </small>
                        </p>
                      </td>

                      <td>
                        <p class="m-0">
                          <small>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Department: </span><span style="font-size: 16px;">{{$findVisitorsLog->department}}</span><br>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Staff: </span><span style="font-size: 16px;">{{$findVisitorsLog->staff}}</span>
                          </small>
                        </p>
                      </td>
                      
                      <td style="font-size: 16px;">{{$findVisitorsLog->purpose}}</td>
                      <td class="text-center">{{$findVisitorsLog->log_type}}</td>
                    </tr>
                          @endforeach
                          </tbody>
</table> --}}
          </div>
</div>


</div>
</div>




<br><br>

@endsection

{{-- TABLE SEARCH AND PAGINATION --}}

{{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> --}}


@push('scripts')


{{-- PRINT TABLE --}}

<script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>


{{-- TABLE SEARCH AND PAGINATION --}}

<script>
  $(document).ready(function(){
      $('#myTable').dataTable();
  });
</script>



@endpush
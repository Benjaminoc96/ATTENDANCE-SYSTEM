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

    <div class="card-tools">
          <a  href="javascript:void(0);" onclick="printPageArea('printableArea')" class="btn btn-flat btn-success" style="float: right;"><span class="fas fa-print"></span>  
            Print
          </a>
    </div>


  <div class="card-body">


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
                  <h2 class="text-center">Visitors Not Logged Out Today({{ $to }})</h2>
                <table id="myTable" class="table table-bordered table-stripped table-hover">
                            <colgroup>
                              <col width="15%">
                              <col width="25%">
                              <col width="22%">
                              {{-- <col width="25%"> --}}
                              <col width="5%">
                            </colgroup>
                            <thead style="font-size: 16px;font-weight: bold;">
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
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Purpose: </span><span style="font-size: 16px;">{{$findVisitorsLog->purpose}}</span>
                            
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
@extends ('layouts.master')

{{-- @section('title', $title) --}}

@section ('content')

<?php 
$from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
$to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");
?>




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
							<input type="date" id="from" name="from" class="form-control form-control-sm rounded-0" value="<?php echo $from ?>" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="date_to" class="control-label text-info">To</label>
							<input type="date" id="to" name="to" class="form-control form-control-sm rounded-0" value="<?php echo $to ?>" required>
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
              {{-- <table id="myTable" class="table table-bordered table-stripped table-hover table-strip"> --}}
                <table id="myTable" class="table table-bordered table-stripped table-hover">
                            <colgroup>
                                <col width="5%">
                                <col width="10%">
                                <col width="22%">
                                <col width="22%">
                                <col width="22%">
                                <col width="10%">
                            </colgroup>
                            <thead style="font-size: 16px;font-weight: bold;">
                                <tr>
                                    <th>#</th>
                                    <th>Date/Time</th>
                                    <th>Visitor Details</th>
                                    <th>Visit Details</th>
                                    <th>Purpose</th>
                                    <th>Log Type</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php 

                              $conn = mysqli_connect("localhost","root","","logging");
                              $i = 1;
                              $qry = $conn->query("select visitors_logs.created_at, visitors.department, visitors.staff,  visitors.name, visitors.contact, visitors.address, visitors.purpose, visitors_logs.log_type from visitors inner join visitors_logs on visitors.id = visitors_logs.visitors_id where date(visitors_logs.created_at) BETWEEN '{$from}' and '{$to}'");
                              while($row = $qry->fetch_assoc()):
                                  
                              ?>
                   <tr>
                      <td class=""><?php echo $i++; ?></td>
                      <td class="text-right" style="font-size: 16px;"><?php echo date("Y-m-d H:i",strtotime($row['created_at'])) ?></td>
                      <td>
                        <p class="m-0">
                          <small>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Name: </span><span style="font-size: 16px;"><?php echo $row['name'] ?></span><br>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Contact: </span><span style="font-size: 16px;"><?php echo $row['contact'] ?></span>
                          </small>
                        </p>
                      </td>

                      <td>
                        <p class="m-0">
                          <small>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Department: </span><span style="font-size: 16px;"><?php echo $row['department'] ?></span><br>
                            <span class="text-muted" style="font-size: 16px;font-weight: bold;">Staff: </span><span style="font-size: 16px;"><?php echo $row['staff'] ?></span>
                          </small>
                        </p>
                      </td>
                      
                      <td style="font-size: 16px;"><?php echo $row['purpose'] ?></td>
                      <td class="text-center"><?php echo $row['log_type'] ?></td>
                    </tr>
                              <?php endwhile; ?>
                          </tbody>
                      </table>
          </div>
</div>


</div>
</div>




{{-- <div class="row">
                <div class="col-12">
                  <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Visitors Log table</h6>
                      </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                      <div class="table-responsive p-0">


                        
       <table id="myTables" class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S/N</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date/Time</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Details</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Purpose</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Log Type</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 

                            $conn = mysqli_connect("localhost","root","","logging");
                            $i = 1;
                            $qry = $conn->query("select visitors_logs.created_at, visitors.name, visitors.visitor_type, visitors.contact, visitors.address, visitors.purpose, visitors_logs.log_type from visitors inner join visitors_logs on visitors.id = visitors_logs.visitors_id where date(visitors_logs.created_at) BETWEEN '{$from}' and '{$to}'");
                            while($row = $qry->fetch_assoc()):
                                
                            ?>
                                <tr>
                    <td class="text-center"><?php echo $i++; ?></td>
                    <td class="text-right"><?php echo date("Y-m-d H:i",strtotime($row['created_at'])) ?></td>

                    <td class="text-center">
                      <p class="m-0">
                        <small>
                          <span class="text-muted" style="font-weight: bolder;color: black; font-size: 18px;">Name: </span><span><?php echo $row['name'] ?></span><br>
                          <span class="text-muted" style="font-weight: bolder;color: black; font-size: 18px;">Visitor Type: </span><span><?php echo $row['visitor_type'] ?></span>
                        </small>
                      </p>
                    </td>
                    <td class="text-center">
                      <p class="m-0">
                        <small>
                          <span class="text-muted" style="font-weight: bolder;color: black; font-size: 18px;">Contact #: </span><span><?php echo $row['contact'] ?></span><br>
                          <span class="text-muted" style="font-weight: bolder;color: black; font-size: 18px;">Address: </span><span><?php echo $row['address'] ?></span>
                        </small>
                      </p>
                    </td>
                    <td class="text-center"><?php echo $row['purpose'] ?></td>
                    <td class="text-center"><?php echo $row['log_type'] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                       
      </table>




                      </div>
                    </div>
                  </div>
                </div>
</div> --}}





<br><br>

@endsection

{{-- TABLE SEARCH AND PAGINATION --}}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


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

@extends ('layouts.master')

{{-- @extends ('layouts.DBConnection') --}}

@section ('content')

<?php 
$from = isset($_GET['from']) ? $_GET['from'] : date("Y-m-d",strtotime(date('Y-m-d')." -1 week"));
$to = isset($_GET['to']) ? $_GET['to'] : date("Y-m-d");
?>

{{-- <div class="container"> --}}
    <h1 class="text-center">Visitors Log List</h1>
    <div class="card-tools">
      <button type="submit" name="btn_pdf" class="btn btn-flat btn-success" style="float: right" id="print"><span class="fas fa-print"></span>  Print</button>

      {{-- <form action="{{ route('visitors.printVisitorLog') }}" method="POST">
        @csrf
        <button type="submit" name="btn_pdf" class="btn btn-flat btn-success" style="float: right" id="print"><span class="fas fa-print"></span>  Print</button>
      </form> --}}
    		</div>

    {{-- <div>
        <a href="{{route('visitors.create')}}" class="btn btn-primary">Add</a>
    </div> --}}



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


{{-- <div id="print_out">
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
              <table class="table table-bordered table-stripped table-hover table-strip">
                            <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="16%">
                                <col width="22%">
                                <col width="22%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date/Time</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Purpose</th>
                                    <th>Log Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                $conn = mysqli_connect("localhost","root","","logging");
                                $i = 1;
                    //$where= "select created_at from visitors_logs where date(`created_at`) BETWEEN '{$from}' and '{$to}'";
                                $qry = $conn->query("select visitors_logs.created_at, visitors.name, visitors.contact, visitors.address, visitors.purpose, visitors_logs.log_type from visitors inner join visitors_logs on visitors.id = visitors_logs.visitors_id where date(visitors_logs.created_at) BETWEEN '{$from}' and '{$to}'");
                                while($row = $qry->fetch_assoc()):
                                    
                                ?>
                                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td class="text-right"><?php echo date("Y-m-d H:i",strtotime($row['created_at'])) ?></td>
                        <td class="text-center"><?php echo $row['name'] ?></td>
                        <td>
                          <p class="m-0">
                            <small>
                              <span class="text-muted">Contact #: </span><span><?php echo $row['contact'] ?></span><br>
                              <span class="text-muted">Address: </span><span><?php echo $row['address'] ?></span>
                            </small>
                          </p>
                        </td>
                        <td><?php echo $row['purpose'] ?></td>
                        <td class="text-center"><?php echo $row['log_type'] ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
            </div>
</div> --}}

<div class="row">
                <div class="col-12">
                  <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Visitors Log table</h6>
                      </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                      <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
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
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
</div>










<br><br>

@endsection



@push('custom-scripts')


<script>
	var dtTable;
	$(document).ready(function(){
		$('.table td,.table th').addClass('py-1 px-2 align-middle')
		dtTable = $('.table').dataTable();
		$('#filter-data').submit(function(e){
			e.preventDefault()
			location.href = location.href +"&"+$(this).serialize() 
		})

		$('#print').click(function(){
            start_loader()
			dtTable.fnDestroy();
            var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Visitors Logs List - Print View")
            var p = $('#print_out').clone()
            p.find('tr.text-light').removeClass("text-light bg-navy")
            _el.append(_head)
            _el.append('<div class="d-flex justify-content-center">'+
                      '<div class="col-1 text-right">'+
                      '<img src="" width="65px" height="65px" />'+
                      '</div>'+
                      '<div class="col-10">'+
                      '<h4 class="text-center">AITI-KACE VISITORS LOG SYSTEM</h4>'+
                      '<h4 class="text-center">Visitors Logs List</h4>'+
                      '</div>'+
                      '<div class="col-1 text-right">'+
                      '</div>'+
                      '</div><hr/>')
            _el.append(p.html())
            var nw = window.open("","","width=1200,height=900,left=250,location=no,titlebar=yes")
                     nw.document.write(_el.html())
                     nw.document.close()
                     setTimeout(() => {
                         nw.print()
                         setTimeout(() => {
                            nw.close()
                            end_loader()
							dtTable = $('.table').dataTable();
                         }, 200);
                     }, 500);
        })
	})
	
</script>


@endpush
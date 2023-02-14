  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('/js/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- <script src="{{ asset('/js/jquery/chart.js/Chart.min.js') }}"></script> --}}
  <script src="{{ asset('/js/jquery-easing/jquery.easing.min.js') }}"></script>
  {{-- <script src="{{ asset('/js/datatables/jquery.dataTables.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('/js/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('/js/sweetalert.min.js') }}"></script>
 


    <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
    ?>


<script>
    swal({
    title: "<?php echo $_SESSION['status'];  ?>",
    //text: "You clicked the button!",
    icon: "<?php echo $_SESSION['status_code'];  ?>",
    button: "OK Done!",
    });
</script>

 

    <?php
            
            unset($_SESSION['status']);
        }
    ?>













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
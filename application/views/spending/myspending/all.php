<div class="section-header">
	<h1>All List</h1>
</div>

   <div class="card">
   	<div class="card-body">
   		<div class="form-group">
   	 <div id="reportrange" class="form-control" style="background: #fff; cursor: pointer; 	 width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
   </div>
   	</div>
   </div>
<div id="load"></div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdate">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Spending Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="content"></div>
        </div>
        
      </div>
    </div>
  </div>
<script>
	$(document).ready(function(){
		var table = $('#tableAll').DataTable();
		var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
		$('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
		cb(start, end);
		var url = "<?= site_url('spending/tableAll') ?>"
		console.log(url)
		$('#load').load(url)

		$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
			var start = picker.startDate.format('YYYY-MM-DD')
			var end = picker.endDate.format('YYYY-MM-DD')
			var url = "<?= site_url('spending/tableAll') ?>/"+start+"/"+end
			console.log(url)
			$('#load').load(url)
		});
		$('.btnUpdate').click(function(){
			var id = $(this).data('id')
			var url = "<?= site_url('spending/update/') ?>"+id
			console.log(url)
			$('#modalUpdate').modal({show: true}).find('.modal-body').load(url)
      	$('#modalUpdate').appendTo("body") 

		})
	})
</script>

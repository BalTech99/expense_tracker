<div id="reportrange" class="form-control mb-3" style="background: #fff; cursor: pointer; 	 width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<div id="contentDaily"></div>
<script>
	$(document).ready(function(){
		var url = "<?= site_url('spending/tableAllDaily') ?>";
		$('#contentDaily').load(url)
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

		$('#reportrange').on('apply.daterangepicker', function(ev, picker) {
			var start = picker.startDate.format('YYYY-MM-DD')
			var end = picker.endDate.format('YYYY-MM-DD')
			var url = "<?= site_url('spending/tableAllDaily') ?>/"+start+"/"+end
			console.log(url)
			$('#contentDaily').load(url)
		});
	})
</script>

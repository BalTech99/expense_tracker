<?php 
 $start_date = isset($start) ? $start : null;
 $end_date = isset($end) ? $end : null;
 ?>
<div class="d-flex align-items-start mb-2">
      <h6 class="card-title mb-0" style="color: #212529;">Daily Total</h6>
      <div class="ml-auto">
       <a class="btn btn-danger btn-sm btn-rounded" href="<?= site_url('spending/printDailyTotal/'.$start_date.'/'.$end_date) ?>"><i class="fa fa-file-pdf"></i>&nbsp;Print PDF</a>
      </div>
    </div>
<table class="table table-striped table-hover" id="dailySpending">
	<thead>
		<th>No</th>
		<th>Date</th>
		<th>Total</th>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($allTotalDaily as $key => $value): ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= date('d M Y', strtotime($value->date)) ?></td>
				<td><b>Rp <?= $value->total ?></b></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#dailySpending').DataTable();
	})
</script>
<div class="d-flex align-items-start mb-2">
      <h6 class="card-title mb-0" style="color: #212529;">Monthly Total</h6>
      <div class="ml-auto">
       <a class="btn btn-danger btn-sm text-white" href="<?= site_url('spending/printMonthly') ?>"><i class="fa fa-file-pdf"></i>&nbsp;Print PDF</a>
      </div>
    </div>
<table class="table table-striped table-hover" id="monthlySpending">
	<thead>
		<th>No</th>
		<th>Month</th>
		<th>Total</th>
	</thead>
	<tbody>
		
			<?php $no = 1;foreach ($monthly as $key => $value): ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $value->month_name ?></td>
					<td><b>Rp <?= $value->total ?></b></td>
				</tr>

			<?php endforeach ?>
	</tbody>
</table>
<script>
	$(document).ready(function(){
		var table = $('#monthlySpending').DataTable();
	})
</script>

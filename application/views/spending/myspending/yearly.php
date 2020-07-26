<div class="d-flex align-items-start mb-2">
      <h6 class="card-title mb-0" style="color: #212529;">Yearly Total</h6>
      <div class="ml-auto">
       <a class="btn btn-danger btn-sm text-white" href="<?= site_url('spending/printYearly') ?>"><i class="fa fa-file-pdf"></i>&nbsp;Print PDF</a>
      </div>
    </div>
<table class="table table-striped table-hover" id="yearlySpending">
	<thead>
		<th>No</th>
		<th>Year</th>
		<th>Total</th>
	</thead>
	<tbody>
		<?php $no = 1;foreach ($yearly as $key => $value): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $value->year ?></td>
				<td><b><?= $value->total ?></b></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script>
	$(document).ready(function(){
		var table = $('#yearlySpending').DataTable();
	})
</script>

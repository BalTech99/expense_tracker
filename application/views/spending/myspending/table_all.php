
<?php 
 $start_date = isset($start) ? $start : null;
 $end_date = isset($end) ? $end : null;
 ?>
<div class="card">
	<div class="card-header">
      <h6 class="card-title mb-0" style="color: #212529;">All List</h6>
      <div class="ml-auto">
       <a class="btn btn-danger btn-sm text-white" href="<?= site_url('spending/printDaily/'.$start_date.'/'.$end_date) ?>"><i class="fa fa-file-pdf"></i>&nbsp;Print PDF</a>
      </div>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-striped table-hover" id="tableAll">
	<thead>
		<th>No</th>
		<th>Date</th>
		<th>Item Name</th>
		<th>Total</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($allList as $key => $value): ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= date('d M Y', strtotime($value->date)) ?></td>
				<td><?= $value->item_name ?></td>
				<td><b>Rp <?= $value->total ?></b></td>
				<td><div class="btn-group">
					<button class="btn btn-sm btn-warning btnUpdate" data-id="<?= $value->id ?>"><i class="fa fa-pencil"></i></button>
					<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $value->id ?>"><i class="fa fa-trash"></i></button>
				</div></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		var table = $('#tableAll').DataTable()
	})
</script>
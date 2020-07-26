<div class="card">
	<h6 class="card-title">home owner : <?php echo $owner->first_name ?> <?php echo $owner->last_name ?></h6>
	<table class="table table-hover table-striped">
		<thead>
			<th>No</th>
			<th>Member Name</th>
		</thead>
		<tbody>
			<?php $no = 1;foreach ($home as $key => $value): ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $value->first_name ?> <?php echo $value->last_name ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>
<table border = "1" style="width:100%; text-align:center;border-collapse:collapse;">
	<tr>
		<th>No</th>
		<th>year</th>
		<th>Total</th>
	</tr>
	<?php $total = 0; ?>
	<?php $no = 1;foreach ($yearly as $key => $value): ?>
		<tr>
			<td><?= $no++ ?></td>
			<td><?= $value->year ?></td>
			<td><b>Rp <?= $value->total ?></b></td>
		</tr>
		<?php $total = $total + $value->total ?>
	<?php endforeach ?>
	<tr>
		<td colspan = "2"><b>Total Overall</b></td>
		<td><b>Rp <?= $total ?></b></td>
	</tr>
</table>
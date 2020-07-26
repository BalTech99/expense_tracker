<div class="section-header">
	<h1>Assigned Home</h1>
</div>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Assigned Home</h4>
	</div>
	<div class="card-body">
		<table class="table table-hover table-striped" id="tblAssigned">
			<thead>
				<th>No</th>
				<th>Home Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $no = 1;foreach ($myhome as $key => $value): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $value->home_name ?></td>
						<td><div class="btn-group">
							<button class="btn btn-sm btn-info btnDetail" data-id="<?= $value->home_id ?>"><i class="fa fa-eye"></i></button>
						</div></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="homeDetail">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Home Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function(){
		var table = $('#tblAssigned').DataTable()

		$('.btnDetail').click(function(e){
			var id = $(this).data('id')
			var url = "<?= site_url('member/homeDetail/') ?>"+id

			$('#homeDetail').modal({show:true}).find('.modal-body').load(url)
			$('#homeDetail').appendTo('body')
		})
	})
</script>
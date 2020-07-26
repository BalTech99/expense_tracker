<div class="section-header">
	<h1>Home Member List</h1>
</div>
<?php if ($this->session->flashdata('success')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
<?php elseif ($this->session->flashdata('error')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('error') ?>'></div>
<?php endif; ?>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Home Member List</h4>
		<div class="ml-auto">
       <button class="btn btn-sm btn-primary addBtn"><i class="fa fa-plus">&nbsp;Add Participant</i></button>
      </div>
	</div>
	<div class="card-body">
		<table class="table table-hover table-striped">
			<thead>
				<th>No</th>
				<th>Member Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $no = 1;foreach ($member as $key => $value): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $value->first_name ?>&nbsp;<?= $value->last_name ?></td>
						<td><button class="btn btn-danger btn-sm btnDelete" data-id="<?= $value->id ?>"><i class="fa fa-trash"></i></button></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalAddParticipant">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Home Participant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        
      </div>
    </div>
  </div>

 <script>
 	$(document).ready(function(){

 		$('.addBtn').click(function(){
 			var id = "<?= $home_id ?>"
 			var url = "<?= site_url('member/add_modal/') ?>"+id
 			$('#modalAddParticipant').modal({show:true}).find('.modal-body').load(url)
 			$('#modalAddParticipant').appendTo('body')
 		})
 		var icon;
 		<?php if ($this->session->flashdata('success')): ?>
 			icon = "success"
		<?php elseif ($this->session->flashdata('error')): ?>
			icon = "warning"
		<?php endif; ?>
		var flashdata = $('.flash-data').data('flash');
if (flashdata) {
  swal ({
    title: "Spending App",
    text: flashdata,
    icon: icon,
  })
}
 	})
 </script>
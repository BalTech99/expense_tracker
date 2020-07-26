<div class="section-header">
	<h1>Home</h1>
</div>
<?php if ($this->session->flashdata('success')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
<?php endif; ?>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Home List</h4>
		<div class="ml-auto">
       <a class="btn btn-sm btn-primary text-white" href="<?php echo site_url('member/myhome') ?>"><i class="fa fa-list">&nbsp;Assigned</i></a>
       <button class="btn btn-sm btn-primary addBtn"><i class="fa fa-plus">&nbsp;Add Home</i></button>
      </div>
	</div>
	<div class="card-body">
		<table class="table table-hover table-striped" id="tblHome">
			<thead>
				<th>No</th>
				<th>Home Name</th>
				<th>Action</th>
			</thead>
			<tbody>
				<?php $no =1;foreach ($myhome as $key => $value): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $value->home_name ?></td>
						<td><div class="btn-group">
							<button class="btn btn-sm btn-warning btnUpdate"><i class="fa fa-pencil"></i></button>
							<button class="btn btn-sm btn-danger btnDelete"><i class="fa fa-trash"></i></button>
							<a class="btn btn-info btn-sm text-white" href="<?= site_url('member/index/'. $value->id) ?>">View Detail</a>
						</div></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalAddHome">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Home</h5>
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

  		var table = $('#tblHome').DataTable()
  		$('.addBtn').click(function(e){
  			var url = "<?= site_url('home/add_modal') ?>"
  			$('#modalAddHome').modal({show:true}).find('.modal-body').load(url);
  			$('#modalAddHome').appendTo('body')
  		})
  		var flashdata = $('.flash-data').data('flash');
if (flashdata) {
  swal ({
    title: "Spending App",
    text: flashdata,
    icon: "success",
  })
}
  	})
  </script>
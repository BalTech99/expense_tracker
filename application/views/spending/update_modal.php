<?php $this->load->view('partial/css.php') ?>
<form class="form-horizontal" method="post" action="<?= site_url('spending/update/'.$spending->id) ?>">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
		<label>Item Name</label>
		<input type="text" name="item_name" placeholder="Item Name" class="form-control" value="<?= $spending->item_name ?>">
	</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
		<label>Total</label>
		<input type="text" name="total" placeholder="Total" class="form-control" value="<?= $spending->total ?>">
	</div>
		</div>
	</div>
	<div class="modal-footer">
		<input type="submit" class="btn btn-primary" name="Update" value="Update">
    <button class="btn btn-danger " data-dismiss="modal">Close</button>
  </div>
</form>
<?php $this->load->view('partial/css') ?>

<form action="<?= site_url('home/add_modal') ?>" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
		<label>Home Name</label>
		<input type="text" name="home_name" class="form-control" placeholder="Home Name">
	</div>
		</div>
		<div class="col-md-12">
			<div class="form-group">
		<label>Home Description</label>
		<input type="text" name="home_description" class="form-control" placeholder="Home Description">
	</div>
		</div>
		<div class="col-md-12">
			<input type="submit" name="submit" value="Create" class="btn btn-sm btn-primary">
		</div>
	</div>
</form>

<form action="<?= site_url('member/add_modal/'.$home_id) ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="form-group">
		<label>Email</label>
		<input type="email" name="participant" class="form-control" placeholder="Email Address">
	</div>
		</div>
		<div class="col-md-12 col-lg-12">
			<input type="submit" name="submit" class="btn btn-sm btn-primary" value="Add">
		</div>
	</div>
</form>
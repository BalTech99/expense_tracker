<div class="section-header">
	<h1>My Profile</h1>
</div>
<?php if ($this->session->flashdata('success')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
<?php endif; ?>

<div class="row">
	<div class="col-md-3">
		<div class="card"  style="height:350px; max-height: 350px;">
			<div class="card-body">
				<div id="information"></div>
				<div class="d-flex justify-content-center mt-3" id="pic-profile">
						<img src="<?= base_url() ?><?= $this->session->userdata('photo_profile') ?>" class="float-left rounded-circle" style="height:100px; width:100px;">


				</div>
<center>
	<input type="file" name="file" class="fileUpload" id="selectedFile" style="display: none;" />
<input type="button" class=" mt-3 btn btn-primary" value="Browse..." onclick="document.getElementById('selectedFile').click();" />
				
	
</center>						
			</div>
		</div>
	</div>
	<div class="col-md-12 col-lg-9">
		<div class="card">
	<div class="card-header">
		<h4 class="card-title">Update my profile</h4>
	</div>
	<div class="card-body">
		<form class="form-horizontal" method="POST" action="<?= site_url('users/update_profile') ?>" enctype="multipart/form-data">
		<div class="row">
			
			<div class="col-md-6">
				<div class="form-group">
					<label>First Name</label>
					<input type="text" class="form-control" name="first_name" value="<?= $my_profile->first_name ?>">
				</div>
				
			</div>
			<div class="col-md-6">
<div class="form-group">
					<label>Last Name</label>
					<input type="text" class="form-control" name="last_name" value="<?= $my_profile->last_name ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Username</label>
				<input type="text" class="form-control" name="username" value="<?= $my_profile->username ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Email</label>
				<input type="text" class="form-control" name="email" value="<?= $my_profile->email ?>">
				</div>
			</div>
			<div class="col-md-12">
				<input type="submit" class="btn btn-primary btn-sm" value="Update">
			</div>
		</div>
		</form>
	</div>
</div>
	</div>
</div>
<script>
	$(document).ready(function(){

		$('.fileUpload').change(function(e){
			var url = "<?= site_url('users/upload_pic') ?>"
			var file = this.files[0]
			var form_data = new FormData()
			form_data.append("file",file)
			$.ajax({
				url : url,
				method : "post",
				data : form_data,
				contentType : false,
				cache : false,
				processData: false,
				success : function(res){
					$('#pic-profile').html(res)
					$('#information').html("<div class='alert alert-success'> Sucessfully Changed </div>")
				}
			})
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
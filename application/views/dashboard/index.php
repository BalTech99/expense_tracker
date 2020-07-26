
<div class="section-header">
	<h1>Dashboard</h1>
</div>

<?php if ($this->session->flashdata('success')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
<?php endif; ?>

<div class="row">
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="far fa-calendar"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Today</h4>
				</div>
				<div class="card-body">
					<?= isset($dailyTotal->total) ? $dailyTotal->total : 0 ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="far fa-calendar"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Monthly</h4>
				</div>
				<div class="card-body">
					<?= isset($monthlyTotal->total) ? $monthlyTotal->total : 0 ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="far fa-calendar"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Yearly</h4>
				</div>
				<div class="card-body">
					<?= isset($yearlyTotal->total) ? $yearlyTotal->total : 0 ?>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-12">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="fas fa-calendar"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Overall</h4>
				</div>
				<div class="card-body">
					<?= isset($overallTotal->total) ? $overallTotal->total : 0 ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Today Spending List <i><?= date("d M Y") ?></i></h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
				<?php if (!empty($my_spending)): ?>
					
					<table class="table table-hover table-striped" id="tblSpending">
					<thead>
						<th>No</th>
						<th>Item Name</th>
						<th>Total</th>
						<th></th>
					</thead>
					<tbody>
						<?php  $no = 1;  foreach ($my_spending as $value): ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $value->item_name ?></td>
								<td><?= $value->total ?></td>
								<td><div class="btn-group">
									<button class="btn btn-sm btn-warning btnUpdate" data-id="<?= $value->id ?>"><i class="fa fa-pencil"></i></button>
									<button class="btn btn-sm btn-danger btnDelete" data-id="<?= $value->id ?>"><i class="fa fa-trash"></i></button>
								</div></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<?php else: ?>
					<div class="alert alert-success">
                      No Spending Today
                    </div>
				<?php endif ?>

				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 col-md-6 col-sm-6 col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Spending Graph</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<ul class="nav nav-pills nav-justified" id="myTab3" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="daily-spending" data-toggle="tab" href="#daily" role="tab" aria-controls="home" aria-selected="true">Daily</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="monthly-spending" data-toggle="tab" href="#monthly" role="tab" aria-controls="profile" aria-selected="false">Monthly</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="yearly-spending" data-toggle="tab" href="#yearly" role="tab" aria-controls="contact" aria-selected="false">Yearly</a>
			</li>
			
		</ul>
		<div class="tab-content" id="myTabContent2">
			<div class="tab-pane fade show active" id="daily" role="tabpanel" aria-labelledby="daily-spending">
				<?php $this->load->view('dashboard/chart/daily',$dailyChart) ?>
			</div>
			<div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-spending">
				
			</div>
			<div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-spending">
				
			</div>
			
		</div>
		
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdate">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Spending Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        
      </div>
    </div>
  </div>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
	$(document).ready(function(){

$('.btnUpdate').click(function(e){
	var id = $(this).data('id')
	var url = "<?= site_url('spending/update/') ?>"+id
	$('#modalUpdate').modal({show: true}).find('.modal-body').load(url)
	$('#modalUpdate').appendTo('body')
})

$('.btnDelete').click(function(e){
	var id = $(this).data('id')
	var url = "<?= site_url('spending/delete/') ?>"+id
	swal({
      title: "Delete",
      text: "Are you sure to delete this Activity?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((res) => {
        if (res) {
          $.ajax({
          	url : url,
          	type : "GET",
          	success : function(){
          		location.reload()
          	}
          })
        }else {
          swal("Canceled!!");
        }
      });
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
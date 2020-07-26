<div class="section-header">
	<h1>My Spending</h1>
</div>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">All my spending list</h4>
		<div class="ml-auto">
       <a href="<?= site_url('spending/allList') ?>" class="btn btn-sm btn-primary "><i class="fa fa-list">&nbsp;All List</i></a>
      </div>
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
				<?php $this->load->view('spending/myspending/daily', $daily) ?>

			</div>
			<div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-spending">
				<?php $this->load->view('spending/myspending/monthly', $monthly) ?>
				
			</div>
			<div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-spending">
				<?php $this->load->view('spending/myspending/yearly',$yearly) ?>
				
			</div>
			
		</div>
		
		</div>
	</div>
</div>

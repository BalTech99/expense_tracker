<ul class="nav nav-pills nav-justified" id="myTab3" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="selfSpending" data-toggle="tab" href="#self-spending" role="tab" aria-controls="home" aria-selected="true">Self Spending</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="homeSpending" data-toggle="tab" href="#home-spending" role="tab" aria-controls="profile" aria-selected="false">Home Spending</a>
  </li>
  
</ul>
<div class="tab-content" id="myTabContent2">
  <div class="tab-pane fade show active" id="self-spending" role="tabpanel" aria-labelledby="selfSpending">
    <form class="form-horizontal" method="post" action="<?= site_url('spending/add_modal') ?>">
      <div class="form-group">
        <label>Item Name</label>
        <input type="text" name="item_name" class="form-control" placeholder="Item Name">
      </div>
      <div class="form-group">
        <label>Total</label>
        <input type="text" name="total" class="form-control" placeholder="Total">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="Add" value="submit">
        <button class="btn btn-danger " data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
  <div class="tab-pane fade" id="home-spending" role="tabpanel" aria-labelledby="homeSpending">
    <form class="form-horizontal" method="post" action="<?= site_url('spending/add_home_modal') ?>">
    <div class="form-group">
      <label>Select Home</label>
      <select class="form-control" name="home_id">
        <?php foreach ($home as $key => $value): ?>
          <option value="<?= $value->id ?>"><?= $value->home_name ?></option>
        <?php endforeach ?>
      </select>
    </div>
      <div class="form-group">
        <label>Item Name</label>
        <input type="text" name="item_name" class="form-control" placeholder="Item Name">
      </div>
      <div class="form-group">
        <label>Total</label>
        <input type="text" name="total" class="form-control" placeholder="Total">
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="Add" value="submit">
        <button class="btn btn-danger " data-dismiss="modal">Close</button>
      </div>
    </form>
  </div>
  
</div>
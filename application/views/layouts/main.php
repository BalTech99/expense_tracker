<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard</title>
    <?php $this->load->view("partial/css.php") ?>
    <?php $this->load->view("partial/javascript.php") ?>
    <style>
    body { width: 100%; height: 100%; }
    .btn-group-fab {
    position: fixed;
    width: 50px;
    height: auto;
    right: 20px; bottom: 20px;
    }
    .btn-group-fab div {
    position: relative; width: 100%;
    height: auto;
    }
    .btn-group-fab .btn {
    position: absolute;
    bottom: 0;
    border-radius: 50%;
    display: block;
    margin-bottom: 4px;
    width: 40px; height: 40px;
    margin: 4px auto;
    }
    .btn-group-fab .btn-main {
    width: 50px; height: 50px;
    right: 50%; margin-right: -25px;
    z-index: 9;
    }
    .btn-group-fab .btn-sub {
    bottom: 0; z-index: 8;
    right: 50%;
    margin-right: -20px;
    -webkit-transition: all 2s;
    transition: all 0.5s;
    }
    .btn-group-fab.active .btn-sub:nth-child(2) {
    bottom: 60px;
    }
    .btn-group-fab.active .btn-sub:nth-child(3) {
    bottom: 110px;
    }
    .btn-group-fab.active .btn-sub:nth-child(4) {
    bottom: 160px;
    }
    .btn-group-fab .btn-sub:nth-child(5) {
    bottom: 210px;
    }
    </style>
  </head>
  <body>
    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg bg-success"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            </ul>
          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url() ?><?= $this->session->userdata['photo_profile'] ?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata['first_name'] ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= site_url('users/my_profile') ?>" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              
              <div class="dropdown-divider"></div>
              <a href="<?= site_url('dashboard/logout') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Spending Apps</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SA</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= site_url("dashboard/index") ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li><a class="nav-link" href="<?= site_url("spending/index") ?>"><i class="fas fa-money"></i> <span>My Spending</span></a></li>
            <li><a class="nav-link" href="<?= site_url("home/index") ?>"><i class="fas fa-home"></i> <span>My Home</span></a></li>
            
          </ul>
        </aside>
      </div>
      <div class="main-content">
        <section class="section">
          
          <?= $contents ?>
          <div class="btn-group-fab" role="group" aria-label="FAB Menu">
            <div>
              <button type="button" class="btn btn-main btn-primary has-tooltip" data-placement="left" title="Menu" id="btnAdd"> <i class="fas fa-plus"></i> </button>
            </div>
          </div>
        </section>
      </div>
      <footer class="main-footer bg-white">
        <div class="footer-left">
          Muhammad Iqbal Fajriansah <?= date("Y") ?>
        </div>
      </footer>
    </div>
  </div>
  <div class="modal fade" tabindex="-1" role="dialog" id="modalAdd">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Today Spending</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>
<script>
$(document).ready(function(){
$('#btnAdd').click(function(){
var url = "<?= site_url('spending/add_modal') ?>"
$('#modalAdd').modal({
show:true,
'tabindex': false,
'backdrop':'static',
'keyboard':false,
}).find('.modal-body').load(url)
})
})
</script>
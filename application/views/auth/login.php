<?php $this->load->view('partial/css.php') ?>
<?php $this->load->view('partial/javascript.php') ?>
<?php date_default_timezone_set("Asia/Jakarta"); ?>
<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <div id="app">
      <?php if ($this->session->flashdata('success')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('success') ?>'></div>
 <?php elseif ($this->session->flashdata('error')): ?>
<div class="flash-data" data-flash='<?= $this->session->flashdata('error') ?>'></div>
<?php endif; ?>
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Spending App</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            <form method="POST" action="<?= site_url('auth/doLogin') ?>">
              <div class="form-group">
                <label for="email">Email / Username</label>
                <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

            

              <div class="form-group text-right">
                <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a>
                <input type="submit" name="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4" value="Login">
              </div>

              <div class="mt-5 text-center">
                Don't have an account? <a href="<?php echo site_url('auth/register') ?>">Create new one</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Muhammad Iqbal Fajriansah
              
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">
                  <?php if (date("H") >= 0 && date("H") <= 12): ?>
                    Good Morning
                    <?php elseif (date("H") >= 13 && date("H") <= 18): ?>
                    Good Afternoon
                    <?php elseif (date("H") >= 19 && date("H") <= 24): ?>
                    Good Evening
                  <?php endif ?>
                </h1>
                <h5 class="font-weight-normal text-muted-transparent">Batam, Indonesia</h5>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <script>
    $(document).ready(function(){
      var flashdata = $('.flash-data').data('flash');
      var icon;
      <?php if ($this->session->flashdata('success')): ?>
        icon = "success";
        <?php else: ?>

          icon = "warning";
      <?php endif; ?>
if (flashdata) {
  swal ({
    title: "Spending App",
    text: flashdata,
    icon: icon,
  })
}
    })
  </script>

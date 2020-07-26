<?php $this->load->view('partial/css.php') ?>
<?php $this->load->view('partial/javascript.php') ?>
<meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="../assets/img/stisla-fill.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Spending App</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
             <form action="<?= site_url('auth/doLogin') ?>" method="POST">
                <div class="form-label-group">
                  <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Username / Email address" required autofocus>
                  <label for="inputEmail">Username / Email</label>
                </div>

                <div class="form-label-group">
                  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Password</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember password</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign in</button>
                <div class="text-center">
                  <a class="small" href="<?= site_url('auth/register') ?>">Don't Have An Account ?</a></div>
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
                <h1 class="mb-2 display-4 font-weight-bold">Good Morning</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
             
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

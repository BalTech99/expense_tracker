<?php $this->load->view('partial/login_css.php') ?>
<title>Register Page</title>
<div class="container-fluid">
  <div class="row no-gutter">
    <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
    <div class="col-md-8 col-lg-6">
      <div class="login d-flex align-items-center py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-9 col-lg-8 mx-auto">
              <h3 class="login-heading mb-4">Welcome, Please Register Below</h3>
              <form action="<?= site_url('auth/register') ?>" method="POST">
                <div class="form-label-group">
                  <input name="first_name" type="text" id="firstname" class="form-control" placeholder="First tname" required autofocus>
                  <label for="firstname">Firstname</label>
                </div>
                <div class="form-label-group">
                  <input name="last_name" type="text" id="lastname" class="form-control" placeholder="Last Name" required autofocus>
                  <label for="lastname">Last Name</label>
                </div>
                <div class="form-label-group">
                  <input name="email" type="text" id="email" class="form-control" placeholder="Email" required autofocus>
                  <label for="email">Email</label>
                </div>

                <div class="form-label-group">
                  <input name="username" type="text" id="username" class="form-control" placeholder="Username" required autofocus>
                  <label for="username">Username</label>
                </div>

                <div class="form-label-group">
                  <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>

                
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Register</button>
                <div class="text-center">
                  <a class="small" href="<?= site_url('auth/login') ?>">Already Registered ?</a></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
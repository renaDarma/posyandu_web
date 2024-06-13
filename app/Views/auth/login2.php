<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Masyarakat | SIP Silir</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('admin')?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('admin')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('admin')?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?= base_url('admin')?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('admin')?>/build/css/custom.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        background-color: #FFF !important;
        background-size: 100%;
      }
      .login_wrapper {
        position: relative;
      }
      .toggle-password {
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
      }
      .password-icon {
        font-size: 20px;
      }
    </style>
  </head>

  <script>
    function togglePassword() {
      var passwordInput = document.getElementById("password");
      var toggleIcon = document.getElementById("toggle-icon");

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.classList.remove("fa-eye");
        toggleIcon.classList.add("fa-eye-slash");
      } else {
        passwordInput.type = "password";
        toggleIcon.classList.remove("fa-eye-slash");
        toggleIcon.classList.add("fa-eye");
      }
    }
  </script>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
          <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('pesan_error')) : ?>
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan_error'); ?>
                    </div>
                </div>
            <?php endif; ?>
          <h4 class="card-header"><?=lang('Auth.loginTitle')?></h4>

          <form action="/login_action_user" method="post">
						<?= csrf_field() ?>
              <h1>Log In Masyarakat</h1>
            <!-- <div>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div> -->
              <div>
                <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="Username / NIK" required="" />
                <div class="invalid-feedback">
								  <?= session('errors.login') ?>
							  </div>
              </div>   
              <div>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password"  placeholder="<?=lang('Auth.password')?>" required="" />
                <div class="invalid-feedback">
								  <?= session('errors.password') ?>
							  </div>
              </div>

              <div>
                <button type="submit" class="btn btn-success"><?=lang('Auth.loginAction')?></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!-- <p class="change_link">Belum punya akun?
                  <a href="#signup" class="to_register"><b>Registrasi</b></a>
                </p> -->
                  <a class="btn btn-secondary" href="<?php echo base_url('/home/index') ?>">Beranda</a>
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><img src="<?= base_url('awal')?>/assets/img/favicons/icon.png" alt="" />SIP Silir</h1>
                  <p>©<?= date('Y'); ?></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>

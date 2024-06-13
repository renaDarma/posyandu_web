<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login & Registrasi | SIP Silir</title>

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
        background-color: #233758 !important;
        background-size: 100%;
      }
      .login_wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
      }
      .login_form {
        background-color: #2c3446;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        padding: 30px;
        text-align: center;
        max-width: 400px;
        width: 100%;
      }
      .form-control {
        background-color: #1c2331;
        color: #fff;
        border: 1px solid #4d5869;
      }
      .btn-light {
        background-color: #6c757d;
        color: #fff;
        padding: 8px 50px;
        border: none;
        border-radius: 20px;
        cursor: pointer;
        outline: none; /* Menghilangkan outline pada button */
        box-shadow: none; /* Menghilangkan bayangan pada button */
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
    function togglePasswordVisibility(inputId) {
      const passwordInput = document.getElementById(inputId);
      const toggleIcon = passwordInput.nextElementSibling.querySelector('i');

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
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
          <h4><?= lang('Auth.register') ?></h4>
          <form action="/register_action" method="post">
                        <?= csrf_field() ?>
              <h1>Register Kader</h1>
              <div>
                  <?php if(!empty($validasi)) {
                    if($validasi->getError('username')) {?>
                      <small class="text-danger pl-3">
                          <?= $error = $validasi->getError('username'); ?>
                      </small>
                    
                  <?php } }?>
                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>"  />
              </div>
              <div>
                <?php if(!empty($validasi)) {
                    if($validasi->getError('email')) {?>
                      <small class="text-danger pl-3">
                          <?= $error = $validasi->getError('email'); ?>
                      </small>
                    
                <?php } }?>
                <input type="text" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" />
              </div>
              <div>
                <?php if(!empty($validasi)) {
                    if($validasi->getError('usernohp')) {?>
                      <small class="text-danger pl-3">
                          <?= $error = $validasi->getError('usernohp'); ?>
                      </small>
                    
                <?php } }?>
                <input type="text" class="form-control <?php if (session('errors.usernohp')) : ?>is-invalid<?php endif ?>" id="usernohp" name="usernohp" placeholder="No Telepon" autocomplete="off"/>
              </div>
              <div class="position-relative">
                <?php if(!empty($validasi)) {
                    if($validasi->getError('password')) {?>
                      <small class="text-danger pl-3">
                          <?= $error = $validasi->getError('password'); ?>
                      </small>
                    
                <?php } }?>
                <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off"/>
                <div class="toggle-password" onclick="togglePasswordVisibility('password')">
                  <i class="fa fa-eye password-icon"></i>
                </div>
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
              </div>
              
              <div class="position-relative">
                <?php if(!empty($validasi)) {
                    if($validasi->getError('pass_confirm')) {?>
                      <small class="text-danger pl-3">
                          <?= $error = $validasi->getError('pass_confirm'); ?>
                      </small>
                    
                <?php } }?>
                <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="pass_confirm" name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off"/>
                <div class="toggle-password" onclick="togglePasswordVisibility('pass_confirm')">
                  <i class="fa fa-eye password-icon"></i>
                </div>
                <div class="invalid-feedback">
                  <?= session('errors.pass_confirm') ?>
                </div>
              </div>
              <div>
                <button type="submit" class="btn btn-light"><?=lang('Auth.register')?></button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun?
                  <a href="/login" class="to_register"><b>Log in</b></a>
                </
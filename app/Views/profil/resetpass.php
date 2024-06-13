<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Reset Password</h3>
            <?php if(session()->getFlashdata('pesan')) : ?>
                  <div class="col-md-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= session()->getFlashdata('pesan'); ?>
                    </div>
                  </div>
            <?php endif; ?>
          </div>
        </div>
       
        <div class="clearfix"></div>
        <div class="row">
              <div class="col-md-12">
                    <div class="x_panel">
                    	<h2>Form Reset Password</h2>
                      <?php if(session()->getFlashdata('pesan')) : ?>
                        <div class="col-md-12">
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                          </div>
                        </div>
                      <?php endif; ?>
                      <div class="card">
                        <h2 class="card-header"><?=lang('Auth.resetYourPassword')?></h2>
                          <div class="card-body">

                              <?= view('Myth\Auth\Views\_message_block') ?>

                              <!-- <p><?=lang('Auth.enterCodeEmailPassword')?></p> -->

                              <form action="<?= '/store_passresetku/'.service('uri')->getSegment(2) ?>" method="post">
                                  <?= csrf_field() ?>

                                  <div class="form-group">
                                      <label for="password"><?=lang('Auth.newPassword')?></label>
                                      <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            name="password">
                                      <div class="invalid-feedback">
                                          <?= session('errors.password') ?>
                                      </div>
                                  </div>

                                  <div class="form-group">
                                      <label for="pass_confirm"><?=lang('Auth.newPasswordRepeat')?></label>
                                      <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                            name="pass_confirm">
                                      <div class="invalid-feedback">
                                          <?= session('errors.pass_confirm') ?>
                                      </div>
                                  </div>

                                  <br>

                                  <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.resetPassword')?></button>
                              </form>

                          </div>
                      </div>
                </div>
            </div>
        </div>
	</div>
</div>

 <?= $this->endSection() ?>
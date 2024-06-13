<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Halaman Edit Profil</h3>
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
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                    	<h2>Form Edit Profil</h2>
                      <?php if (session()->get('role') == 'admin') : ?>
                        <form class="form-horizontal form-label-left" action="<?php echo base_url('/profil/editprofil'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                    						<label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Email
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=hidden id="id" name="id" value="<?= $profil['id'] ?>" class="form-control">
                                    <input type=email id="email" name="email" value="<?= $profil['email'] ?>" class="form-control">
                                </div>
                            </div>
                      			<div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=text id="username" name="username" value="<?= $profil['username'] ?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Nama Lengkap
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=text id="fullname" name="fullname" value="<?= $profil['fullname'] ?>" class="form-control">
                              </div>
                            </div>
                      			<div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="usernohp">Nomor HP
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=number id="usernohp" name="usernohp" value="<?= $profil['usernohp'] ?>" class="form-control">
                              </div>
                            </div>
                        <?php endif; ?>
                      <?php if (session()->get('role') == 'kader') : ?>
                        <form class="form-horizontal form-label-left" action="<?php echo base_url('/profil/profiledit'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                    						<label class="col-form-label col-md-3 col-sm-3 label-align" for="Email">Email
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=hidden id="id" name="id" value="<?= $profil['id'] ?>" class="form-control">
                                    <input type=email id="email" name="email" value="<?= $profil['email'] ?>" class="form-control">
                                </div>
                            </div>
                      			<div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=text id="username" name="username" value="<?= $profil['username'] ?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Nama Lengkap
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=text id="fullname" name="fullname" value="<?= $profil['fullname'] ?>" class="form-control">
                              </div>
                            </div>
                      			<div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="usernohp">Nomor HP
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=number id="usernohp" name="usernohp" value="<?= $profil['usernohp'] ?>" class="form-control">
                              </div>
                            </div>
                      <?php endif; ?>
                      <?php if (session()->get('role') == 'masyarakat') : ?>
                    		<form class="form-horizontal form-label-left" action="<?php echo base_url('/profil/editprofilku'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                    						<label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=hidden id="id" name="id" value="<?= $profil['id'] ?>" class="form-control">
                                    <input type=email id="email" name="email" value="<?= $profil['email'] ?>" class="form-control">
                                </div>
                            </div>
                      			<div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">Username
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=text id="username" name="username" value="<?= $profil['username'] ?>" class="form-control">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="fullname">Nama Lengkap
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=text id="fullname" name="fullname" value="<?= $profil['fullname'] ?>" class="form-control">
                              </div>
                            </div>
                      			<div class="form-group row">
                              <label class="col-form-label col-md-3 col-sm-3 label-align" for="usernohp">Nomor HP
                              </label>
                              <div class="col-md-6 col-sm-6">
                                  <input type=number id="usernohp" name="usernohp" value="<?= $profil['usernohp'] ?>" class="form-control">
                              </div>
                            </div>
                          <?php endif; ?>	
                          
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <tbody>
                                    <tr>
                                      <td>
                                      <button type="submit" id="simpan" name="simpan" class="btn btn-info">Simpan Perubahan</button>
                                      </td>
                                    </tr>  
                                  </tbody>
                                </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>

 <?= $this->endSection() ?>
<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<style>
    .merah {
        color: red;
    }
</style>

 <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Layanan Pendaftaran KB</h3>
              </div>
            </div>
           
            <div class="clearfix"></div>
            <?php if(session()->getFlashdata('error')) : ?>
              <div class="row">
                  <div class="col-12 col-md-12">
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <i class="bi bi-file-excel"></i>
                          <?= session()->getFlashdata('error'); ?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  </div>
              </div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('pesan')) : ?>
              <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                   <?= session()->getFlashdata('pesan'); ?>
                 </div>
              </div>
            <?php endif; ?>
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="divider-dashed"></div>
                            <h2>Pendaftaran Keluarga Berencana (KB)</h2>
                        <div class="divider-dashed"></div>
                        <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" action="/daftarkb/submitkb" method="post" enctype="multipart/form-data">
                          <?= csrf_field(); ?>
                          <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align">Nama Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('namasuami')) ? 
                                'is-invalid' : ''; ?>" name="namasuami" placeholder="Nama Suami" value="<?= old('namasuami'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namasuami'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align">Nama Istri</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('namaistri')) ? 
                                'is-invalid' : ''; ?>" name="namaistri" placeholder="Nama Istri" value="<?= old('namaistri'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namaistri'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align">No HP yang Aktif</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" name="nohp" placeholder="No HP yang Aktif" value="<?= old('nohp'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                         <div class="ln_solid"></div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <tbody>
                                    <tr>
                                      <td>
                                          <button type="submit" class="btn btn-info">Kirim</button>
                                          <a href="<?php base_url('masyarakat') ?>/index.php" class="btn btn-secondary">Kembali</a>
                                      </td>
                                    </tr>  
                                  </tbody>
                                </div>
                            </div>
                          </form>   
                        <!-- page content -->
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
 <!-- /page content -->
 <?= $this->endSection() ?>
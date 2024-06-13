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
                <h3>Layanan Pendaftaran Ibu Hamil</h3>
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
                            <h2>Pendaftaran Ibu Hamil</h2>
                        <div class="divider-dashed"></div>
                        <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" action="/daftarbumil/submitbumil" method="post" enctype="multipart/form-data">
                          <?= csrf_field(); ?>
                          <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align">No KK</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nokk')) ? 
                                'is-invalid' : ''; ?>" name="nokk" placeholder="No KK" value="<?= old('nokk'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nokk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align">NIK Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnik')) ? 
                                'is-invalid' : ''; ?>" name="ayahnik" placeholder="NIK Suami" value="<?= old('ayahnik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align">Nama Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnama')) ? 
                                'is-invalid' : ''; ?>" name="ayahnama" placeholder="Nama Suami" value="<?= old('ayahnama'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Tempat dan Tanggal Suami</label>
                            <div class="col-md-3 col-sm-3">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahtmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ayahtmptlhr" placeholder="Tempat Lahir" value="<?= old('ayahtmptlhr'); ?>">
                                  <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <input class="form-control <?= ($validation->hasError('ayahtgllhr')) ? 
                                'is-invalid' : ''; ?>" class='date' type="date" name="ayahtgllhr" required='required' value="<?= old('ayahtgllhr'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 label-align" for="ayahagama">Agama Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="ayahagama" id="ayahagama" class="form-control <?= ($validation->hasError('ayahagama')) ? 
                                        'is-invalid' : ''; ?>" name="ayahagama" value="<?= old('ayahagama'); ?>" required>
                                    <option value="" disabled selected>-- Pilih Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahagama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 label-align" for="ayahpendidikan">Pendidikan Terakhir Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="ayahpendidikan" id="ayahpendidikan" class="form-control <?= ($validation->hasError('ayahpendidikan')) ? 
                                    'is-invalid' : ''; ?>" name="ayahpendidikan" value="<?= old('ayahpendidikan'); ?>" required>
                                    <option value="" disabled selected>-- Pilih Pendidikan Terakhir --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1/D2">D1/D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpendidikan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Pekerjaan Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahpekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ayahpekerjaan" placeholder="Pekerjaan Suami"  value="<?= old('ayahpekerjaan'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpepekerjaan'); ?>
                                </div>
                            </div>
                        </div>	
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">NO HP Suami</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnohp')) ? 
                                'is-invalid' : ''; ?>" name="ayahnohp" placeholder="NO HP Suami"  value="<?= old('ayahnohp'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">NIK Bumil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunik')) ? 
                                'is-invalid' : ''; ?>" name="ibunik" placeholder="NIK Bumil" value="<?= old('ibunik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Nama Bumil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunama')) ? 
                                'is-invalid' : ''; ?>" name="ibunama" placeholder="Nama Bumil" value="<?= old('ibunama'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Tempat dan Tanggal Bumil</label>
                            <div class="col-md-3 col-sm-3">
                                <input type="text" class="form-control <?= ($validation->hasError('ibutmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ibutmptlhr" placeholder="Tempat Lahir" value="<?= old('ibutmptlhr'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <input class="form-control <?= ($validation->hasError('ibutgllhr')) ? 
                                'is-invalid' : ''; ?>" class='date' type="date" name="ibutgllhr" required='required' value="<?= old('ibutgllhr'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('ibutgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 label-align" for="ibuagama">Agama Bumil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="ibuagama" id="ibuagama" class="form-control <?= ($validation->hasError('ibuagama')) ? 
                                    'is-invalid' : ''; ?>" name="ibuagama" value="<?= old('ibuagama'); ?>" required>
                                    <option value="" disabled selected>-- Pilih Agama --</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Katolik">Kristen Katolik</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibuagama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 label-align " for="ibupendidikan">Pendidikan Bumil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select name="ibupendidikan" id="ibupendidikan" class="form-control <?= ($validation->hasError('ibupendidikan')) ? 
                                    'is-invalid' : ''; ?>" name="ibupendidikan" value="<?= old('ibupendidikan'); ?>" required>
                                    <option value="" disabled selected>-- Pilih Pendidikan Terakhir --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1/D2">D1/D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                    <option value="Tidak Bersekolah">Tidak Bersekolah</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupendidikan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Pekerjaan Bumil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibupekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ibupekerjaan" placeholder="Pekerjaan Bumil" value="<?= old('ibupekerjaan'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">NO HP Bumil</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunohp')) ? 
                                'is-invalid' : ''; ?>" name="ibunohp" placeholder="NO HP Bumil"  value="<?= old('ibunohp'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('ibunohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Alamat</label>
                            <div class="col-md-6 col-sm-6 ">
                                <textarea type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" value="<?= old('alamat'); ?>">
                                </textarea>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Jumlah Anak</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('jmlhanak')) ? 
                                'is-invalid' : ''; ?>" name="jmlhanak" placeholder="Jumlah Anak" value="<?= old('jmlhanak'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jmlhanak'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 label-align ">Anakke</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" class="form-control <?= ($validation->hasError('anakke')) ? 
                                'is-invalid' : ''; ?>" name="anakke" placeholder="Anakke"  value="<?= old('anakke'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('anakke'); ?>
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
<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->  
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
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
        <div class="col-md-12 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Form Tambah Data Bidan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/bidan/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Bidan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('bidannama')) ? 
                                'is-invalid' : ''; ?>" name="bidannama" placeholder="Nama Bidan" value="<?= old('bidannama'); ?>" autofocus>
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('bidannama'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">TTL Bidan</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('bidantmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="bidantmptlhr" placeholder="Tempat Lahir" value="<?= old('bidantmptlhr'); ?>" autofocus>
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('bidantmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('bidantgllhr')) ? 
                                'is-invalid' : ''; ?>" name="bidantgllhr" placeholder="Tanggal Lahir" value="<?= old('bidantgllhr'); ?>" autofocus>
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('bidantgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="foto" class="col-form-label col-md-3 col-sm-3 ">Foto</label>
                            <div class="col-md-2 col-sm-2">
                                <img src="/admin/production/images/foto/default.png" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-md-7 col-sm-7">
                                    <input type="file" class="form-control" name="foto" id="foto" onchange="previewImg()"/>
                                    <div class="invalid-feedback">
                                      
                                    </div>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="bidanpendidikan">Pendidikan Terakhir</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="bidanpendidikan" id="bidanpendidikan" class="form-control <?= ($validation->hasError('bidanpendidikan')) ? 
                                'is-invalid' : ''; ?>" name="bidanpendidikan" value="<?= old('bidanpendidikan'); ?>" required>
                                    <option value="">-- Pilih Pendidikan Terakhir --</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1/D2">D1/D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bidanpendidikan'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= old('alamat'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">No HP</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" data-inputmask="'mask' : '9999-9999-9999'" name="nohp" value="<?= old('nohp'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Masa Kerja</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="int" class="form-control <?= ($validation->hasError('lamakerja')) ? 
                                'is-invalid' : ''; ?>" name="lamakerja" placeholder="Masa Kerja" value="<?= old('lamakerja'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lamakerja'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Foto</label>
                            <div class="col-md-9 col-sm-9 ">
                            <input type="file" name="foto" id="foto" class="form-control"
                                                    onchange="previewImage(event)">
                                                <small class="text-gray pl-1" id="file-label"></small><br>
                                                <div id="imagePreview"></div>
                                                <small class="text-danger pl-1" id="error-image"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="/databidan" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
					</form>    
				</div>
			</div>
		</div>
        </div>
    </div>
	<!-- /page content -->
<?= $this->endSection() ?>								
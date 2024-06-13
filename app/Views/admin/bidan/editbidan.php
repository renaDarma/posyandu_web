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
					<h2>Form Edit Data Bidan</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/bidan/update/<?= $bidan['idbidan']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idbidan" value="<?= $bidan['idbidan']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Bidan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="bidannama" placeholder="Nama Bidan" autofocus value="<?= (old('bidannama')) ? old('bidannama') : $bidan['bidannama'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bidannama'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat dan Tanggal Lahir</label>
                            <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control <?= ($validation->hasError('bidantmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="bidantmptlhr" placeholder="Tempat Lahir" autofocus value="<?= (old('bidantmptlhr')) ? old('bidantmptlhr') : $bidan['bidantmptlhr'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('bidantmptlhr'); ?>
                                </div>
                             </div>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="date" class="form-control <?= ($validation->hasError('bidantgllhr')) ? 
                                'is-invalid' : ''; ?>" name="bidantgllhr" placeholder="Tanggal Lahir" autofocus value="<?= (old('bidantgllhr')) ? old('bidantgllhr') : $bidan['bidantgllhr'] ?>">
                             </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="foto" class="col-form-label col-md-3 col-sm-3">Foto</label>
                            <div class="col-md-2 col-sm-2">
                                <img src="/admin/production/images/foto/" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-md-7 col-sm-7">
                                    <input type="file" class="custom-file-input" name="foto" id="foto" onchange="previewImg()"/>
                                    <label class="custom-file-label col-md-12 col-sm-12" for="foto"></label>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="bidanpendidikan">Pendidikan Terakhir</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="bidanpendidikan" id="bidanpendidikan" class="form-control">
                                    <option value="" hidden>-- Silahkan Pilih Pendidikan Terakhir --</option>
                                    <option value="SMA" <?= $bidan['bidanpendidikan'] == 'SMA'? 'selected':''?>>SMA</option>
                                    <option value="D1/D2" <?= $bidan['bidanpendidikan'] == 'D1/D2'? 'selected':''?>>D1/D2</option>
                                    <option value="D3" <?= $bidan['bidanpendidikan'] == 'D3'? 'selected':''?>>D3</option>
                                    <option value="D4/S1" <?= $bidan['bidanpendidikan'] == 'D4/S1'? 'selected':''?>>D4/S1</option>
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
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= (old('alamat')) ? old('alamat') : $bidan['alamat'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">No HP</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="int" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" name="nohp" data-inputmask="'mask' : '9999-9999-9999'" value="<?= (old('nohp')) ? old('nohp') : $bidan['nohp'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Masa Kerja</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('lamakerja')) ? 
                                'is-invalid' : ''; ?>" name="lamakerja" value="<?= (old('lamakerja')) ? old('lamakerja') : $bidan['lamakerja'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lamakerja'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="status">Status</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="status" id="status" class="form-control">
                                    <option value="" hidden>-- Silahkan Pilih Status --</option>
                                    <option value="Active" <?= $bidan['status'] == 'Active'? 'selected':''?>>Active</option>
                                    <option value="Non Active" <?= $bidan['status'] == 'Non Active'? 'selected':''?>>Non Active</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('status'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Simpan</button>
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
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
					<h2>Form Tambah Data Kader</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/kader/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Kader</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('kadernama')) ? 
                                'is-invalid' : ''; ?>" name="kadernama" placeholder="Nama Kader" value="<?= old('kadernama'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('kadernama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat dan Tanggal Lahir</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('kadertmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="kadertmptlhr" placeholder="Tempat Lahir" value="<?= old('kadertmptlhr');?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('kadertmptlhr'); ?>
                                </div>
                             </div>
                             <div class="col-md-4 col-sm-4 ">
                                <input type="date" class="form-control <?= ($validation->hasError('kadertgllhr')) ? 
                                'is-invalid' : ''; ?>" name="kadertgllhr" placeholder="Tanggal Lahir" value="<?= old('kadertgllhr'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kadertgllhr'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="kaderpendidikan">Pendidikan Terakhir</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kaderpendidikan" id="kaderpendidikan" class="form-control <?= ($validation->hasError('kaderpendidikan')) ? 
                                'is-invalid' : ''; ?>" name="kaderpendidikan" value="<?= old('kaderpendidikan'); ?>" required>
                                    <option value="" hidden>-- Silahkan Pilih Pendidikan Terakhir --</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="D1/D2">D1/D2</option>
                                    <option value="D3" >D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kaderpendidikan'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3" for="jabatan">Jabatan</label>
                            <div class="col-md-9 col-sm-9 ">
                            <select name="jabatan" id="jabatan" class="form-control <?= ($validation->hasError('jabatan')) ? 
                                'is-invalid' : ''; ?>" name="jabatan" value="<?= old('jabatan'); ?>" required>
                                    <option value="" hidden>-- Silahkan Pilih Jabatan --</option>
                                    <option value="Ketua">Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Anggota">Anggota</option>
                            </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jabatan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tugas Pokok</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('kadertugas')) ? 
                                'is-invalid' : ''; ?>" name="kadertugas" placeholder="Tugas Pokok" value="<?= old('kadertugas');?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('kadertugas'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Lama Kerja</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('lamakerja')) ? 
                                'is-invalid' : ''; ?>" name="lamakerja" placeholder="Lama Kerja" value="<?= old('lamakerja');?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('lamakerja'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= old('alamat'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No HP</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" data-inputmask="'mask' : '9999-9999-9999'" name="nohp" value="<?= old('nohp'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="/datakader" class="btn btn-primary">Kembali</a>
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
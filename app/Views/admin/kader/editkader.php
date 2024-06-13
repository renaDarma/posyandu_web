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
					<h2>Form Edit Data Kader</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/kader/update/<?= $kader['idkader']; ?>" method="post">
                        <input type="hidden" name="idkader" value="<?= $kader['idkader']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama kader</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('kadernama')) ? 
                                'is-invalid' : ''; ?>" name="kadernama" placeholder="Nama kader" autofocus value="<?= (old('kadernama')) ? old('kadernama') : $kader['kadernama'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('kadernama'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat dan Tanggal Lahir</label>
                            <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control <?= ($validation->hasError('kadertmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="kadertmptlhr" placeholder="Tempat Lahir" autofocus value="<?= (old('kadertmptlhr')) ? old('kadertmptlhr') : $kader['kadertmptlhr'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('kadertmptlhr'); ?>
                                </div>
                             </div>
                             <div class="col-md-4 col-sm-4 ">
                                <input type="date" class="form-control <?= ($validation->hasError('kadertgllhr')) ? 
                                'is-invalid' : ''; ?>" name="kadertgllhr" placeholder="Tanggal Lahir" autofocus value="<?= (old('kadertgllhr')) ? old('kadertgllhr') : $kader['kadertgllhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kadertgllhr'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="kaderpendidikan">Pendidikan Terakhir</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kaderpendidikan" id="kaderpendidikan" class="form-control" name="kaderpendidikan" value="<?= (old('kaderpendidikan')) ? old('kaderpendidikan') : $kader['kaderpendidikan'] ?>" required>
                                    <option value="" hidden>-- Silahkan Pilih Pendidikan Terakhir --</option>
                                    <option value="SMP" <?= $kader['kaderpendidikan'] == 'SMP'? 'selected':''?>>SMP</option>
                                    <option value="SMA" <?= $kader['kaderpendidikan'] == 'SMA'? 'selected':''?>>SMA</option>
                                    <option value="D1/D2" <?= $kader['kaderpendidikan'] == 'D1/D2'? 'selected':''?>>D1/D2</option>
                                    <option value="D3" <?= $kader['kaderpendidikan'] == 'D3'? 'selected':''?>>D3</option>
                                    <option value="D4/S1" <?= $kader['kaderpendidikan'] == 'D4/S1'? 'selected':''?>>D4/S1</option>
                                </select>
                             </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3" for="jabatan">Jabatan</label>
                            <div class="col-md-9 col-sm-9 ">
                            <select name="jabatan" id="jabatan" class="form-control" name="jabatan" value="<?= (old('jabatan')) ? old('jabatan') : $kader['jabatan'] ?>" required>
                                <option value="" hidden>-- Silahkan Pilih Jabatan --</option>    
                                <option value="Ketua" <?= $kader['jabatan'] == 'Ketua'? 'selected':''?>>Ketua</option>
                                <option value="Sekretaris" <?= $kader['jabatan'] == 'Sekretaris'? 'selected':''?>>Sekretaris</option>
                                <option value="Bendahara" <?= $kader['jabatan'] == 'Bendahara'? 'selected':''?>>Bendahara</option>
                                <option value="PPKBD" <?= $kader['jabatan'] == 'PPKBD'? 'selected':''?>>PPKBD</option>
                                <option value="Anggota" <?= $kader['jabatan'] == 'Anggota'? 'selected':''?>>Anggota</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tugas Pokok</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('kadertugas')) ? 
                                'is-invalid' : ''; ?>" name="kadertugas" placeholder="Tugas Pokok" autofocus value="<?= (old('kadertugas')) ? old('kadertugas') : $kader['kadertugas'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('kadertugas'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Lama Kerja</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('lamakerja')) ? 
                                'is-invalid' : ''; ?>" name="lamakerja" placeholder="Lama Kerja" autofocus value="<?= (old('lamakerja')) ? old('lamakerja') : $kader['lamakerja'] ?> Tahun">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('lamakerja'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= (old('alamat')) ? old('alamat') : $kader['alamat'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">No HP</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nohp')) ? 
                                'is-invalid' : ''; ?>" name="nohp" placeholder="No HP" value="<?= (old('nohp')) ? old('nohp') : $kader['nohp'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nohp'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Simpan</button>
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
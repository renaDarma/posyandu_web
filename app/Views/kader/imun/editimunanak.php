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
					<h2>Form Edit Data Imunisasi Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/imunisasi/update/<?= $imunisasi['idimunisasi']; ?>" method="post">
                        <input type="hidden" name="idimunisasi" value="<?= $imunisasi['idimunisasi']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="anaknama">Nama Anak</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="anaknama" id="anaknama">
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>" <?= $imunisasi['idanak'] == $nak['idanak'] ? 'selected' : '' ?> disabled><?= $nak['anaknama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="tgllhr">Tanggal Lahir</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="tgllhr" id="tgllhr">
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>" <?= $imunisasi['idanak'] == $nak['idanak'] ? 'selected' : '' ?> disabled><?= $nak['tgllhr'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jk">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="jk" id="jk">
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>" <?= $imunisasi['idanak'] == $nak['idanak'] ? 'selected' : '' ?> disabled><?= $nak['jk'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="ibunama">Nama Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ibunama" id="ibunama">
                                <?php foreach($ortu as $tu): ?>
                                    <option value="<?= $tu['idortu'] ?>" <?= $imunisasi['idortu'] == $tu['idortu'] ? 'selected' : '' ?> disabled><?= $tu['ibunama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Usia Anak dan Tanggal Imunisasi</label>
                            <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control <?= ($validation->hasError('usia')) ? 
                                'is-invalid' : ''; ?>" name="usia" placeholder="Usia Anak" autofocus value="<?= (old('usia')) ? old('usia') : $imunisasi['usia'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('usia'); ?>
                                </div>
                             </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('tglimun')) ? 
                                'is-invalid' : ''; ?>" name="tglimun" placeholder="Tanggal Imunisasi" value="<?= (old('tglimun')) ? old('tglimun') : $imunisasi['tglimun'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tglimun'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jenisimun">Jenis Imunisasi</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="jenisimun" id="jenisimun">
                                <option value="" disabled>-- Silahkan Pilih Jenis Imunisasi --</option>
                                    <option value="Hepatitis B" <?= $imunisasi['jenisimun'] == 'Hepatitis B'? 'selected':''?>>Hepatitis B</option>
                                    <option value="BCG" <?= $imunisasi['jenisimun'] == 'BCG'? 'selected':''?>>BCG</option>
                                    <option value="Polio tetes 1" <?= $imunisasi['jenisimun'] == 'Polio tetes 1'? 'selected':''?>>Polio tetes 1</option>
                                    <option value="DPT 1 + Polio tetes 2 + PCV 1" <?= $imunisasi['jenisimun'] == 'DPT 1 + Polio tetes 2 + PCV 1'? 'selected':''?>>DPT 1 + Polio tetes 2 + PCV 1</option>
                                    <option value="DPT 2 + Polio tetes 3 + PCV 2" <?= $imunisasi['jenisimun'] == 'DPT 2 + Polio tetes 3 + PCV 2'? 'selected':''?>>DPT 2 + Polio tetes 3 + PCV 2</option>
                                    <option value="DPT 3 + Polio tetes 4 + Polio suntik (IPV)" <?= $imunisasi['jenisimun'] == 'DPT 3 + Polio tetes 4 + Polio suntik (IPV)'? 'selected':''?>>DPT 3 + Polio tetes 4 + Polio suntik (IPV)</option>
                                    <option value="Campak - rubella (MR)" <?= $imunisasi['jenisimun'] == 'Campak - rubella (MR)'? 'selected':''?>>Campak - rubella (MR)</option>
                                    <option value="PCV 3" <?= $imunisasi['jenisimun'] == 'PCV 3'? 'selected':''?>>PCV 3</option>
                                    <option value="DPT Lanjutan" <?= $imunisasi['jenisimun'] == 'DPT Lanjutan'? 'selected':''?>>DPT Lanjutan</option>
                                    <option value="Campak - rubella (MR) Lanjutan" <?= $imunisasi['jenisimun'] == 'Campak - rubella (MR) Lanjutan'? 'selected':''?>>Campak - rubella (MR) Lanjutan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenisimun'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Vitamin</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('namavit')) ? 
                                'is-invalid' : ''; ?>" name="namavit" placeholder="Nama Vitamin" value="<?= (old('namavit')) ? old('namavit') : $imunisasi['namavit'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namavit'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ket')) ? 
                                'is-invalid' : ''; ?>" name="ket" placeholder="Keterangan" value="<?= (old('ket')) ? old('ket') : $imunisasi['ket'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ket'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/dataimunanak" class="btn btn-primary">Kembali</a>
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
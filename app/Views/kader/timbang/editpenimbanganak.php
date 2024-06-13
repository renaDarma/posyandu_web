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
					<h2>Form Edit Data Penimbangan Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/penimbangan/update/<?= $penimbangan['idpenimbangan']; ?>" method="post">
                        <input type="hidden" name="idpenimbangan" value="<?= $penimbangan['idpenimbangan']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="anaknama">Nama Anak</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="anaknama" id="anaknama">
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>" <?= $penimbangan['idanak'] == $nak['idanak'] ? 'selected' : '' ?> disabled><?= $nak['anaknama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jk">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="jk" id="jk">
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>" <?= $penimbangan['idanak'] == $nak['idanak'] ? 'selected' : '' ?> disabled><?= $nak['jk'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="tgllhr">Tanggal Lahir dan Usia Anak (Bulan)</label>
                            <div class="col-md-5 col-sm-5">
                                <select class="form-control" name="tgllhr" id="tgllhr">
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>" <?= $penimbangan['idanak'] == $nak['idanak'] ? 'selected' : '' ?> disabled><?= $nak['tgllhr'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="text" class="form-control" name="usia" placeholder="Usia Anak" value="<?= (old('usia')) ? old('usia') : $penimbangan['usia'] ?>">
                            </div>   
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="ibunama">Nama Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ibunama" id="ibunama">
                                <?php foreach($bumil as $bu): ?>
                                    <option value="<?= $bu['idbumil'] ?>" <?= $penimbangan['idbumil'] == $bu['idbumil'] ? 'selected' : '' ?> disabled><?= $bu['ibunama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="ayahnama">Nama Ayah</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ayahnama" id="ayahnama">
                                <?php foreach($bumil as $bu): ?>
                                    <option value="<?= $bu['idbumil'] ?>" <?= $penimbangan['idbumil'] == $bu['idbumil'] ? 'selected' : '' ?> disabled><?= $bu['ayahnama'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tanggal Penimbangan</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="date" class="form-control" name="tgltimbang" placeholder="Tanggal Penimbangan" value="<?= (old('tgltimbang')) ? old('tgltimbang') : $penimbangan['tgltimbang'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgltimbang'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Berat Badan(cm) dan Tinggi Badan(cm)</label>
                            <div class="col-md-4 col-sm-4">
                                <input type="text" class="form-control" name="bb" placeholder="Berat Badan" value="<?= (old('bb')) ? old('bb') : $penimbangan['bb'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bb'); ?>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control" name="tb" placeholder="Tinggi Badan" value="<?= (old('tb')) ? old('tb') : $penimbangan['tb'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tb'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Lingkar Kepala(cm) dan Panjang Lila(cm)</label>
                            <div class="col-md-4 col-sm-4">
                                <input type="text" class="form-control" name="lk" placeholder="Lingkar Kepala" value="<?= (old('lk')) ? old('lk') : $penimbangan['lk'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lk'); ?>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control" name="lila" placeholder="Panjang Lila" value="<?= (old('lila')) ? old('lila') : $penimbangan['lila'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lila'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control" name="ket" placeholder="Keterangan" value="<?= (old('ket')) ? old('ket') : $penimbangan['ket'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ket'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/datapenimbanganak" class="btn btn-primary">Kembali</a>
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
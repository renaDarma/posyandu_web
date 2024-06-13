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
					<h2>Form Tambah Data Imunisasi Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/imunanak/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3" for="anaknama">Nama Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="idanak" id="anaknama">
                                    <option value = "" disabled selected>-- Silahkan Pilih Nama Anak --</option>
                                <?php foreach($anak as $nak): ?>
                                    <option value="<?= $nak['idanak'] ?>"><?= $nak['anaknama'] ?> </option>
                                <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('anaknama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3" for="ibunama">Nama Ibu</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="idortu" id="ibunama">
                                    <option value = "" disabled selected>-- Silahkan Pilih Nama Ibu --</option>
                                <?php foreach($ortu as $tu): ?>
                                    <option value="<?= $tu['idortu'] ?>"><?= $tu['ibunama'] ?> </option>
                                <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
                                </div>
                            </div>
                        </div>	
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Usia Anak dan Tanggal Imunisasi</label>
                            <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control <?= ($validation->hasError('usia')) ? 
                                'is-invalid' : ''; ?>" name="usia" placeholder="Usia Anak" value="<?= old('usia'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('usia'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="date" class="form-control <?= ($validation->hasError('tglimun')) ? 
                                'is-invalid' : ''; ?>" name="tglimun" placeholder="Tanggal Imunisasi" value="<?= old('tglimun'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('tglimun'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jenisimun" >Jenis Imunisasi</label>
                            <div class="col-md-9 col-sm-9 <?= ($validation->hasError('jenisimun')) ? 
                                'is-invalid' : ''; ?>" name="jenisimun">
                                <select name="jenisimun" id="jenisimun" class="form-control <?= ($validation->hasError('jenisimun')) ? 
                                'is-invalid' : ''; ?>" name="jenisimun" value="<?= old('jenisimun'); ?>" required>
                                    <option value="">-- Silahkan Pilih Jenis Imunisasi --</option>
                                    <option value="Hepatitis B">Hepatitis B</option>
                                    <option value="BCG">BCG</option>
                                    <option value="Polio tetes 1">Polio tetes 1</option>
                                    <option value="DPT 1 + Polio tetes 2 + PCV 1">DPT 1 + Polio tetes 2 + PCV 1</option>
                                    <option value="DPT 2 + Polio tetes 3 + PCV 2">DPT 2 + Polio tetes 3 + PCV 2</option>
                                    <option value="DPT 3 + Polio tetes 4 + Polio suntik (IPV)">DPT 3 + Polio tetes 4 + Polio suntik (IPV)</option>
                                    <option value="Campak - rubella (MR)">Campak - rubella (MR)</option>
                                    <option value="PCV 3">PCV 3</option>
                                    <option value="DPT Lanjutan">DPT Lanjutan</option>
                                    <option value="Campak - rubella (MR) Lanjutan">Campak - rubella (MR) Lanjutan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jenisimun'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Vitamin</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('namavit')) ? 
                                'is-invalid' : ''; ?>" name="namavit" placeholder="Nama Vitamin" value="<?= old('namavit'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namavit'); ?>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Keterangan</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ket')) ? 
                                'is-invalid' : ''; ?>" name="ket" placeholder="Keterangan" value="<?= old('ket');?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ket'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                            <button type="submit" class="btn btn-success">Tambah</button>
                            <a href="/dataimunanak" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
					</form>    
				</div>
			</div>
		</div>
	<!-- /page content -->
<?= $this->endSection() ?>								
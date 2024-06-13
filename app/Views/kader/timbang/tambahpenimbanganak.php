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
					<h2>Form Tambah Data Penimbangan Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/penimbanganak/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3" for="anaknama">Nama Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="anaknama" id="anaknama">
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
                                <select class="form-control" name="ibunama" id="ibunama">
                                    <option value = "" disabled selected>-- Silahkan Pilih Nama Ibu --</option>
                                <?php foreach($bumil as $bu): ?>
                                    <option value="<?= $bu['idbumil'] ?>"><?= $bu['ibunama'] ?> </option>
                                <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
                                </div>
                            </div>
                        </div>	
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3" for="ayahnama">Nama Ayah</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select class="form-control" name="ayahnama" id="ayahnama">
                                    <option value = "" disabled selected>-- Silahkan Pilih Nama Ayah --</option>
                                <?php foreach($bumil as $bu): ?>
                                    <option value="<?= $bu['idbumil'] ?>"><?= $bu['ayahnama'] ?> </option>
                                <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnama'); ?>
                                </div>
                            </div>
                        </div>	
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Tanggal Penimbangan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="date" class="form-control <?= ($validation->hasError('tgltimbang')) ? 
                                'is-invalid' : ''; ?>" name="tgltimbang" placeholder="Tanggal penimbangan" value="<?= old('tgltimbang'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('tgltimbang'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Berat Badan dan Tinggi Badan</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" class="form-control <?= ($validation->hasError('bb')) ? 
                                'is-invalid' : ''; ?>" name="bb" placeholder="Berat Badan" value="<?= old('bb'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bb'); ?>
                                </div>    
                            </div>
                            <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control <?= ($validation->hasError('tb')) ? 
                                'is-invalid' : ''; ?>" name="tb" placeholder="Tinggi Badan" value="<?= old('tb'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tb'); ?>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Lingkar Kepala dan Panjang Lila</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" class="form-control <?= ($validation->hasError('lk')) ? 
                                'is-invalid' : ''; ?>" name="lk" placeholder="Lingkar Kepala" value="<?= old('lk'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lk'); ?>
                                </div>    
                            </div>
                            <div class="col-md-5 col-sm-5 ">
                                <input type="text" class="form-control <?= ($validation->hasError('lila')) ? 
                                'is-invalid' : ''; ?>" name="lila" placeholder="Panjang Lila" value="<?= old('lila'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lila'); ?>
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
                            <a href="/datapenimbanganak" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
					</form>    
				</div>
			</div>
		</div>
	<!-- /page content -->
<?= $this->endSection() ?>								
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
					<h2>Form Tambah Data Agenda</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/agenda/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Kegiatan</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('namaagenda')) ? 
                                'is-invalid' : ''; ?>" name="namaagenda" placeholder="Kegiatan" value="<?= old('namaagenda'); ?>" autofocus>
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('namaagenda'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3"for="kategoriagenda">Kategori</label>
                            <div class="col-md-9 col-sm-9 ">
                                <select name="kategoriagenda" id="kategoriagenda" class="form-control <?= ($validation->hasError('kategoriagenda')) ? 
                                'is-invalid' : ''; ?>" name="kategoriagenda" value="<?= old('kategoriagenda'); ?>" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Imunisasi Balita">Imunisasi Balita</option>
                                    <option value="Pemberian Makanan Tambahan">Pemberian Makanan Tambahan</option>
                                    <option value="Kesehatan Balita">Kesehatan Balita</option>
                                    <!-- <option value="Kesehatan Ibu Hamil">Kesehatan Ibu Hamil</option> -->
                                    <option value="Pemantauan Gizi Balita">Pemantauan Gizi Balita</option>
                                    <!-- <option value="Pemantauan Gizi Ibu Hamil">Pemantauan Gizi Ibu Hamil</option>
                                    <option value="Program KB">Program KB</option> -->
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kategoriagenda'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tanggal dan Jam</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="date" class="form-control <?= ($validation->hasError('tglagenda')) ? 
                                'is-invalid' : ''; ?>" name="tglagenda" placeholder="Tanggal" value="<?= old('tglagenda'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tglagenda'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="time" class="form-control <?= ($validation->hasError('waktuagenda')) ? 
                                'is-invalid' : ''; ?>" name="waktuagenda" placeholder="Waktu" value="<?= old('waktuagenda'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('waktuagenda'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Lokasi</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('tempatagenda')) ? 
                                'is-invalid' : ''; ?>" name="tempatagenda" placeholder="Lokasi" value="<?= old('tempatagenda'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tempatagenda'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('alamatagenda')) ? 
                                'is-invalid' : ''; ?>" name="alamatagenda" placeholder="Alamat" value="<?= old('alamatagenda'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamatagenda'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="/dataagenda" class="btn btn-primary">Kembali</a>
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
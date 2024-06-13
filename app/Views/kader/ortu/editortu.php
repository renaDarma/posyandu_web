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
					<h2>Form Edit Data Orang Tua Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/ortu/update/<?= $ortu['idortu']; ?>" method="post">
                        <input type="hidden" name="idortu" value="<?= $ortu['idortu']; ?>">
                        <?= csrf_field(); ?>
                        <!-- <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK</label>
                            <div class="col-md-9 col-sm-9 ">
                                
                             </div>
                        </div> -->
                        <!-- cari cara agar input nik tidak bisa diedit atau hidden -->
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">No KK</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nokk')) ? 
                                'is-invalid' : ''; ?>" name="nokk" placeholder="No KK" autofocus value="<?= (old('nokk')) ? old('nokk') : $ortu['nokk'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('nokk'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnik')) ? 
                                'is-invalid' : ''; ?>" name="ayahnik" placeholder="NIK Suami" value="<?= (old('ayahnik')) ? old('ayahnik') :$ortu['ayahnik'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnama')) ? 
                                'is-invalid' : ''; ?>" name="ayahnama" placeholder="Nama Suami" value="<?= (old('ayahnama')) ? old('ayahnama') : $ortu['ayahnama'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">TTL Suami</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahtmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ayahtmptlhr" placeholder="Tempat Lahir Suami" value="<?= (old('ayahtmptlhr')) ? old('ayahtmptlhr') : $ortu['ayahtmptlhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('ayahtgllhr')) ? 
                                'is-invalid' : ''; ?>" name="ayahtgllhr" placeholder="Tanggal Lahir Suami" value="<?= (old('ayahtgllhr')) ? old('ayahtgllhr') : $ortu['ayahtgllhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="ayahagama">Agama Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ayahagama" id="ayahagama">
                                    <option value="" disabled selected>-- Pilih Agama Suami --</option>
                                    <option value="Islam" <?= $ortu['ayahagama'] == 'Islam'? 'selected':''?>>Islam</option>
                                    <option value="Kristen Katolik" <?= $ortu['ayahagama'] == 'Kristen Katolik'? 'selected':''?>>Kristen Katolik</option>
                                    <option value="Kristen Protestan" <?= $ortu['ayahagama'] == 'Kristen Protestan'? 'selected':''?>>Kristen Protestan</option>
                                    <option value="Hindu" <?= $ortu['ayahagama'] == 'Hindu'? 'selected':''?>>Hindu</option>
                                    <option value="Budha" <?= $ortu['ayahagama'] == 'Budha'? 'selected':''?>>Budha</option>
                                    <option value="Konghucu" <?= $ortu['ayahagama'] == 'Konghucu'? 'selected':''?>>Konghucu</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahagama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 " for="ayahpendidikan">Pendidikan Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ayahpendidikan" id="ayahpendidikan">
                                    <option value="" disabled selected>-- Pilih Pendidikan Suami --</option>
                                    <option value="SD" <?= $ortu['ayahpendidikan'] == 'SD'? 'selected':''?>>SD</option>
                                    <option value="SMP" <?= $ortu['ayahpendidikan'] == 'SMP'? 'selected':''?>>SMP</option>
                                    <option value="SMA" <?= $ortu['ayahpendidikan'] == 'SMA'? 'selected':''?>>SMA</option>
                                    <option value="D1/D2" <?= $ortu['ayahpendidikan'] == 'D1/D2'? 'selected':''?>>D1/D2</option>
                                    <option value="D3" <?= $ortu['ayahpendidikan'] == 'D3'? 'selected':''?>>D3</option>
                                    <option value="D4/S1" <?= $ortu['ayahpendidikan'] == 'D4/S1'? 'selected':''?>>D4/S1</option>
                                    <option value="S2" <?= $ortu['ayahpendidikan'] == 'S2'? 'selected':''?>>S2</option>
                                    <option value="Tidak Bersekolah" <?= $ortu['ayahpendidikan'] == 'Tidak Bersekolah'? 'selected':''?>>Tidak Bersekolah</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpendidikan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pekerjaan Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahpekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ayahpekerjaan" placeholder="Pekerjaan Suami" value="<?= (old('ayahpekerjaan')) ? old('ayahpekerjaan') : $ortu['ayahpekerjaan'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NO HP Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnohp')) ? 
                                'is-invalid' : ''; ?>" name="ayahnohp" placeholder="NO HP Suami" value="<?= (old('ayahnohp')) ? old('ayahnohp') : $ortu['ayahnohp'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnohp'); ?>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunik')) ? 
                                'is-invalid' : ''; ?>" name="ibunik" placeholder="NIK Ibu" value="<?= (old('ibunik')) ? old('ibunik') : $ortu['ibunik'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunama')) ? 
                                'is-invalid' : ''; ?>" name="ibunama" placeholder="Nama Ibu" value="<?= (old('ibunama')) ? old('ibunama') : $ortu['ibunama'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">TTL Ibu</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('ibutmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ibutmptlhr" placeholder="Tempat Lahir Ibu" value="<?= (old('ibutmptlhr')) ? old('ibutmptlhr') : $ortu['ibutmptlhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('ibutgllhr')) ? 
                                'is-invalid' : ''; ?>" name="ibutgllhr" placeholder="Tanggal Lahir Ibu" value="<?= (old('ibutgllhr')) ? old('ibutgllhr') : $ortu['ibutgllhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="ibuagama">Agama Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ibuagama" id="ibuagama">
                                    <option value="" disabled selected>-- Pilih Agama Ibu --</option>
                                    <option value="Islam" <?= $ortu['ibuagama'] == 'Islam'? 'selected':''?>>Islam</option>
                                    <option value="Kristen Katolik" <?= $ortu['ibuagama'] == 'Kristen Katolik'? 'selected':''?>>Kristen Katolik</option>
                                    <option value="Kristen Protestan" <?= $ortu['ibuagama'] == 'Kristen Protestan'? 'selected':''?>>Kristen Protestan</option>
                                    <option value="Hindu" <?= $ortu['ibuagama'] == 'Hindu'? 'selected':''?>>Hindu</option>
                                    <option value="Budha" <?= $ortu['ibuagama'] == 'Budha'? 'selected':''?>>Budha</option>
                                    <option value="Konghucu" <?= $ortu['ibuagama'] == 'Konghucu'? 'selected':''?>>Konghucu</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibuagama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 " for="ibupendidikan">Pendidikan Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ibupendidikan" id="ibupendidikan">
                                    <option value="" disabled selected>-- Pilih Pendidikan --</option>    
                                    <option value="SD" <?= $ortu['ibupendidikan'] == 'SD'? 'selected':''?>>SD</option>
                                    <option value="SMP" <?= $ortu['ibupendidikan'] == 'SMP'? 'selected':''?>>SMP</option>
                                    <option value="SMA" <?= $ortu['ibupendidikan'] == 'SMA'? 'selected':''?>>SMA</option>
                                    <option value="D1/D2" <?= $ortu['ibupendidikan'] == 'D1/D2'? 'selected':''?>>D1/D2</option>
                                    <option value="D3" <?= $ortu['ibupendidikan'] == 'D3'? 'selected':''?>>D3</option>
                                    <option value="D4/S1" <?= $ortu['ibupendidikan'] == 'D4/S1'? 'selected':''?>>D4/S1</option>
                                    <option value="S2" <?= $ortu['ibupendidikan'] == 'S2'? 'selected':''?>>S2</option>
                                    <option value="Tidak Bersekolah" <?= $ortu['ibupendidikan'] == 'Tidak Bersekolah'? 'selected':''?>>Tidak Bersekolah</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupendidikan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pekerjaan Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibupekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ibupekerjaan" placeholder="Pekerjaan Ibu" value="<?= (old('ibupekerjaan')) ? old('ibupekerjaan') : $ortu['ibupekerjaan'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NO HP Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunohp')) ? 
                                'is-invalid' : ''; ?>" name="ibunohp" placeholder="NO HP Ibu" value="<?= (old('ibunohp')) ? old('ibunohp') : $ortu['ibunohp'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunohp'); ?>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= (old('alamat')) ? old('alamat') : $ortu['alamat'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Jumlah Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('jmlhanak')) ? 
                                'is-invalid' : ''; ?>" name="jmlhanak" placeholder="Jumlah Anak" value="<?= (old('jmlhanak')) ? old('jmlhanak') : $ortu['jmlhanak'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jmlhanak'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/dataortu" class="btn btn-primary">Kembali</a>
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
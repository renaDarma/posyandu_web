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
					<h2>Form Edit Data Ibu Hamil</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/bumil/update/<?= $bumil['idbumil']; ?>" method="post">
                        <input type="hidden" name="idbumil" value="<?= $bumil['idbumil']; ?>">
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
                                'is-invalid' : ''; ?>" name="nokk" placeholder="No KK" autofocus value="<?= (old('nokk')) ? old('nokk') : $bumil['nokk'] ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('nokk'); ?>
                                </div>
                             </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnik')) ? 
                                'is-invalid' : ''; ?>" name="ayahnik" placeholder="NIK Suami" value="<?= (old('ayahnik')) ? old('ayahnik') :$bumil['ayahnik'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnama')) ? 
                                'is-invalid' : ''; ?>" name="ayahnama" placeholder="Nama Suami" value="<?= (old('ayahnama')) ? old('ayahnama') : $bumil['ayahnama'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">TTL Suami</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahtmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ayahtmptlhr" placeholder="Tempat Lahir Suami" value="<?= (old('ayahtmptlhr')) ? old('ayahtmptlhr') : $bumil['ayahtmptlhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahtmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('ayahtgllhr')) ? 
                                'is-invalid' : ''; ?>" name="ayahtgllhr" placeholder="Tanggal Lahir Suami" value="<?= (old('ayahtgllhr')) ? old('ayahtgllhr') : $bumil['ayahtgllhr'] ?>">
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
                                    <option value="Islam" <?= $bumil['ayahagama'] == 'Islam'? 'selected':''?>>Islam</option>
                                    <option value="Kristen Katolik" <?= $bumil['ayahagama'] == 'Kristen Katolik'? 'selected':''?>>Kristen Katolik</option>
                                    <option value="Kristen Protestan" <?= $bumil['ayahagama'] == 'Kristen Protestan'? 'selected':''?>>Kristen Protestan</option>
                                    <option value="Hindu" <?= $bumil['ayahagama'] == 'Hindu'? 'selected':''?>>Hindu</option>
                                    <option value="Budha" <?= $bumil['ayahagama'] == 'Budha'? 'selected':''?>>Budha</option>
                                    <option value="Konghucu" <?= $bumil['ayahagama'] == 'Konghucu'? 'selected':''?>>Konghucu</option>
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
                                    <option value="SD" <?= $bumil['ayahpendidikan'] == 'SD'? 'selected':''?>>SD</option>
                                    <option value="SMP" <?= $bumil['ayahpendidikan'] == 'SMP'? 'selected':''?>>SMP</option>
                                    <option value="SMA" <?= $bumil['ayahpendidikan'] == 'SMA'? 'selected':''?>>SMA</option>
                                    <option value="D1/D2" <?= $bumil['ayahpendidikan'] == 'D1/D2'? 'selected':''?>>D1/D2</option>
                                    <option value="D3" <?= $bumil['ayahpendidikan'] == 'D3'? 'selected':''?>>D3</option>
                                    <option value="D4/S1" <?= $bumil['ayahpendidikan'] == 'D4/S1'? 'selected':''?>>D4/S1</option>
                                    <option value="S2" <?= $bumil['ayahpendidikan'] == 'S2'? 'selected':''?>>S2</option>
                                    <option value="Tidak Bersekolah" <?= $bumil['ayahpendidikan'] == 'Tidak Bersekolah'? 'selected':''?>>Tidak Bersekolah</option>
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
                                'is-invalid' : ''; ?>" name="ayahpekerjaan" placeholder="Pekerjaan Suami" value="<?= (old('ayahpekerjaan')) ? old('ayahpekerjaan') : $bumil['ayahpekerjaan'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahpekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NO HP Suami</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ayahnohp')) ? 
                                'is-invalid' : ''; ?>" name="ayahnohp" placeholder="NO HP Suami" value="<?= (old('ayahnohp')) ? old('ayahnohp') : $bumil['ayahnohp'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ayahnohp'); ?>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Bumil</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunik')) ? 
                                'is-invalid' : ''; ?>" name="ibunik" placeholder="NIK Bumil" value="<?= (old('ibunik')) ? old('ibunik') : $bumil['ibunik'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunik'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Bumil</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunama')) ? 
                                'is-invalid' : ''; ?>" name="ibunama" placeholder="Nama Bumil" value="<?= (old('ibunama')) ? old('ibunama') : $bumil['ibunama'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">TTL Bumil</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('ibutmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="ibutmptlhr" placeholder="Tempat Lahir Bumil" value="<?= (old('ibutmptlhr')) ? old('ibutmptlhr') : $bumil['ibutmptlhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('ibutgllhr')) ? 
                                'is-invalid' : ''; ?>" name="ibutgllhr" placeholder="Tanggal Lahir Bumil" value="<?= (old('ibutgllhr')) ? old('ibutgllhr') : $bumil['ibutgllhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibutgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="ibuagama">Agama Bumil</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ibuagama" id="ibuagama">
                                    <option value="" disabled selected>-- Pilih Agama Bumil --</option>
                                    <option value="Islam" <?= $bumil['ibuagama'] == 'Islam'? 'selected':''?>>Islam</option>
                                    <option value="Kristen Katolik" <?= $bumil['ibuagama'] == 'Kristen Katolik'? 'selected':''?>>Kristen Katolik</option>
                                    <option value="Kristen Protestan" <?= $bumil['ibuagama'] == 'Kristen Protestan'? 'selected':''?>>Kristen Protestan</option>
                                    <option value="Hindu" <?= $bumil['ibuagama'] == 'Hindu'? 'selected':''?>>Hindu</option>
                                    <option value="Budha" <?= $bumil['ibuagama'] == 'Budha'? 'selected':''?>>Budha</option>
                                    <option value="Konghucu" <?= $bumil['ibuagama'] == 'Konghucu'? 'selected':''?>>Konghucu</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibuagama'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 " for="ibupendidikan">Pendidikan Bumil</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="ibupendidikan" id="ibupendidikan">
                                    <option value="" disabled selected>-- Pilih Pendidikan --</option>    
                                    <option value="SD" <?= $bumil['ibupendidikan'] == 'SD'? 'selected':''?>>SD</option>
                                    <option value="SMP" <?= $bumil['ibupendidikan'] == 'SMP'? 'selected':''?>>SMP</option>
                                    <option value="SMA" <?= $bumil['ibupendidikan'] == 'SMA'? 'selected':''?>>SMA</option>
                                    <option value="D1/D2" <?= $bumil['ibupendidikan'] == 'D1/D2'? 'selected':''?>>D1/D2</option>
                                    <option value="D3" <?= $bumil['ibupendidikan'] == 'D3'? 'selected':''?>>D3</option>
                                    <option value="D4/S1" <?= $bumil['ibupendidikan'] == 'D4/S1'? 'selected':''?>>D4/S1</option>
                                    <option value="S2" <?= $bumil['ibupendidikan'] == 'S2'? 'selected':''?>>S2</option>
                                    <option value="Tidak Bersekolah" <?= $bumil['ibupendidikan'] == 'Tidak Bersekolah'? 'selected':''?>>Tidak Bersekolah</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupendidikan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Pekerjaan Bumil</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibupekerjaan')) ? 
                                'is-invalid' : ''; ?>" name="ibupekerjaan" placeholder="Pekerjaan Bumil" value="<?= (old('ibupekerjaan')) ? old('ibupekerjaan') : $bumil['ibupekerjaan'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibupekerjaan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NO HP Bumil</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('ibunohp')) ? 
                                'is-invalid' : ''; ?>" name="ibunohp" placeholder="NO HP Bumil" value="<?= (old('ibunohp')) ? old('ibunohp') : $bumil['ibunohp'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('ibunohp'); ?>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Alamat</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 
                                'is-invalid' : ''; ?>" name="alamat" placeholder="Alamat" value="<?= (old('alamat')) ? old('alamat') : $bumil['alamat'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Jumlah Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('jmlhanak')) ? 
                                'is-invalid' : ''; ?>" name="jmlhanak" placeholder="Jumlah Anak" value="<?= (old('jmlhanak')) ? old('jmlhanak') : $bumil['jmlhanak'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jmlhanak'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Kehamilan ke</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('anakke')) ? 
                                'is-invalid' : ''; ?>" name="anakke" placeholder="Kehamilan ke" value="<?= (old('anakke')) ? old('anakke') : $bumil['anakke'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('anakke'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="status">Status</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="status" id="status">
                                    <option value="" disabled selected>-- Pilih Status --</option>
                                    <option value="0" <?= $bumil['status'] == '0'? 'selected':''?>>Belum Melahirkan</option>
                                    <option value="1" <?= $bumil['status'] == '1'? 'selected':''?>>Sudah Melahirkan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('status'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="/databumil" class="btn btn-primary">Kembali</a>
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
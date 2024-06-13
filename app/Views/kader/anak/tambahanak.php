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
					<h2>Form Tambah Data Anak</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
                    <form class="form-horizontal form-label-left" action="/anak/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3" for="ibunama">Nama Ibu
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <div class="input-group">
                                    <input type="hidden" name="idortu" id="idortu" class="form-control" readonly>

                                    <input type="text" name="ibunama" id="ibunama" class="form-control" readonly>
                                    <span class="input-group-btn">
                                        <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataOrtuModal">Pilih</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3">Nama Ayah</label>
                            <div class="col-md-9 col-sm-9">
                                <div class="input-group">
                                    <input type="text" name="ayahnama" id="ayahnama" readonly="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-3 col-sm-3" for="iduser">Nama Anak
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input type="hidden" name="anaknama" id="anaknama" class="form-control" readonly>
                                <input type="hidden" name="iduser" id="iduser" class="form-control" readonly>
                                <div class="input-group">
                                    <input type="text" name="fullname" id="fullname" class="form-control" readonly>
                                    <span class="input-group-btn">
                                        <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataUserModal">Pilih</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">NIK Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 
                                'is-invalid' : ''; ?>" data-inputmask="'mask' : '9999999999999999'" name="nik" placeholder="NIK Anak" value="<?= old('nik'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Anak</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('anaknama')) ? 
                                'is-invalid' : ''; ?>" name="anaknama" placeholder="Nama Anak" value="<?= old('anaknama'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('anaknama'); ?>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat dan Tanggal Lahir</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('tmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="tmptlhr" placeholder="Tempat Lahir" value="<?= old('tmptlhr'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input class="form-control <?= ($validation->hasError('tgllhr')) ? 
                                'is-invalid' : ''; ?>" class='date' type="date" name="tgllhr" required='required' value="<?= old('tgllhr'); ?>">
                                 <div class="invalid-feedback">
                                    <?= $validation->getError('tgllhr'); ?>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jk" >Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9 <?= ($validation->hasError('jk')) ? 
                                'is-invalid' : ''; ?>" name="jk">
                                <select name="jk" id="jk" class="form-control <?= ($validation->hasError('jk')) ? 
                                'is-invalid' : ''; ?>" name="jk" value="<?= old('jk'); ?>" required>
                                    <option value="">-- Silahkan Pilih Jenis Kelamin --</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Tempat Lahir</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('namatmptlhr')) ? 
                                'is-invalid' : ''; ?>" name="namatmptlhr" placeholder="Nama Tempat Lahir (Rumah/RS/Puskesmas)" value="<?= old('namatmptlhr'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namatmptlhr'); ?>
                                </div>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jeniskelahiran">Jenis Kelahiran</label>
                            <div class="col-md-9 col-sm-9">
                            <select name="jeniskelahiran" id="jeniskelahiran" class="form-control <?= ($validation->hasError('jeniskelahiran')) ? 
                                'is-invalid' : ''; ?>" name="jeniskelahiran" value="<?= old('jeniskelahiran'); ?>" required>
                                    <option value="">-- Silahkan Pilih Jenis Kelahiran --</option>
                                    <option value="Tunggal">Tunggal</option>
                                    <option value="Kembar 2">Kembar 2</option>
                                    <option value="Kembar 3">Kembar 3</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jeniskelahiran'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Berat Badan saat Lahir (kg)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('bblahir')) ? 
                                'is-invalid' : ''; ?>" name="bblahir" placeholder="Berat Badan saat Lahir" value="<?= old('bblahir');?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bblahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tinggi Badan saat Lahir (cm)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('tblahir')) ? 
                                'is-invalid' : ''; ?>" name="tblahir" placeholder="Tinggi Badan saat Lahir" value="<?= old('tblahir'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tblahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Lingkar Kepala saat Lahir (cm)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('lklahir')) ? 
                                'is-invalid' : ''; ?>" name="lklahir" placeholder="Lingkar Kepala saat Lahir" value="<?= old('lklahir'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lklahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Tambah</button>
                            <a href="/dataanak" class="btn btn-primary">Kembali</a>
                        </div>
					</form>    

                    <!-- Modal Data Ortu -->
                    <div class="modal fade bs-example-modal-lg" id="DataOrtuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Data Orangtua</h5>
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Ibu</th>
                                                    <th>Nama Ayah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            // Define $currentPage
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                            ?>
                                            <tbody>
                                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                                <?php foreach($anak as $bu) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $bu->ibunama; ?></td>
                                                        <td><?= $bu->ayahnama; ?></td>
                                                        <td>
                                                        <button id="pilihOrtu" type="button" data-idortu="<?= $bu->idortu; ?>" data-ibunama="<?= $bu->ibunama; ?>" data-ayahnama="<?= $bu->ayahnama; ?>" class="btnSelectOrtu btn btn-primary btn-sm">Pilih</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Data User -->
                    <div class="modal fade bs-example-modal-lg" id="DataUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Data User</h5>
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            // Define $currentPage
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                            ?>
                                            <tbody>
                                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                                <?php foreach($user as $u) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $u->fullname; ?></td>
                                                        <td><?= $u->email; ?></td>
                                                        <td>
                                                        <button id="pilihUser" type="button" data-iduser="<?= $u->id; ?>" data-fullname="<?= $u->fullname; ?>" data-email="<?= $u->email; ?>" class="btnSelectOrtu btn btn-primary btn-sm">Pilih</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

				</div>
			</div>
		</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '#pilihOrtu', function(){
            ibunama = $(this).data('ibunama')
            idortu = $(this).data('idortu')
            ayahnama = $(this).data('ayahnama')
            
            $("#ibunama").val(ibunama)
            $("#idortu").val(idortu)
            $("#ayahnama").val(ayahnama)

            $('#DataOrtuModal').modal('hide')
        })

        $(document).on('click', '#pilihUser', function(){
            fullname = $(this).data('fullname')
            iduser = $(this).data('iduser')
            email = $(this).data('email')
            
            $("#fullname").val(fullname)
            $("#anaknama").val(fullname)
            $("#iduser").val(iduser)
            $("#email").val(email)

            $('#DataUserModal').modal('hide')
        })

        $(document).on('click', '#simpan', function(){

        var data = {
          idortu: $("#idortu").val(),
          iduser: $("#iduser").val(),
          anaknama: $("#anaknama").val(),
          nik: $("#nik").val(),
          anaknama: $("#anaknama").val(),
          tmptlhr: $("#tmptlhr").val(),
          tgllhr: $("#tgllhr").val(),
          jk: $("#jk").val(),
          namatmptlhr: $("#namatmptlhr").val(),
          jeniskelahiran: $("#jeniskelahiran").val(),
          bblahir: $("#bblahir").val(),
          tblahir: $("#tblahir").val(),
          lklahir: $("#lklahir").val(),
        };

        var url = '/anak/save';

        var xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload();
          } else {
            console.log('Terjadi kesalahan');
          }
        };

        xhr.send(JSON.stringify(data));
        })
                
    </script>
	<!-- /page content -->
<?= $this->endSection() ?>								
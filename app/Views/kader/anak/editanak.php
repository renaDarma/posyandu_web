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
        <?php if (session()->getFlashdata('error')): ?>
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
                    <h2>Form Edit Data Anak</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li class="dropdown"></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form class="form-horizontal form-label-left" action="/anak/update/<?= $anak['idanak']; ?>"
                        method="post">
                        <input type="hidden" name="idanak" id="idanak" value="<?= $anak['idanak']; ?>">
                        <?= csrf_field(); ?>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">NIK</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control <?= ($validation->hasError('nik')) ?
                                    'is-invalid' : ''; ?>" data-inputmask="'mask' : '9999999999999999'" name="nik"
                                    placeholder="NIK" autofocus value="<?= (old('nik')) ? old('nik') : $anak['nik'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
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
                                    <input type="hidden" name="userid" id="userid" class="form-control" value="<?= (old('iduser')) ? old('iduser') : $anak['iduser'] ?>" readonly>
                                    <input type="text" name="fullname" id="fullname" class="form-control" value="<?= (old('anaknama')) ? old('anaknama') : $anak['anaknama'] ?>" readonly>
                                    <span class="input-group-btn">
                                        <button id="pilihData" name="pilihData" type="button"
                                            class="btn btn-outline-warning" data-toggle="modal"
                                            data-target="#DataUserModal">Pilih</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tempat dan Tanggal Lahir</label>
                            <div class="col-md-5 col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('tmptlhr')) ?
                                    'is-invalid' : ''; ?>" name="tmptlhr" placeholder="Tempat Lahir"
                                    value="<?= (old('tmptlhr')) ? old('tmptlhr') : $anak['tmptlhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tmptlhr'); ?>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <input type="date" class="form-control <?= ($validation->hasError('tgllhr')) ?
                                    'is-invalid' : ''; ?>" name="tgllhr"
                                    value="<?= (old('tgllhr')) ? old('tgllhr') : $anak['tgllhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tgllhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jk">Jenis Kelamin</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="jk" id="jk">
                                    <option value="" disabled>-- Silahkan Pilih Jenis Kelamin --</option>
                                    <option value="Laki - Laki" <?= $anak['jk'] == 'Laki - Laki' ? 'selected' : '' ?>>Laki
                                        -
                                        Laki</option>
                                    <option value="Perempuan" <?= $anak['jk'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('jk'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Nama Tempat Lahir</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('namatmptlhr')) ?
                                    'is-invalid' : ''; ?>" name="namatmptlhr"
                                    placeholder="Nama Tempat Lahir (Rumah/RS/Puskesmas)"
                                    value="<?= (old('namatmptlhr')) ? old('namatmptlhr') : $anak['namatmptlhr'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namatmptlhr'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="jeniskelahiran">Jenis Kelahiran</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="jeniskelahiran" id="jeniskelahiran">
                                    <option value="" disabled>-- Pilih Jenis Kelahiran --</option>
                                    <option value="Tunggal" <?= $anak['jeniskelahiran'] == 'Tunggal' ? 'selected' : '' ?>>
                                        Tunggal</option>
                                    <option value="Kembar 2" <?= $anak['jeniskelahiran'] == 'Kembar 2' ? 'selected' : '' ?>>
                                        Kembar 2</option>
                                    <option value="Kembar 3" <?= $anak['jeniskelahiran'] == 'Kembar 3' ? 'selected' : '' ?>>
                                        Kembar 3</option>
                                    <option value="Lainnya" <?= $anak['jeniskelahiran'] == 'Lainnya' ? 'selected' : '' ?>>
                                        Lainnya</option>
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
                                    'is-invalid' : ''; ?>" name="bblahir" placeholder="Berat Badan saat Lahir"
                                    value="<?= (old('bblahir')) ? old('bblahir') : $anak['bblahir'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('bblahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Tinggi Badan saat Lahir (kg)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('tblahir')) ?
                                    'is-invalid' : ''; ?>" name="tblahir" placeholder="Tinggi Badan saat Lahir"
                                    value="<?= (old('tblahir')) ? old('tblahir') : $anak['tblahir'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tblahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 ">Lingkar Kepala saat Lahir (cm)</label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control <?= ($validation->hasError('lklahir')) ?
                                    'is-invalid' : ''; ?>" name="lklahir" placeholder="Lingkar Kepala saat Lahir"
                                    value="<?= (old('lklahir')) ? old('lklahir') : $anak['lklahir'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('lklahir'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="idortu">Nama Ibu</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="idortu" id="idortu">
                                    <?php foreach ($ortu as $tu): ?>
                                        <option value="<?= $tu['idortu'] ?>" <?= $tu['idortu'] == $anak['idortu'] ? 'selected' : '' ?> disabled><?= $tu['ibunama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3" for="idortu">Nama Ayah</label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="idortu" id="idortu">
                                    <?php foreach ($ortu as $tu): ?>
                                        <option value="<?= $tu['idortu'] ?>" <?= $tu['idortu'] == $anak['idortu'] ? 'selected' : '' ?> disabled><?= $tu['ayahnama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="/dataanak" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
                    </form>

                    <!-- Modal Data User -->
                    <div class="modal fade bs-example-modal-lg" id="DataUserModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <?php foreach ($user as $u): ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><?= $u->fullname; ?></td>
                                                    <td><?= $u->email; ?></td>
                                                    <td>
                                                        <button id="pilihUser" type="button" data-iduser="<?= $u->id; ?>"
                                                            data-fullname="<?= $u->fullname; ?>"
                                                            data-email="<?= $u->email; ?>"
                                                            class="btnSelectOrtu btn btn-primary btn-sm">Pilih</button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        
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
    </div>
</div>
<!-- /page content -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).on('click', '#pilihUser', function () {
        fullname = $(this).data('fullname')
        iduser = $(this).data('iduser')
        email = $(this).data('email')
        $("#fullname").val(fullname)
        $("#anaknama").val(fullname)
        $("#iduser").val(iduser)
        $("#userid").val(iduser)
        $("#email").val(email)

        $('#DataUserModal').modal('hide')
    })
</script>
<?= $this->endSection() ?>
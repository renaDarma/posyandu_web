<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Data Anak</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown"></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <!-- <div class="col-md-3">
                            <img src="/admin/production/images/foto/" class="card-img" alt="foto">
                        </div> -->
                        <div class="text-center">
                            <div class="card-body">
                                <h5 class="media-body"><b>NIK</b></h5>
                                <h4 class="media-body"><?= $anak['nik']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Anak</b></h5>
                                <h4 class="media-body"><?= $anak['anaknama']; ?></h4><br>
                                <h5 class="media-body"><b>Tempat Lahir</b></h5>
                                <h4 class="media-body"><?= $anak['tmptlhr']; ?></h4><br>
                                <h5 class="media-body"><b>Tanggal Lahir</b></h5>
                                <h4 class="media-body"><?= $anak['tgllhr']; ?></h4><br>
                                <h5 class="media-body"><b>Jenis Kelamin</b></h5>
                                <h4 class="media-body"><?= $anak['jk']; ?></h4>
                             
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                            <h5 class="media-body"><b>Jenis Kelahiran</b></h5>
                                <h4 class="media-body"><?= $anak['jeniskelahiran']; ?></h4><br>
                                <h5 class="media-body"><b>Berat Badan saat Lahir</b></h5>
                                <h4 class="media-body"><?= $anak['bblahir']; ?> kg</h4><br>
                                <h5 class="media-body"><b>Tinggi Badan saat Lahir</b></h5>
                                <h4 class="media-body"><?= $anak['tblahir']; ?> cm</h4><br>
                                <h5 class="media-body"><b>Lingkar Kepala saat Lahir</b></h5>
                                <h4 class="media-body"><?= $anak['lklahir']; ?> cm</h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Ayah</b></h5>
                            <?php foreach($ortu as $tu) : ?>
                                <h4 class="media-body"><?= $tu->ayahnama; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Data Masuk</b></h5>
                                <h4 class="media-body"><?= $anak['created_at']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Ibu</b></h5>
                            <?php foreach($ortu as $tu) : ?>
                                <h4 class="media-body"><?= $tu->ibunama; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Rumah Sakit/Bidan/lainnya</b></h5>
                                <h4 class="media-body"><?= $anak['namatmptlhr']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'kader') : ?>
                            <a href="/dataanak" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a href="/anakdata" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

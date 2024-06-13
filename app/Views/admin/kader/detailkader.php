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
                        <h2>Detail Data Kader</h2>
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
                                <h5 class="media-body"><b>Nama kader</b></h5>
                                <h4 class="media-body"><?= $kader['kadernama']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Tempat Lahir</b></h5>
                                <h4 class="media-body"><?= $kader['kadertmptlhr']; ?></h4><br>
                                <h5 class="media-body"><b>Tanggal Lahir</b></h5>
                                <!-- bisa menghitung usia secara otomatis -->
                                <h4 class="media-body"><?= $kader['kadertgllhr']; ?></h4><br> 
                                <h5 class="media-body"><b>Pendidikan Terakhir</b></h5>
                                <h4 class="media-body"><?= $kader['kaderpendidikan']; ?></h4><br>
                                <h5 class="media-body"><b>Jabatan</b></h5>
                                <h4 class="media-body"><?= $kader['jabatan']; ?></b> <br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Tugas Pokok</b></h5>
                                <h4 class="media-body"><?= $kader['kadertugas']; ?></h4> <br>
                                <h5 class="media-body"><b>Lama Kerja</b></h5>
                                <h4 class="media-body"><?= $kader['lamakerja']; ?> Tahun</h4><br>
                                <h5 class="media-body"><b>Alamat</b></h5>
                                <h4 class="media-body"><?= $kader['alamat']; ?></h4> <br>
                                <h5 class="media-body"><b>No HP</b></h5>
                                <h4 class="media-body"><?= $kader['nohp']; ?></b>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <a href="/datakader" class="btn btn-primary">Kembali</a>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

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
                        <h2>Detail Data Bidan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown"></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        
                    <div class="col-md-3">
                        <img src="<?= base_url('admin/images/foto/').  '/'.$bidan['foto']; ?>" class="card-img" alt="foto" style="max-width: 3in;">
                    </div>
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Bidan</b></h5>
                                <b class="media-body"><?= $bidan['bidannama']; ?></b><br><br>
                                <h5 class="media-body"><b>Tempat Lahir</b></h5>
                                <b class="media-body"><?= $bidan['bidantmptlhr']; ?></b><br><br>
                                <h5 class="media-body"><b>Tanggal Lahir</b></h5>
                                <b class="media-body"><?= $bidan['bidantgllhr']; ?></b><br><br>
                                <h5 class="media-body"><b>Masa Kerja</b></h5>
                                <b class="media-body"><?= $bidan['lamakerja']; ?> Tahun</b><br><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Pendidikan Terakhir</b></h5>
                                <b class="media-body"><?= $bidan['bidanpendidikan']; ?></b><br><br>
                                <h5 class="media-body"><b>Alamat</b></h5>
                                <b class="media-body"><?= $bidan['alamat']; ?></b><br><br>
                                <h5 class="media-body"><b>No HP</b></h5>
                                <b class="media-body"><?= $bidan['nohp']; ?></b><br><br>
                                <h5 class="media-body"><b>Status</b></h5>
                                <b class="media-body"><?= $bidan['status']; ?></b><br><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <?php if (session()->get('role') == 'admin') : ?>
                        <a href="/databidan" class="btn btn-primary">Kembali</a>
                    <?php endif; ?>
                    <!-- <?php if (session()->get('role') == 'kader') : ?>
                        <a href="/bidandata" class="btn btn-primary">Kembali</a>
                    <?php endif; ?> -->
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

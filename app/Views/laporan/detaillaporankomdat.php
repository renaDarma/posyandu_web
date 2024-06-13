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
                        <h2>Detail Laporan Komdat</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown"></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="text-center">
                            <div class="card-body">
                                <h5 class="media-body"><b>Tanggal Pembuatan Laporan</b></h5>
                                <h4 class="media-body"><?= $laporankomdat['tgl']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>KIA</b></h5>
                                <h4 class="media-body"><b>Total bumil Posyandu : <?= $laporankomdat['kia1']; ?></b></h4>
                                <h4 class="media-body"><b>Total bumil desa : <?= $laporankomdat['kia2']; ?></b></h4>
                                <h4 class="media-body"><b>Total KIA => <?= $laporankomdat['perkia']; ?></b></h4><br>

                                <h5 class="media-body"><b>GIZI</b></h5>
                                <h4 class="media-body"><b>Total balita 0-59 bulan Posyandu : <?= $laporankomdat['gizi1']; ?></b></h5>
                                <h4 class="media-body"><b>Total balita 0-59 bulan desa : <?= $laporankomdat['gizi2']; ?></b></h4>
                                <h4 class="media-body"><b>Total GIZI => <?= $laporankomdat['pergizi']; ?></b></h4><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>IMUNISASI</b></h5>
                                <h4 class="media-body"><b>Total balita 0-24 bulan Posyandu : <?= $laporankomdat['imun1']; ?></b></h4>
                                <h4 class="media-body"><b>Total balita 0-24 bulan desa : <?= $laporankomdat['imun2']; ?></b></h4>
                                <h4 class="media-body"><b>Total IMUNISASI => <?= $laporankomdat['perimun']; ?></b></h4><br>

                                <h5 class="media-body"><b>KB</b></h5>
                                <h4 class="media-body"><b>Total Masyarakat usia subur Posyandu : <?= $laporankomdat['kb1']; ?></b></h4>
                                <h4 class="media-body"><b>Total Masyarakat usia subur desa : <?= $laporankomdat['kb2']; ?></b></h4>
                                <h4 class="media-body"><b>Total KB => <?= $laporankomdat['perkb']; ?></b></h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'kader') : ?>
                            <a href="/laporankomdat" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a href="/komdatlaporan" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

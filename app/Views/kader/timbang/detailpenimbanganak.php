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
                        <h2>Detail Data Penimbangan Anak</h2>
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
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Anak</b></h5>
                            <?php foreach($anak as $nak) : ?>
                                <h4 class="media-body"><?= $nak->anaknama; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Jenis Kelamin</b></h5>
                            <?php foreach($anak as $nak) : ?>
                                <h4 class="media-body"><?= $nak->jk; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Tanggal Lahir</b></h5>
                            <?php foreach($anak as $nak) : ?>
                                <h4 class="media-body"><?= $nak->tgllhr; ?></h4><br><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Tanggal Penimbangan</b></h5>
                                <h4 class="media-body"><?= $penimbangan['tgltimbang']; ?></h4><br>
                                <h5 class="media-body"><b>Berat Badan</b></h5>
                                <h4 class="media-body"><?= $penimbangan['bb']; ?> <?= $penimbangan['ketbb']; ?></h4>
                                <h5 class="media-body"><b>Hasil Berat Badan</b></h5>
                                <h4 class="media-body"><?= $penimbangan['hasil_bb']; ?></h4><br>
                                <h5 class="media-body"><b>Tinggi Badan</b></h5>
                                <h4 class="media-body"><?= $penimbangan['tb']; ?> <?= $penimbangan['kettb']; ?></h4>
                                <h5 class="media-body"><b>Hasil Tinggi Badan</b></h5>
                                <h4 class="media-body"><?= $penimbangan['hasil_tb']; ?></h4><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Usia</b></h5>
                                <h4 class="media-body"><?= $penimbangan['usia']; ?> Bulan</h4><br>
                                <h5 class="media-body"><b>Nama Ibu</b></h5>
                            <?php foreach($ortu as $tu) : ?>
                                <h4 class="media-body"><?= $tu->ibunama; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Nama Ayah</b></h5>
                            <?php foreach($ortu as $tu) : ?>
                                <h4 class="media-body"><?= $tu->ayahnama; ?></h4><br><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Keterangan</b></h5>
                                <h4 class="media-body"><?= $penimbangan['ket']; ?></h4><br>
                                <h5 class="media-body"><b>Lingkar Kepala</b></h5>
                                <h4 class="media-body"><?= $penimbangan['lk']; ?> <?= $penimbangan['ketlk']; ?></h4>
                                <h5 class="media-body"><b>Hasil Lingkar Kepala</b></h5>
                                <h4 class="media-body"><?= $penimbangan['hasil_lk']; ?></h4><br>
                                <h5 class="media-body"><b>Panjang Lila</b></h5>
                                <h4 class="media-body"><?= $penimbangan['lila']; ?> <?= $penimbangan['ketlila']; ?></h4>
                                <h5 class="media-body"><b>Hasil Panjang Lila</b></h5>
                                <h4 class="media-body"><?= $penimbangan['hasil_lila']; ?></h4><br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'kader') : ?>
                            <a href="/datapenimbanganak" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a href="/penimbanganakdata" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'masyarakat') : ?>
                            <a href="/riwayatpenimbanganku" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

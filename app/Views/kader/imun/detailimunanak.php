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
                        <h2>Detail Data Imunisasi Anak</h2>
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
                                <h5 class="media-body"><b>Tanggal Lahir</b></h5>
                            <?php foreach($anak as $nak) : ?>
                                <h4 class="media-body"><?= $nak->tgllhr; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Jenis Kelamin</b></h5>
                            <?php foreach($anak as $nak) : ?>
                                <h4 class="media-body"><?= $nak->jk; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Vitamin & Obat Cacing</b></h5>
                                <h4 class="media-body"><?= $imunisasi['namavit']; ?>,
                                <?php
                                    if ($imunisasi['obatcacing'] == "Obat Cacing") {
                                        echo "DIBERIKAN OBAT CACING";
                                    } else{
                                        echo "TIDAK DIBERIKAN OBAT CACING";
                                    }
                                  ?></h4><br>
                                <h5 class="media-body"><b>Keterangan</b></h5>
                                <h4 class="media-body"><?= $imunisasi['ket']; ?></h4><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Nama Ibu</b></h5>
                            <?php foreach($ortu as $tu) : ?>
                                <h4 class="media-body"><?= $tu->ibunama; ?></h4><br>
                            <?php endforeach; ?>
                                <h5 class="media-body"><b>Usia Anak</b></h5>
                                <h4 class="media-body"><?= $imunisasi['usia']; ?> bulan</h4><br>
                                <h5 class="media-body"><b>Tanggal Imunisasi</b></h5>
                                <h4 class="media-body"><?= $imunisasi['tglimun']; ?></h4><br>
                                <h5 class="media-body"><b>Jenis Imunisasi</b></h5>
                                <h4 class="media-body"><?= $imunisasi['jenisimun']; ?></h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'kader') : ?>
                            <a href="/dataimunanak" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a href="/imunanakdata" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'masyarakat') : ?>
                            <a href="/riwayatimunisasiku" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

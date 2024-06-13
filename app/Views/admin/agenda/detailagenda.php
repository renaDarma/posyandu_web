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
                        <h2>Detail Data Agenda</h2>
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
                                <h5 class="media-body"><b>Kegiatan</b></h5>
                                <h4 class="media-body"><?= $agenda['namaagenda']; ?></h4><br>
                                <h5 class="media-body"><b>Kategori</b></h5>
                                <h4 class="media-body"><?= $agenda['kategoriagenda']; ?></h4><br>
                                <h5 class="media-body"><b>Lokasi</b></h5>
                                <h4 class="media-body"><?= $agenda['tempatagenda']; ?></h4><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Tanggal</b></h5>
                                <h4 class="media-body"><?= $agenda['tglagenda']; ?></h4><br>
                                <h5 class="media-body"><b>Jam</b></h5>
                                <h4 class="media-body"><?= $agenda['waktuagenda']; ?> WIB</h4><br>
                                <h5 class="media-body"><b>Alamat</b></h5>
                                <h4 class="media-body"><?= $agenda['alamatagenda']; ?></h4><br>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a href="/dataagenda" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'kader') : ?>
                            <a href="/agendadata" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

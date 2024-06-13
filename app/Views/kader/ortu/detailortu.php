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
                        <h2>Detail Data Orang Tua Anak</h2>
                        <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">   
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    
                        <div class="text-center">
                            <div class="card-body">
                                <h5 class="media-body"><b>NO KK</b></h5>
                                <h4 class="media-body"><?= $ortu['nokk']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>NIK Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahnik']; ?></h4><br>
                                <h5 class="media-body"><b>Nama Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahnama']; ?></h4>
                                <h5 class="media-body"><b>Tempat Lahir Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahtmptlhr']; ?></h4>
                                <h5 class="media-body"><b>Tanggal Lahir Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahtgllhr']; ?></h4>
                                <h5 class="media-body"><b>Agama Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahagama']; ?></h4>
                                <h5 class="media-body"><b>Pendidikan Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahpendidikan']; ?></h4>
                                <h5 class="media-body"><b>Pekerjaan Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahpekerjaan']; ?></h4>
                                <h5 class="media-body"><b>No HP Ayah</b></h5>
                                <h4 class="media-body"><?= $ortu['ayahnohp']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>NIK Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibunik']; ?></h4><br>
                                <h5 class="media-body"><b>Nama Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibunama']; ?></h4>
                                <h5 class="media-body"><b>Tempat Lahir Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibutmptlhr']; ?></h4>
                                <h5 class="media-body"><b>Tanggal Lahir Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibutgllhr']; ?></h4>
                                <h5 class="media-body"><b>Agama Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibuagama']; ?></h4>
                                <h5 class="media-body"><b>Pendidikan Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibupendidikan']; ?></h4>
                                <h5 class="media-body"><b>Pekerjaan Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibupekerjaan']; ?></h4>
                                <h5 class="media-body"><b>No HP Ibu</b></h5>
                                <h4 class="media-body"><?= $ortu['ibunohp']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Jumlah Anak</b></h5>
                                <h4 class="media-body"><?= $ortu['jmlhanak']; ?></h4>
                                <h5 class="media-body"><b>Tgl Daftar</b></h5>
                                <h4 class="media-body"><?= $ortu['created_at']; ?></h4><br>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Alamat</b></h5>
                                <h4 class="media-body"><?= $ortu['alamat']; ?></h4><br>
                            </div>
                        </div>         
                        
                    </div>
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'kader') : ?>
                            <a href="/dataortu" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <a href="/ortudata" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

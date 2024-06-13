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
                        <h2>Detail Data Ibu Hamil</h2>
                        <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown"></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="text-right">
                            <div class="card-body">
                                <h2 class="media-body">
                                    <?php
                                        if ($bumil['status'] == "1") {
                                            echo "<span class='badge badge-success'>Sudah Melahirkan</span>";
                                        } else{
                                            echo "<span class='badge badge-danger'>Belum Melahirkan</span>";
                                        }
                                    ?>
                                </h2>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="card-body">
                                <h5 class="media-body"><b>NO KK</b></h5>
                                <h4 class="media-body"><?= $bumil['nokk']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>NIK Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahnik']; ?></h4><br>
                                <h5 class="media-body"><b>Nama Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahnama']; ?></h4>
                                <h5 class="media-body"><b>Tempat Lahir Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahtmptlhr']; ?></h4>
                                <h5 class="media-body"><b>Tanggal Lahir Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahtgllhr']; ?></h4>
                                <h5 class="media-body"><b>Agama Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahagama']; ?></h4>
                                <h5 class="media-body"><b>Pendidikan Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahpendidikan']; ?></h4>
                                <h5 class="media-body"><b>Pekerjaan Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahpekerjaan']; ?></h4>
                                <h5 class="media-body"><b>No HP Suami</b></h5>
                                <h4 class="media-body"><?= $bumil['ayahnohp']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>NIK Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibunik']; ?></h4><br>
                                <h5 class="media-body"><b>Nama Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibunama']; ?></h4>
                                <h5 class="media-body"><b>Tempat Lahir Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibutmptlhr']; ?></h4>
                                <h5 class="media-body"><b>Tanggal Lahir Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibutgllhr']; ?></h4>
                                <h5 class="media-body"><b>Agama Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibuagama']; ?></h4>
                                <h5 class="media-body"><b>Pendidikan Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibupendidikan']; ?></h4>
                                <h5 class="media-body"><b>Pekerjaan Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibupekerjaan']; ?></h4>
                                <h5 class="media-body"><b>No HP Bumil</b></h5>
                                <h4 class="media-body"><?= $bumil['ibunohp']; ?></h4>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="media-body"><b>Alamat</b></h5>
                                <h4 class="media-body"><?= $bumil['alamat']; ?></h4><br>
                                <h5 class="media-body"><b>Kehamilan ke</b></h5>
                                <h4 class="media-body"><?= $bumil['anakke']; ?></h4><br>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="media-body"><b>Jumlah Anak</b></h5>
                                <h4 class="media-body"><?= $bumil['jmlhanak']; ?></h4><br>
                                <h5 class="media-body"><b>Tgl Daftar</b></h5>
                                <h4 class="media-body"><?= $bumil['created_at']; ?></h4><br>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="card-body">
                                <h5 class="media-body"><b>Anak ke</b></h5>
                                <h4 class="media-body"><?= $bumil['anakke']; ?></h4><br>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <?php if (session()->get('role') == 'kader') : ?>
                            <!-- <a href="/riwayatkesbumil" class="btn btn-success">Riwayat Kes Bumil</a> -->
                            <a href="/databumil" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <!-- <a href="/kesbumilriwayat" class="btn btn-success">Riwayat Kes Bumil</a> -->
                            <a href="/bumildata" class="btn btn-primary">Kembali</a>
                        <?php endif; ?>
                    </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

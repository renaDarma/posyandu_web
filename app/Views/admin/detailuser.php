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
                            <h2>Detail Data User</h2>
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
                                    <h5 class="media-body"><b>Username</b></h5>
                                    <h4 class="media-body"><?= $users->username; ?></h4><br>
                                    <h5 class="media-body"><b>Email</b></h5>
                                    <h4 class="media-body"><?= $users->email; ?></h4><br>
                                    <h5 class="media-body"><b>Nama User</b></h5>
                                    <h4 class="media-body"><?= $users->fullname; ?></h4><br>
                           
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="media-body"><b>No HP User</b></h5>
                                    <h4 class="media-body"><?= $users->usernohp; ?></h4><br>
                                    <h5 class="media-body"><b>Level User</b></h5>
                                    <h4 class="media-body"><?= $users->fullname; ?></h4><br>
                              
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/datauser" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>
            

<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Kader</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <a href="/tambahkader" class="btn btn-info">Tambah</a><br><br>
                  <div class="x_title">
                    <h2>Tabel Data Kader</h2>
                  <?php if (session()->get('role') == 'admin') : ?>
                    <div class="col-sm-9">
                        <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('datakader/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('datakader/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                          </div>
                        </form>
                      </div>
                  <?php endif; ?>
                  <?php if (session()->get('role') == 'kader') : ?>
                    <div class="col-sm-9">
                      <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('kaderdata/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('kaderdata/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                          </div>
                        </form>
                    </div>
                  <?php endif; ?>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <?php if(session()->getFlashdata('pesan')) : ?>
                      <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?= session()->getFlashdata('pesan'); ?>
                        </div>
                      </div>
                  <?php endif; ?>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="example-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kader</th>
                          <th>Jabatan</th>
                          <th>Alamat</th>
                          <th>No HP</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($kader as $ka) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $ka['kadernama']; ?></td>
                            <td><?= $ka['jabatan']; ?></td>
                            <td><?= $ka['alamat']; ?></td>
                            <td><?= $ka['nohp']; ?></td>
                            <td>
                              <a href="/detailkader/<?= $ka['kadernama']; ?>" class="btn btn-warning btn-sm">Detail</a>
                              <a href="/editkader/<?= $ka['idkader']; ?>" class="btn btn-success btn-sm">Edit</a>
                              <form action="/hapuskader/<?= $ka['idkader']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin menghapus data kader ini?');" >Hapus</button>
                              </form>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- /page content -->
<?= $this->endSection() ?>
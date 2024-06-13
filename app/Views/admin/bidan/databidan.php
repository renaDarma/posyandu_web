<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Bidan</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                <?php if (session()->get('role') == 'kader') : ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'admin') : ?>
                  <a href="/tambahbidan" class="btn btn-info">Tambah</a><br><br>
                <?php endif; ?>
                  <div class="x_title">
                    <h2>Tabel Data Bidan</h2> 
                    <?php if (session()->get('role') == 'admin') : ?>
                      <div class="col-sm-9">
                        <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('databidan/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('databidan/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                          </div>
                        </form>
                      </div>
                     <?php endif; ?>
                    <?php if (session()->get('kader')) : ?>  
                      <div class="col-sm-9">
                      <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('bidandata/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('bidandata/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
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
                        <?php if (session()->get('role') == 'admin') : ?>
                          <table id="example-buttons" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Bidan</th>
                                <th>No HP</th>
                                <th>Masa Kerja</th>
                                <th>Status</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                              <?php foreach ($bidan as $dan) : ?>
                                <tr>
                                  <th scope="row"><?= $i++; ?></th>
                                  <td><img src="<?= base_url('admin/images/foto/').  '/'.$dan['foto']; ?>" alt="Foto Bidan" class="img-thumbnail" width="100"></td>
                                  <td><?= $dan['bidannama']; ?></td>
                                  <td><?= $dan['nohp']; ?></td>
                                  <td><?= $dan['lamakerja']; ?></td>
                                  <td><?= $dan['status']; ?></td>
                                  <td>
                                  <!-- <?php if (session()->get('role') == 'kader') : ?>
                                    <a href="/bidandetail/<?= $dan['idbidan']; ?>" class="btn btn-warning btn-sm">Detail</a>
                                  <?php endif; ?> -->
                                    <a href="/detailbidan/<?= $dan['idbidan']; ?>" class="btn btn-warning btn-sm">Detail</a>
                                    <a href="/editbidan/<?= $dan['idbidan']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <form action="/hapusbidan/<?= $dan['idbidan']; ?>" method="post" class="d-inline">
                                      <?= csrf_field(); ?>
                                      <input type="hidden" name="_method" value="DELETE">
                                      <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">Hapus</button>
                                    </form>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        <?php endif; ?>
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
  <script>
        function hapusData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data bidan akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapusbidan/' + id;
                } else {
                    // Logika atau aksi yang ingin Anda lakukan ketika pengguna memilih "Batal"
                    console.log("Aksi ketika pengguna memilih batal");
                }
            });
        }
    </script>
    <script>
        function confirmDelete(event) {
            event.preventDefault(); // Menghentikan aksi default form submit

            Swal.fire({
                title: 'Konfirmasi Hapus Data',
                text: 'Apakah Anda yakin menghapus data bidan ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika dikonfirmasi, lanjutkan dengan mengirim form
                    event.target.closest('form').submit();
                }
            });
        }
    </script>
<?= $this->endSection() ?>
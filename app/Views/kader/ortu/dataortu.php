<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Orang Tua Anak</h3>
              </div>
            </div>

            <div class="clearfix"></div>
      
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <?php if (session()->get('role') == 'admin') : ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'kader') : ?>
                  <a href="/tambahortu" class="btn btn-info mb-2">Tambah</a>
                <?php endif; ?>
                  <div class="x_title">
                    <h2>Tabel Data Orang Tua Anak</h2>
                    <?php if (session()->get('role') == 'admin') : ?>
                      <div class="col-sm-9">
                        <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('ortudata/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('ortudata/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                          </div>
                        </form>
                      </div>
                    <?php endif; ?>
                    <?php if (session()->get('role') == 'kader') : ?>
                      <div class="col-sm-9">
                      <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('dataortu/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('dataortu/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
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
                          <th>No KK</th>
                          <th>Nama Ibu</th>
                          <th>Nama Ayah</th>
                          <th>Jumlah Anak</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach($ortu as $tu) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $tu->ibunik; ?></td>
                            <td><?= $tu->ibunama; ?></td>
                            <td><?= $tu->ayahnama; ?></td>
                            <td><?= $tu->jmlhanak; ?></td>
                            <td>
                            <?php if (session()->get('role') == 'admin') : ?>
                              <a href="/ortudetail/<?= $tu->idortu; ?>" class="btn btn-warning btn-sm">Detail</a>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'kader') : ?>
                              <a href="/detailortu/<?= $tu->idortu; ?>" class="btn btn-warning btn-sm">Detail</a>
                              <a href="/editortu/<?= $tu->idortu; ?>" class="btn btn-success btn-sm">Edit</a>
                              <form action="/hapusortu/<?= $tu->idortu; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">Hapus</button>
                              </form>
                            <?php endif; ?>
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
 <script>
        function hapusData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data ortu akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapusortu/' + id;
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
                text: 'Apakah Anda yakin menghapus data ortu ini?',
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
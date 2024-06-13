<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Anak</h3>
              </div>
            </div>

            <div class="clearfix">

            </div>
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <?php if (session()->get('role') == 'admin') : ?>
                <?php endif; ?>
                <?php if (session()->get('role') == 'kader') : ?>
                  <a href="tambahanak" class="btn btn-info">Tambah</a><br><br>
                <?php endif; ?>
                  <div class="x_title">
                    <h2>Tabel Data Anak</h2>
                    <?php if (session()->get('role') == 'admin') : ?>
                      <div class="col-sm-9">
                        <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('/anakdata/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('/anakdata/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" title="Print PDF"></i>PDF</a>
                          </div>
                        </form>
                      </div>
                    <?php endif; ?>
                    <?php if (session()->get('role') == 'kader') : ?>
                      <div class="col-sm-9">
                        <form action="" method="post">
                          <div class="text-right">
                            <a href="<?php echo base_url('/dataanak/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                            <a href="<?php echo base_url('/dataanak/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" title="Print PDF"></i>PDF</a>
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
                          <th>NIK</th>
                          <th>Nama Anak</th>
                          <th>Tempat Lahir</th>
                          <th>Tanggal Lahir</th>
                          <th>Jenis kelamin</th>
                          <th width="15%">Aksi</th>
                          <th>Kartu Menuju Sehat</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach($anak as $nak) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $nak->nik; ?></td>
                            <td><?= $nak->anaknama; ?></td>
                            <td><?= $nak->tmptlhr; ?></td>
                            <td><?= $nak->tgllhr; ?></td>
                            <td><?= $nak->jk; ?></td>
                            <td>
                            <!-- <?php if (session()->get('role') == 'bidan') : ?>
                              <a href="/deanak/<?= $nak->idanak; ?>" class="btn btn-warning btn-sm">Detail</a>
                            <?php endif; ?> -->
                            <?php if (session()->get('role') == 'admin') : ?>
                              <a href="/detailanak/<?= $nak->idanak; ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'kader') : ?>
                              <a href="/detailanak/<?= $nak->idanak; ?>" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                              <a href="/editanak/<?= $nak->idanak; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                              <form action="/hapusanak/<?= $nak->idanak; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event)"><i class="fa fa-trash"></i></button>
                              </form>
                              <?php endif; ?>
                            </td>
                            <?php if (session()->get('role') == 'admin') : ?>
                            <td><a href="/kmsanak/<?= $nak->idanak; ?>" class="btn btn-info btn-sm">Lihat KMS</a>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'kader') : ?>
                            <td><a href="/kmsanak/<?= $nak->idanak; ?>" class="btn btn-info btn-sm">Lihat KMS</a>
                            <?php endif; ?>
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

    <!-- <script>
        function simpanData() {
            Swal.fire({
                title: "Sukses!",
                text: "Data anak berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?= base_url('dataanak'); ?>";
                }
            });
        }
    </script> -->
    <script>
        function hapusData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data anak akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapusanak/' + id;
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
                text: 'Apakah Anda yakin menghapus data anak ini?',
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
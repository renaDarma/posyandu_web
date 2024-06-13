<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Bumil Sudah Melahirkan</h3>
              </div>
            </div>

            <div class="clearfix"></div>
      
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <?php if (session()->get('role') == 'admin') : ?>
                  <a href="/bumildata" class="btn btn-secondary mb-2">Belum Melahirkan</a><br><br>
                <?php endif; ?>
                <?php if (session()->get('role') == 'kader') : ?>
                  <a href="/databumil" class="btn btn-secondary mb-2">Belum Melahirkan</a><br><br>
                <?php endif; ?>
                  <div class="x_title">
                    <h2>Tabel Data Bumil Sudah Melahirkan</h2>
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
                          <th>Nama Bumil</th>
                          <th>Nama Suami</th>
                          <th>No HP</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach($bumil as $bu) : ?>
                          <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $bu->ibunama; ?></td>
                            <td><?= $bu->ayahnama; ?></td>
                            <td><?= $bu->ibunohp; ?></td>
                            <td> 
                              <?php
                                if ($bu->status == "1") {
                                    echo "<span class='badge badge-success'>Sudah Melahirkan</span>";
                                } else{
                                    echo "<span class='badge badge-danger'>Belum Melahirkan</span>";
                                }
                              ?>
                            </td>
                            <td>
                            <?php if (session()->get('role') == 'admin') : ?>
                              <a href="/bumildetail/<?= $bu->idbumil; ?>" class="btn btn-warning btn-sm">Detail</a>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'kader') : ?>
                              <a href="/detailbumil/<?= $bu->idbumil; ?>" class="btn btn-warning btn-sm">Detail</a>
                              <form action="/hapusbumil/<?= $bu->idbumil; ?>" method="post" class="d-inline">
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
                text: 'Data bumil akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapusbumil/' + id;
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
                text: 'Apakah Anda yakin menghapus data bumil ini?',
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
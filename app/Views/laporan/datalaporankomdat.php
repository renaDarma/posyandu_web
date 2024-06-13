<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

 <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Laporan Komdat Posyandu</h3>
              </div>
              <div class="title_right">
              </div>
            </div>
           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_content">
                        <?php if (session()->get('role') == 'admin') : ?>
                            <div class="row">
                                    <h5><b>Filter Laporan</b></h5>
                                <div class="col-md-12 col-sm-12">
                                <form class="form-horizontal form-label-left" action="/komdatlaporan/filter" method="POST">
                                    <div class="form-group row">
                                            <input type="hidden" name="nilaifilter" value="1"> 
                                            <label class="col-form-label col-sm-2 label-align"><b>Tanggal Awal</b></label>
                                        <div class="col-md-2 col-sm-2">
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tanggalawal" id="tanggalawal" required="">                                   
                                            </div>
                                        </div>
                                            <label class="col-form-label col-sm-2 label-align"><b>Tanggal Akhir</b></label>
                                        <div class="col-md-2 col-sm-2">
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-2">
                                            <div class="text-right">
                                                <button type="submit" class="w-50 p-1 btn-outline-warning" title="Print PDF" value="Print">Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div> 
                            <?php endif; ?> 
                        <?php if (session()->get('role') == 'kader') : ?>
                        <form class="form-horizontal form-label-left" action="/laporankomdat/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-form-label col-md-2 col-sm-2 label-align" for="tgl">Tanggal Laporan</label>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type="date" name="tgl" id="tgl" class="form-control">                                       
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-warning" onclick="simpanData()" value="HitungTambah">Hitung dan Simpan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="divider-dashed"></div>
                                <h5>KIA (Kesehatan Ibu dan Anak)</h5>
                                <p>total bumil yang datang ke Posyandu DIBAGI total bumil yang ada di desa</p>
                            <div class="divider-dashed"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 col-sm-4 label-align">Bumil hadir Posyandu <b>:</b> Total bumil di desa</label>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="kia1" id="kia1" class="form-control">
                                    </div>
                                </div><h2>/</h2>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="kia2" id="kia2" class="form-control">
                                    </div>
                                </div><h2>X 100% =</h2>
                                <h2>
                                    <?php if (session()->has('perkia')) : ?>
                                        <p> <?= session('perkia') ?>%</p>
                                    <?php endif; ?>
                                </h2>
                            </div>
                            <div class="divider-dashed"></div>
                                <h5>GIZI</h5>
                                <p>total balita 0-59 bulan yang datang ke posyandu DIBAGI total balita 0-59 bulan yang ada di desa</p>
                            <div class="divider-dashed"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 col-sm-4 label-align">Balita 0-59 bulan hadir Posyandu <b>:</b> Total balita 0-59 bulan di desa</label>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="gizi1" id="gizi1" class="form-control">
                                    </div>
                                </div><h2>/</h2>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="gizi2" id="gizi2" class="form-control">
                                    </div>
                                </div><h2>X 100% =</h2>
                                <h2>
                                    <?php if (session()->has('pergizi')) : ?>
                                        <p> <?= session('pergizi') ?>%</p>
                                    <?php endif; ?>
                                </h2>
                            </div>
                            <div class="divider-dashed"></div>
                                <h5>IMUNISASI</h5>
                                <p>total balita usia 0-24 bulan yang datang ke Posyandu DIBAGI total balita
                                    usia 0-24 bulan yang ada di desa</p>
                            <div class="divider-dashed"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 col-sm-4 label-align">Balita 0-24 bulan hadir Posyandu <b>:</b> Total balita 0-24 bulan di desa</label>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="imun1" id="imun1" class="form-control">
                                    </div>
                                </div><h2>/</h2>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="imun2" id="imun2" class="form-control">
                                    </div>
                                </div><h2>X 100% =</h2>
                                <h2>
                                    <?php if (session()->has('perimun')) : ?>
                                        <p> <?= session('perimun') ?>%</p>
                                    <?php endif; ?>
                                </h2>
                            </div>
                            <div class="divider-dashed"></div>
                                <h5>KB (Keluarga Berencana)</h5>
                                <p>total pasangan usia subur yang datang ke Posyandu DIBAGI total pasangan usia 
                                    subur yang ada di desa</p>
                            <div class="divider-dashed"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-4 col-sm-4 label-align">Usia subur hadir Posyandu <b>:</b> Total usia subur di desa</label>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="kb1" id="kb1" class="form-control">
                                    </div>
                                </div><h2>/</h2>
                                <div class="col-md-2 col-sm-2">
                                    <div class="input-group">
                                        <input type=number step=any name="kb2" id="kb2" class="form-control">
                                    </div>
                                </div><h2>X 100% =</h2>
                                <h2>
                                    <?php if (session()->has('perkb')) : ?>
                                        <p> <?= session('perkb') ?>%</p>
                                    <?php endif; ?>
                                </h2>
                            </div>
                            <!-- <div class="divider-dashed"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="status">Status
                                </label>
                                <div class="col-md-3 col-sm-3">
                                    <input type=text id="status" name="status" class="form-control">
                                </div>
                            </div> -->
                          </form>   
                        <?php endif; ?>
                        <!-- page content -->
                        <?php if (session()->get('role') == 'kader') : ?>
                        <div class="ln_solid"></div>
                            <div class="row">
                                    <h5><b>Filter Laporan</b></h5>
                                <div class="col-md-12 col-sm-12">
                                <form class="form-horizontal form-label-left" action="/laporankomdat/filter" method="POST">
                                    <div class="form-group row">
                                            <input type="hidden" name="nilaifilter" value="1"> 
                                            <label class="col-form-label col-sm-2 label-align"><b>Tanggal Awal</b></label>
                                        <div class="col-md-2 col-sm-2">
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tanggalawal" id="tanggalawal" required="">                                   
                                            </div>
                                        </div>
                                            <label class="col-form-label col-sm-2 label-align"><b>Tanggal Akhir</b></label>
                                        <div class="col-md-2 col-sm-2">
                                            <div class="input-group">
                                                <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-2">
                                            <div class="text-right">
                                                <button type="submit" class="w-50 p-1 btn-outline-warning" title="Print PDF" value="Print">Cetak</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                            <?php endif; ?>  
                        <div class="ln_solid"></div>
                          <div class="x_title">
                                <h2>Tabel Data Laporan Komdat</h2>
                            <div class="clearfix"></div>
                          </div>
                            <?php if(session()->getFlashdata('error')) : ?>
                                <div class="col-md-12">
                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h3><?= session()->getFlashdata('error'); ?></h3>
                                  </div>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('hapus')) : ?>
                                <script>
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: "Data komdat berhasil dihapus.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "<?= base_url('datalaporankomdat'); ?>";
                                        }
                                    });
                                </script>
                            <?php endif; ?>
                            <div class="x_content">
                              <div class="row">
                                  <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                      <table id="example-buttons" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Tgl Laporan</th>
                                            <th>KIA (desa)</th>
                                            <th>GIZI (desa)</th>
                                            <th>IMUNISASI (desa)</th>
                                            <th>KB (desa)</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                            <?php foreach($laporankomdat as $komdat) : ?>
                                            <tr>
                                                <th scope="row"><?= $i++; ?></th>
                                                <td><?= $komdat->tgl; ?></td>
                                                <td><?= $komdat->kia2; ?></td>
                                                <td><?= $komdat->gizi2; ?></td>
                                                <td><?= $komdat->imun2; ?></td>
                                                <td><?= $komdat->kb2; ?></td>
                                                <td>
                                                <?php if (session()->get('role') == 'admin') : ?>
                                                <a href="/komdatlaporandetail/<?= $komdat->idlaporan; ?>" class="btn btn-warning btn-sm">Detail</a>
                                                <a href="/komdatlaporan/pdf/<?= $komdat->idlaporan; ?>" class="btn btn-info btn-sm">Cetak</a>
                                                <?php endif; ?>
                                                <?php if (session()->get('role') == 'kader') : ?>
                                                <a href="/detaillaporankomdat/<?= $komdat->idlaporan; ?>" class="btn btn-warning btn-sm">Detail</a>
                                                <!-- <a href="/editlaporankomdat/<?= $komdat->idlaporan; ?>" class="btn btn-success btn-sm">Edit</a> -->
                                                <a href="/laporankomdat/pdf/<?= $komdat->idlaporan; ?>" class="btn btn-info btn-sm">Cetak</a>
                                                <form action="/hapuslaporankomdat/<?= $komdat->idlaporan; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="confirmDelete(event)">Hapus</button>
                                                </form>
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
                      <!-- /page content -->
                        </div>
                    </div>
                 </div>
              </div>
            </div>
        </div>
    </div>
    <script>
        function simpanData() {
            Swal.fire({
                title: "Sukses!",
                text: "Data komdat berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?= base_url('datalaporankomdat'); ?>";
                }
            });
        }
    </script>
    <script>
        function hapusData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data laporan komdat akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapuslaporankomdat/' + id;
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
                text: 'Apakah Anda yakin menghapus data laporan komdat ini?',
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
 <!-- /page content -->
 <?= $this->endSection() ?>
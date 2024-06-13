<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<style>
    .merah {
        color: red;
    }
</style>
 <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Riwayat Kesehatan Bumil</h3>
              </div>
              <div class="title_right">
              </div>
            </div>
           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="ln_solid"></div>
                          <div class="x_title">
                            <h2>Tabel Data Riwayat Kesehatan Bumil</h2>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                              </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                        <div class="x_content">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive" id="grafik-riwayat">
                              <table id="example-buttons" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama Bumil</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Berat Badan</th>
                                    <th>Panjang Lila</th>
                                    <th>Aksi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                  <?php foreach($kesbumil as $kes) : ?>
                                    <tr>
                                      <th scope="row"><?= $i++; ?></th>
                                      <td><?= $kes->ibunama; ?></td>
                                      <td><?= $kes->tglperiksa; ?></td>
                                      <td><?= $kes->bb; ?></td>
                                      <td><?= $kes->lila; ?></td>
                                      
                                      <td>
                                          <button 
                                              data-toggle="modal" data-target="#result" class="btn btn-dark"
                                              data-ibunama="<?= $kes->ibunama ?>"
                                              data-umur="<?= $kes->umur ?>"
                                              data-bb="<?= $kes->bb ?>"
                                              data-ketbb="<?= $kes->ketbb ?>"
                                              data-lila="<?= $kes->lila ?>"
                                              data-ketlila="<?= $kes->ketlila ?>"
                                              data-ket_bb="<?= $kes->hasil_bb ?>"
                                              data-ket_lila="<?= $kes->hasil_lila ?>"
                                          >Hasil</button>
                                      <?php if (session()->get('role') == 'masyarakat') : ?>
                                        <a href="/detailkesbumilku/<?= $kes->idkesbumil; ?>" class="btn btn-warning">Detail</a>
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

                        <!-- Modal Kesehatan Bumil -->
                        <div class="modal fade bs-example-modal-lg" id="result" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hasil</h5>
                                    </div>
                                    <div class="modal-body">
                                            <table class="table table-striped table-bordered" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td><div id="nama_result"></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Berat Badan</td>
                                                        <td><div id="berat_badan_result"></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Panjang Lila</td>
                                                        <td><div id="lila_result"></div></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <h6>Berat Badan</h6>
                                            <p><div class="text-dark" id="ket_bb"></div></p>
                                            <d>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
                                            <h6>Lingkar Lengan Atas (Lila)</h6>
                                            <p><div class="text-dark" id="ket_lila"></div></p>
                                            <br>
                                            <canvas style="display:none" id="grafik"></canvas>
                                            <!-- <canvas id="grafik"></canvas> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-tutup" data-dismiss="modal">Tutup</button>
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
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>

        $(document).on('click', '[data-target="#result"]', function(){

            $("#nama_result").html($(this).data('ibunama') + ' (' + $(this).data('umur') + ' Tahun)')
            $("#berat_badan_result").html($(this).data('bb') + ' ' + $(this).data('ketbb') + ' ')
            $("#lila_result").html($(this).data('lila') + ' ' + $(this).data('ketlila') + ' ')

            $("#ket_bb").html($(this).data('ket_bb'))
            $("#ket_lila").html($(this).data('ket_lila'))

        })
        
        
    </script>
 <!-- /page content -->
 <?= $this->endSection() ?>
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
                <h3>Riwayat Penimbangan Anak</h3>
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
                            <h2>Tabel Data Riwayat Penimbangan Anak</h2>
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
                                    <div class="card-box table-responsive">
                            <table id="example-buttons" class="table table-striped table-bordered" style="width:100%">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Nama Anak</th>
                                  <th>Tanggal Timbang</th>
                                  <th>BB</th>
                                  <th>TB</th>
                                  <th>LK</th>
                                  <th>Lila</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                <?php foreach($penimbangan as $timbang) : ?>
                                  <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $timbang->anaknama; ?></td>
                                    <td><?= $timbang->tgltimbang; ?></td>
                                    <td><?= $timbang->bb; ?></td>
                                    <td><?= $timbang->tb; ?></td>
                                    <td><?= $timbang->lk; ?></td>
                                    <td><?= $timbang->lila; ?></td>
                                    
                                    <td>
                                        <button 
                                            data-toggle="modal" data-target="#result" class="btn btn-dark"
                                            data-anaknama="<?= $timbang->anaknama ?>" 
                                            data-usia="<?= $timbang->usia ?>"
                                            data-bb="<?= $timbang->bb ?>"
                                            data-ketbb="<?= $timbang->ketbb ?>"
                                            data-tb="<?= $timbang->tb ?>"
                                            data-kettb="<?= $timbang->kettb ?>"
                                            data-lk="<?= $timbang->lk ?>"
                                            data-ketlk="<?= $timbang->ketlk ?>"
                                            data-lila="<?= $timbang->lila ?>"
                                            data-ketlila="<?= $timbang->ketlila ?>"
                                            data-ket_bb="<?= $timbang->hasil_bb ?>"
                                            data-ket_tb="<?= $timbang->hasil_tb ?>"
                                            data-ket_lk="<?= $timbang->hasil_lk ?>"
                                            data-ket_lila="<?= $timbang->hasil_lila ?>"
                                        >Hasil</button>
                                    <?php if (session()->get('role') == 'masyarakat') : ?>
                                      <a href="/detailpenimbanganakku/<?= $timbang->idpenimbangan; ?>" class="btn btn-warning">Detail</a>
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

                        <!-- Modal Penimbangan Anak -->
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
                                                        <td>Nama Anak</td>
                                                        <td><div id="nama_result"></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Berat Badan</td>
                                                        <td><div id="berat_badan_result"></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tinggi Badan</td>
                                                        <td><div id="tinggi_badan_result"></div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lingkar Kepala</td>
                                                        <td><div id="lk_result"></div></td>
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
                                            <h6>Tinggi Badan</h6>
                                            <p><div class="text-dark" id="ket_tb"></div></p>
                                            <d>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
                                            <h6>Lingkar Kepala</h6>
                                            <p><div class="text-dark" id="ket_lk"></div></p>
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

            $("#nama_result").html($(this).data('anaknama') + ' (' + $(this).data('usia') + ' Bulan)')
            $("#berat_badan_result").html($(this).data('bb') + ' ' + $(this).data('ketbb') + ' ')
            $("#tinggi_badan_result").html($(this).data('tb') + ' ' + $(this).data('kettb') + ' ')
            $("#lk_result").html($(this).data('lk') + ' ' + $(this).data('ketlk') + ' ')
            $("#lila_result").html($(this).data('lila') + ' ' + $(this).data('ketlila') + ' ')

            $("#ket_bb").html($(this).data('ket_bb'))
            $("#ket_tb").html($(this).data('ket_tb'))
            $("#ket_lk").html($(this).data('ket_lk'))
            $("#ket_lila").html($(this).data('ket_lila'))

        })
        
        
    </script>
 <!-- /page content -->
 <?= $this->endSection() ?>
<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

 <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Penimbangan Anak</h3>
              </div>
            </div>
           
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                    <?php if (session()->get('role') == 'kader') : ?>
                        <div class="divider-dashed"></div>
                            <h2>Data Anak</h2>
                        <div class="divider-dashed"></div>
                        <div class="x_content">
                        <br />
                        <form id="penimbangan-form" name="penimbangan-form" class="form-horizontal form-label-left" action="<?php echo base_url('/penimbangan_anak/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="anaknama">Nama Anak
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="hidden" name="idanak" id="idanak" class="form-control" readonly>
                                        <input type="hidden" name="idortu" id="idortu" class="form-control" readonly>

                                        <input type="text" name="anaknama" id="anaknama" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataAnakModal">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="jk" id="jk" readonly="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input class="date-picker form-control" name="tgllhr" id="tgllhr" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" readonly>
                                        <script>
                                            function timeFunctionLong(input) {
                                                setTimeout(function() {
                                                    input.type = 'text';
                                                }, 60000);
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibunama">Nama Ibu
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="ibunama" id="ibunama" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahnama">Nama Ayah
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="text" name="ayahnama" id="ayahnama" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                                <div class="divider-dashed"></div>
                                    <h2>Cek Penimbangan Anak</h2>
                                <div class="divider-dashed"></div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Sekarang
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="date-picker form-control" name="tgltimbang" id="tgltimbang" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" onchange="cek_usia(event);">
                                    <script>
                                        function timeFunctionLong(input) {
                                            setTimeout(function() {
                                                input.type = 'text';
                                            }, 60000);
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="usia">Usia
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=number step=any id="usia" name="usia" class="form-control" readonly>
                                </div>
                                <label class="col-form-label label-align" for="usia">bulan</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="bb">Berat Badan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                        <input type=number step=any id="bb" name="bb" class="form-control">
                                </div>
                                <label class="col-form-label label-align" for="bb">kg</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="tb">Tinggi Badan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=number step=any id="tb" name="tb" class="form-control">
                                </div>
                                <label class="col-form-label label-align" for="tb">cm</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lk">Lingkar Kepala
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=number step=any id="lk" name="lk" class="form-control">
                                </div>
                                <label class="col-form-label label-align" for="lk">cm</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="lila">Panjang Lila
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=number step=any id="lila" name="lila" class="form-control">
                                </div>
                                <label class="col-form-label label-align" for="lila">cm</label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ket">Keterangan
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text id="ket" name="ket" class="form-control">
                                </div>
                                <label class="col-form-label label-align" for="ket"></label>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <tbody>
                                    <tr>
                                      <td>
                                        <!-- <button type="button" id="simpan" name="simpan" class="btn btn-info">Tambah</button> -->
                                        <button type="button" id="proses" name="proses" data-toggle="modal" data-target="#result" class="btn btn-success">Perhitungan dan Simpan</button>
                                      </td>
                                    </tr>  
                                  </tbody>
                                </div>
                            </div>
                          </form>  
                        <?php endif; ?>
                        <!-- page content -->
                        <div class="ln_solid"></div>
                          <div class="x_title">
                            <h2>Tabel Data Penimbangan Anak</h2>
                            <?php if (session()->get('role') == 'admin') : ?>
                                <div class="col-sm-8">
                                    <form action="" method="post">
                                    <div class="text-right">
                                        <a href="<?php echo base_url('/penimbanganakdata/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                                        <a href="<?php echo base_url('/penimbanganakdata/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                                    </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'kader') : ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <form action="" method="post">
                                        <div class="text-right">
                                            <a href="<?php echo base_url('/datapenimbanganak/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                                            <a href="<?php echo base_url('/datapenimbanganak/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (session()->get('role') == 'admin') : ?>
                            <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                              </li>
                            </ul>
                          <?php endif; ?>
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
                                        text: "Data penimbangan berhasil dihapus.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "<?= base_url('datapenimbanganak'); ?>";
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
                                  <th>Nama Anak</th>
                                  <th>Nama Ibu</th>
                                  <th>Nama Ayah</th>
                                  <th>Tanggal Timbang</th>
                                  <th>BB</th>
                                  <th>TB</th>
                                  <th>Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                <?php foreach($penimbangan as $timbang) : ?>
                                  <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $timbang->anaknama; ?></td>
                                    <td><?= $timbang->ibunama; ?></td>
                                    <td><?= $timbang->ayahnama; ?></td>
                                    <td><?= $timbang->tgltimbang; ?></td>
                                    <td><?= $timbang->bb; ?></td>
                                    <td><?= $timbang->tb; ?></td>
                                    
                                    <td>
                                    <?php if (session()->get('role') == 'admin') : ?>
                                      <a href="/penimbanganakdetail/<?= $timbang->idpenimbangan; ?>" class="btn btn-warning btn-sm">Detail</a>
                                    <?php endif; ?>
                                    <?php if (session()->get('role') == 'kader') : ?>
                                      <a href="/detailpenimbanganak/<?= $timbang->idpenimbangan; ?>" class="btn btn-warning btn-sm">Detail</a>
                                      <!-- <a href="/editpenimbanganak/<?= $timbang->idpenimbangan; ?>" class="btn btn-success btn-sm">Edit</a> -->
                                      <form action="/hapuspenimbanganak/<?= $timbang->idpenimbangan; ?>" method="post" class="d-inline">
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

                        <!-- Modal Data Anak -->
                        <div class="modal fade bs-example-modal-lg" id="DataAnakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Data Anak</h5>
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> -->
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Anak</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Nama Ibu</th>
                                                    <th>Nama Ayah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                                <?php foreach($anak as $nak) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $nak->anaknama; ?></td>
                                                        <td><?= $nak->jk; ?></td>
                                                        <td><?= $nak->tgllhr; ?></td>
                                                        <td><?= $nak->ibunama; ?></td>
                                                        <td><?= $nak->ayahnama; ?></td>
                                                        <td>
                                                        <button id="pilihAnak" type="button" data-id="<?= $nak->idanak; ?>" data-anaknama="<?= $nak->anaknama; ?>" data-jk="<?= $nak->jk; ?>" data-tgllhr="<?= $nak->tgllhr; ?>" data-idortu="<?= $nak->idortu; ?>" data-ibunama="<?= $nak->ibunama; ?>" data-ayahnama="<?= $nak->ayahnama; ?>" class="btnSelectAnak btn btn-primary btn-sm">Pilih</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Penimbangan Anak -->
                        <div class="modal fade bs-example-modal-lg" id="result" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
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
                                                        <td>Jenis Kelamin</td>
                                                        <td><div id="jenis_kelamin_result"></div></td>
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
                                            <h6>Berat Badan Ideal</h6>
                                            <p><div id="ket_bb"></div></p>
                                            <d>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
                                            <h6>Tinggi Badan Ideal</h6>
                                            <p><div id="ket_tb"></div></p>
                                            <d>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
                                            <h6>Lingkar Kepala</h6>
                                            <p><div id="ket_lk"></div></p>
                                            <d>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</b>
                                            <h6>Lingkar Lengan Atas (Lila)</h6>
                                            <p><div id="ket_lila"></div></p>
                                            <br>
                                            <canvas style="display:none" id="grafik"></canvas>
                                            <!-- <canvas id="grafik"></canvas> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="simpanData()" class="btn btn-danger btn-tutup" data-dismiss="modal">Tutup</button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script>

        function getGrafikBB(){
            // Data berat badan dan usia anak
        var beratBadan = [3.5, 4, 4.2, 4.5, 5, 5.2];
        var usiaAnak = [0, 1, 2, 3, 4, 5];

        // Membuat grafik menggunakan Chart.js
        var ctx = document.getElementById('grafik').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: usiaAnak,
                datasets: [{
                    label: 'Berat Badan Anak',
                    data: beratBadan,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Usia Anak (bulan)'
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Berat Badan (kg)'
                        }
                    }
                }
            }
        });
        }
    </script>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '#pilihAnak', function(){
            anaknama = $(this).data('anaknama')
            id = $(this).data('id')
            idortu = $(this).data('idortu')
            jk = $(this).data('jk')
            tgllhr = $(this).data('tgllhr')
            ibunama = $(this).data('ibunama')
            ayahnama = $(this).data('ayahnama')
            
            $("#anaknama").val(anaknama)
            $("#idanak").val(id)
            $("#idortu").val(idortu)
            $("#jk").val(jk)
            $("#tgllhr").val(tgllhr)
            $("#ibunama").val(ibunama)
            $("#ayahnama").val(ayahnama)

            $('#DataAnakModal').modal('hide')
        })

        function cek_usia(input) {
            hariIni  = new Date(input.target.value);
            tanggalLahir  = new Date($("#tgllhr").val())
            var bulanLahir = tanggalLahir.getMonth();
            var tahunLahir = tanggalLahir.getFullYear();
            var bulanSekarang = hariIni.getMonth();
            var tahunSekarang = hariIni.getFullYear();
            var selisihBulan = (tahunSekarang - tahunLahir) * 12 + (bulanSekarang - bulanLahir);
            $("#usia").val(selisihBulan)
        }

        $(document).on('click', '#proses', function(){

            getGrafikBB()

            nama = $("#anaknama").val()
            jk = $("#jk").val()
            tgllhr = $("#tgllhr").val()
            tgltimbang = $("#tgltimbang").val()
            tb = $("#tb").val()
            bb = $("#bb").val()
            lk = $("#lk").val()
            lila = $("#lila").val()

            // inisialisasi
            hariIni  = new Date(tgltimbang);
            tanggalLahir  = new Date(tgllhr);
            var bulanLahir = tanggalLahir.getMonth();
            var tahunLahir = tanggalLahir.getFullYear();
            var bulanSekarang = hariIni.getMonth();
            var tahunSekarang = hariIni.getFullYear();
            var selisihBulan = (tahunSekarang - tahunLahir) * 12 + (bulanSekarang - bulanLahir);
            var selisihTahun = (tahunSekarang - tahunLahir);
            var kurangbb = 2.8;
            var tambahbb = 0.5;
            var kurangtb = 9.8;
            var tambahtb = 6;
            var kuranglk = 1;
            var tambahlk = 1.5;
            var kurangll = 1.5;
            var tambahll = 1.7;

            // rumus berat badan
            if(selisihTahun < 1 && selisihBulan >= 3 && selisihBulan < 12){
                rumus_bb = "Usia 3 - 12 Bulan : ( usia (bulan) + 9 kg ) / 2";
                berat_badan_ideal = (selisihBulan + 9) / 2;
            }
            else if(selisihTahun >= 1 && selisihTahun <= 6){
                rumus_bb = "Usia 1 - 6 Tahun  :  usia (tahun) x 2 + 8 kg";
                berat_badan_ideal = (selisihTahun * 2) + 8;
            }
            else if(selisihTahun > 6 && selisihTahun <= 12){
                berat_badan_ideal = ((selisihTahun *7 ) - 5) / 2;
                rumus_bb = "Usia 6 - 12 Tahun : ( usia (tahun) x 7 - 5 kg ) / 2";
            }
            else{
                berat_badan_ideal = 0;
                rumus_bb = 0;
            }

            // rumus tinggi badan
            if(selisihTahun < 1){
                rumus_tb = "Lahir => 50";
                tinggi_badan_ideal = 50;
            }
            else if(selisihTahun == 1){
                rumus_tb = "1 Tahun => 75";
                tinggi_badan_ideal = 75;
            }
            else if(selisihTahun >= 2 && selisihTahun <= 12){
                rumus_tb = "2 - 12 Tahun => usia (tahun) x 6 + 77";
                tinggi_badan_ideal = ((selisihTahun *6 ) + 77);
            }
            else{
                tinggi_badan_ideal=0;
                rumus_tb=0;
            }

            // rumus lingkar kepala
            if (jk == 'Laki - Laki') {
                    if (selisihBulan >= 0 && selisihBulan <= 3) {
                        lk_ideal = 37.5;    
                    }else if (selisihBulan > 3 && selisihBulan <= 6){
                        lk_ideal = 41.5;
                    }else if (selisihBulan > 6 && selisihBulan <= 12){
                        lk_ideal = 44.5;
                    }else if(selisihBulan > 12 && selisihBulan <= 36){
                        lk_ideal = 47.5;
                    }else{
                        lk_ideal = 0;
                    }
            }
            else if (jk == 'Perempuan'){ // perempuan
                    if (selisihBulan >= 0 && selisihBulan <= 3){
                        lk_ideal = 37;
                    }else if(selisihBulan > 3 && selisihBulan <= 6){
                        lk_ideal = 40.5;
                    }else if(selisihBulan > 6 && selisihBulan <= 12){
                        lk_ideal = 43.5;
                    }else if(selisihBulan > 12 && selisihBulan <= 36){
                        lk_ideal = 47;
                    }else{
                        lk_ideal = 0;
                    }
            }
            else{
                lk_ideal = 0;
            }


            // rumus lila
            if (jk == 'Laki - Laki') {
                switch(selisihBulan) {
                    case 3:
                        lila_ideal = 13.5;
                        break;
                    case 4:
                        lila_ideal = 13.8;
                        break;
                    case 5:
                        lila_ideal = 14.1;
                        break;
                    case 6:
                        lila_ideal = 14.2;
                        break;
                    case 7:
                        lila_ideal = 14.4;
                        break;
                    case 8:
                        lila_ideal = 14.5;
                        break;
                    case 9:
                        lila_ideal = 14.5;
                        break;
                    case 10:
                        lila_ideal = 14.6;
                        break;
                    case 11:
                        lila_ideal = 14.6;
                        break;
                    case 12:
                        lila_ideal = 14.6;
                        break;
                    case 13:
                        lila_ideal = 14.7;
                        break;
                    case 14:
                        lila_ideal = 14.7;
                        break;
                    case 15:
                        lila_ideal = 14.7;
                        break;
                    case 16:
                        lila_ideal = 14.8;
                        break;
                    case 17:
                        lila_ideal = 14.8;
                        break;
                    case 18:
                        lila_ideal = 14.8;
                        break;
                    case 19:
                        lila_ideal = 14.9;
                        break;
                    case 20:
                        lila_ideal = 14.9;
                        break;
                    case 21:
                        lila_ideal = 15.0;
                        break;
                    case 22:
                        lila_ideal = 15.0;
                        break;
                    case 23:
                        lila_ideal = 15.1;
                        break;
                    case 24:
                        lila_ideal = 15.2;
                        break;
                    case 25:
                        lila_ideal = 15.2;
                        break;
                    case 26:
                        lila_ideal = 15.3;
                        break;
                    case 27:
                        lila_ideal = 15.3;
                        break;
                    case 28:
                        lila_ideal = 15.4;
                        break;
                    case 29:
                        lila_ideal = 15.4;
                        break;
                    case 30:
                        lila_ideal = 15.5;
                        break;
                    case 31:
                        lila_ideal = 15.5;
                        break;
                    case 32:
                        lila_ideal = 15.6;
                        break;
                    case 33:
                        lila_ideal = 15.6;
                        break;
                    case 34:
                        lila_ideal = 15.7;
                        break;
                    case 35:
                        lila_ideal = 15.7;
                        break;
                    case 36:
                        lila_ideal = 15.7;
                        break;
                    case 37:
                        lila_ideal = 15.8;
                        break;
                    case 38:
                        lila_ideal = 15.8;
                        break;
                    case 39:
                        lila_ideal = 15.8;
                        break;
                    case 40:
                        lila_ideal = 15.9;
                        break;
                    case 41:
                        lila_ideal = 15.9;
                        break;
                    case 42:
                        lila_ideal = 15.9;
                        break;
                    case 43:
                        lila_ideal = 16.0;
                        break;
                    case 44:
                        lila_ideal = 16.0;
                        break;
                    case 45:
                        lila_ideal = 16.0;
                        break;
                    case 46:
                        lila_ideal = 16.1;
                        break;
                    case 47:
                        lila_ideal = 16.1;
                        break;
                    case 48:
                        lila_ideal = 16.1;
                        break;

                    default:
                        lila_ideal=0;
                }
            }else{ // perempuan
                switch(selisihBulan) {
                    case 3:
                        lila_ideal = 13.0;
                        break;
                    case 4:
                        lila_ideal = 13.4;
                        break;
                    case 5:
                        lila_ideal = 13.6;
                        break;
                    case 6:
                        lila_ideal = 13.8;
                        break;
                    case 7:
                        lila_ideal = 13.9;
                        break;
                    case 8:
                        lila_ideal = 14.0;
                        break;
                    case 9:
                        lila_ideal = 14.1;
                        break;
                    case 10:
                        lila_ideal = 14.1;
                        break;
                    case 11:
                        lila_ideal = 14.2;
                        break;
                    case 12:
                        lila_ideal = 14.2;
                        break;
                    case 13:
                        lila_ideal = 14.2;
                        break;
                    case 14:
                        lila_ideal = 14.3;
                        break;
                    case 15:
                        lila_ideal = 14.3;
                        break;
                    case 16:
                        lila_ideal = 14.4;
                        break;
                    case 17:
                        lila_ideal = 14.4;
                        break;
                    case 18:
                        lila_ideal = 14.5;
                        break;
                    case 19:
                        lila_ideal = 14.5;
                        break;
                    case 20:
                        lila_ideal = 14.6;
                        break;
                    case 21:
                        lila_ideal = 14.7;
                        break;
                    case 22:
                        lila_ideal = 14.7;
                        break;
                    case 23:
                        lila_ideal = 14.8;
                        break;
                    case 24:
                        lila_ideal = 14.9;
                        break;
                    case 25:
                        lila_ideal = 15.0;
                        break;
                    case 26:
                        lila_ideal = 15.0;
                        break;
                    case 27:
                        lila_ideal = 15.1;
                        break;
                    case 28:
                        lila_ideal = 15.2;
                        break;
                    case 29:
                        lila_ideal = 15.3;
                        break;
                    case 30:
                        lila_ideal = 15.3;
                        break;
                    case 31:
                        lila_ideal = 15.4;
                        break;
                    case 32:
                        lila_ideal = 15.4;
                        break;
                    case 33:
                        lila_ideal = 15.5;
                        break;
                    case 34:
                        lila_ideal = 15.5;
                        break;
                    case 35:
                        lila_ideal = 15.6;
                        break;
                    case 36:
                        lila_ideal = 15.6;
                        break;
                    case 37:
                        lila_ideal = 15.7;
                        break;
                    case 38:
                        lila_ideal = 15.7;
                        break;
                    case 39:
                        lila_ideal = 15.8;
                        break;
                    case 40:
                        lila_ideal = 15.9;
                        break;
                    case 41:
                        lila_ideal = 15.9;
                        break;
                    case 42:
                        lila_ideal = 16.0;
                        break;
                    case 43:
                        lila_ideal = 16.0;
                        break;
                    case 44:
                        lila_ideal = 16.1;
                        break;
                    case 45:
                        lila_ideal = 16.1;
                        break;
                    case 46:
                        lila_ideal = 16.1;
                        break;
                    case 47:
                        lila_ideal = 16.2;
                        break;
                    case 48:
                        lila_ideal = 16.2;
                        break;

                    default:
                        lila_ideal=0;
                }
            }

            //hasil berat badan
            if (bb >= (berat_badan_ideal - 3.1) && bb <= (berat_badan_ideal + 0.8)){
                badge_bb = "<span class='badge badge-success'>Berat Badan Ideal</span>";
            }else if (bb < (berat_badan_ideal - 3.1)){
                badge_bb = "<span class='badge badge-warning'>Berat Badan Kurang</span>";
            }else if (bb > (berat_badan_ideal + 0.8)){
                badge_bb = "<span class='badge badge-danger'>Berat Badan Berebihan</span>";
            }else{
                badge_bb = "<span class='badge badge-secondary'>Berat Badan Tidak Dapat Ditentukan</span>";
            }
            
            // hasil tinggi badan
            if (tb >= (tinggi_badan_ideal - 9.8) && tb <= (tinggi_badan_ideal + 6)) {
                badge_tb = "<span class='badge badge-success'>Tinggi Badan Ideal</span>";
            }else if (tb < (tinggi_badan_ideal - 9.8)){
                badge_tb = "<span class='badge badge-warning'>Tinggi Badan Kurang</span>";
            }else if (tb > (tinggi_badan_ideal + 6)){
                badge_tb = "<span class='badge badge-danger'>Tinggi Badan Berlebihan</span>";
            }else{
                badge_tb = "<span class='badge badge-secondary'>Tinggi Badan Tidak Dapat Ditentukan</span>";
            }

            // hasil lingkar kepala
            if (lk >= (lk_ideal - 1) && lk <= (lk_ideal + 1.5)) {
                badge_lk = "<span class='badge badge-success'>Lingkar Kepala Ideal</span>";
            }else if (lk < (lk_ideal - 1)){
                badge_lk = "<span class='badge badge-warning'>Lingkar Kepala Kurang</span>";
            }else if (lk > (lk_ideal + 1.5)){
                badge_lk = "<span class='badge badge-danger'>Lingkar Kepala Berlebihan</span>";
            }else{
                badge_lk = "<span class='badge badge-secondary'>Lingkar Kepala Tidak Dapat Ditentukan</span>";
            }

            // hasil lila
            if (lila >= (lila_ideal - 1.5) && lila <= (lila_ideal + 1.7)) {
                badge_lila = "<span class='badge badge-success'>Panjang Lila Ideal</span>";
            }else if (lila < (lila_ideal - 1.5)){
                badge_lila = "<span class='badge badge-warning'>Panjang Lila Kurang</span>";
            }else if (lila > (lila_ideal + 1.7)){
                badge_lila = "<span class='badge badge-danger'>Panjang Lila Berlebihan</span>";
            }else{
                badge_lila = "<span class='badge badge-secondary'>Panjang Lila Tidak Dapat Ditentukan</span>";
            }

            $("#nama_result").html(nama+" ("+selisihBulan+" Bulan)")
            $("#jenis_kelamin_result").html(jk)
            $("#berat_badan_result").html(bb+" "+badge_bb)
            $("#tinggi_badan_result").html(tb+" "+badge_tb)
            $("#lk_result").html(lk+" "+badge_lk)
            $("#lila_result").html(lila+" "+badge_lila)

            ket_bb = nama+" sekarang berusia "+selisihBulan+" bulan. Dengan menggunakan rumus "+rumus_bb+". Berarti berat badan normal anak seusia "+nama+" adalah "+(berat_badan_ideal - kurangbb)+" - "+(berat_badan_ideal + tambahbb)+" kg.";

            ket_tb = nama+" sekarang berusia "+selisihBulan+" bulan. Dengan menggunakan rumus "+rumus_tb+". Berarti tinggi badan normal anak seusia "+nama+" adalah "+(tinggi_badan_ideal - kurangtb)+" - "+(tinggi_badan_ideal + tambahtb)+" cm.";

            ket_lk = nama+" sekarang berusia "+selisihBulan+" bulan. Berdasarkan WHO untuk anak "+jk+". Berarti lingkar kepala normal anak seusia "+nama+" adalah "+(lk_ideal - kuranglk)+" - "+(lk_ideal + tambahlk)+" cm.";

            ket_lila = nama+" sekarang berusia "+selisihBulan+" bulan. Berdasarkan WHO untuk anak "+jk+". Lila normal anak seusia "+nama+" adalah "+(lila_ideal - kurangll)+" - "+(lila_ideal + tambahll)+" cm.";

            $("#ket_bb").html(ket_bb)
            $("#ket_tb").html(ket_tb)
            $("#ket_lk").html(ket_lk)
            $("#ket_lila").html(ket_lila)

            var data = {
              idanak: $("#idanak").val(),
              idortu: $("#idortu").val(),
              tgltimbang: $("#tgltimbang").val(),
              bb: $("#bb").val(),
              ketbb: badge_bb,
              usia: $("#usia").val(),
              tb: $("#tb").val(),
              kettb: badge_tb,
              lk: $("#lk").val(),
              ketlk: badge_lk,
              lila: $("#lila").val(),
              ketlila: badge_lila,
              ket: $("#ket").val(),
              hasil_bb: ket_bb,
              hasil_tb: ket_tb,
              hasil_lk: ket_lk,
              hasil_lila: ket_lila,
            };

            var url = '/penimbanganak/save';

            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                // location.reload();
              } else {
                console.log('Terjadi kesalahan');
              }
            };

            xhr.send(JSON.stringify(data));
        })

        $('.btn-tutup').click(()=>{
            if($("#idanak").val() != "" && $("#idortu").val() != "" && $("#tgltimbang").val() != "" && $("#bb").val() != "" && $("#usia").val() != "" && $("#tb").val() != "" && $("#lk").val() != "" && $("#lila").val() != "" && $("#ket").val()){
                location.reload()
            }
        })  

        $(document).on('click', '#simpan', function(){

            var data = {
              idanak: $("#idanak").val(),
              idortu: $("#idortu").val(),
              tgltimbang: $("#tgltimbang").val(),
              bb: $("#bb").val(),
              usia: $("#usia").val(),
              tb: $("#tb").val(),
              lk: $("#lk").val(),
              lila: $("#lila").val(),
              ket: $("#ket").val(),
            };

            var url = '/penimbanganak/save';

            var xhr = new XMLHttpRequest();
            xhr.open('POST', url, true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onreadystatechange = function() {
              if (xhr.readyState === 4 && xhr.status === 200) {
                location.reload();
              } else {
                console.log('Terjadi kesalahan');
              }
            };

            xhr.send(JSON.stringify(data));
        })
        
        
    </script>
    <script>
        function simpanData() {
            Swal.fire({
                title: "Sukses!",
                text: "Data penimbangan berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?= base_url('datapenimbanganak'); ?>";
                }
            });
        }
    </script>
      <script>
        function hapusData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data penimbangan akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapuspenimbanganak/' + id;
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
                text: 'Apakah Anda yakin menghapus data penimbangan anak ini?',
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
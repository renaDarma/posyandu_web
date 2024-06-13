<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Imunisasi Anak</h3>
              </div>
            </div>

            <div class="clearfix"></div>
      
            <div class="row">
              <div class="col-md-12">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                <?php if (session()->get('role') == 'kader') : ?>
                    <div class="x_content">
                        <br />
                        <form id="imunisasi-form" name="imunisasi-form" class="form-horizontal form-label-left" action="<?php echo base_url('/anak_imunisasi/submit'); ?>" method="POST" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Sekarang
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="date-picker form-control" name="tglimun" id="tglimun" type="text" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" onchange="cek_usia(event);">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="jenisimun">Jenis Imunisasi
                                </label>
                                <div class="col-md-6 col-sm-6">
                                  <input type="radio" name="jenisimun[]" value="Hepatitis B"> Hepatitis B <br>
                                  <input type="radio" name="jenisimun[]" value="BCG"> BCG <br>
                                  <input type="radio" name="jenisimun[]" value="Polio tetes 1"> Polio tetes 1 <br>
                                  <input type="radio" name="jenisimun[]" value="DPT 1, Polio tetes 2 dan PCV 1"> DPT 1, Polio tetes 2 dan PCV 1 <br>
                                  <input type="radio" name="jenisimun[]" value="DPT 2, Polio tetes 3 dan PCV 2"> DPT 2, Polio tetes 3 dan PCV 2 <br>
                                  <input type="radio" name="jenisimun[]" value="DPT 3, Polio tetes 4 dan Polio suntik (IPV)"> DPT 3, Polio tetes 4 dan Polio suntik (IPV) <br>
                                  <input type="radio" name="jenisimun[]" value="Campak dan rubella (MR)"> Campak dan rubella (MR) <br>
                                  <input type="radio" name="jenisimun[]" value="PCV 3"> PCV 3 <br>
                                  <input type="radio" name="jenisimun[]" value="DPT Lanjutan"> DPT Lanjutan <br>
                                  <input type="radio" name="jenisimun[]" value="Campak dan rubella (MR) Lanjutan"> Campak dan rubella (MR) Lanjutan <br>
                                </div>
                                <label class="col-form-label label-align" for="jenisimun"></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="namavit">Jenis Imunisasi & Obat Cacing
                                </label>
                                <div class="col-md-6 col-sm-6">
                                  <input type="checkbox" name="namavit[]" value="Vitamin A Biru" class="flat"> Vitamin A Biru 
                                  <input type="checkbox" name="namavit[]" value="Vitamin A Merah" class="flat"> Vitamin A Merah 
                                  <input type="checkbox" name="obatcacing[]" value="Obat Cacing" class="flat"> Obat Cacing
                                </div>
                                <label class="col-form-label label-align" for="namavit"></label>
                            </div>
                            <!-- <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="obatcacing">Obat Cacing
                                </label>
                                <div class="col-md-6 col-sm-6">
                                  <input type="checkbox" name="obatcacing[]" value="Obat Cacing"><br>
                                </div>
                                <label class="col-form-label label-align" for="obatcacing"></label>
                            </div> -->
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
                                          <button type="button" id="simpan" name="simpan" class="btn btn-info">Simpan</button>
                                      </td>
                                    </tr>  
                                  </tbody>
                                </div>
                            </div>
                            <div class="text-center d-flex justify-content-center align-item-center">
                                <div class="w-50 alert-message alert-danger px-4 py-3 text-white d-none"></div>
                            </div>

                          </form> 
                  <?php endif; ?>  
                            <div class="ln_solid"></div>
                    <!-- page content -->
                        <div class="x_title">
                          <h2>Tabel Data Imunisasi Anak</h2>
                          <?php if (session()->get('role') == 'admin') : ?>
                            <div class="col-sm-8">
                                <form action="" method="post">
                                <div class="text-right">
                                    <a href="<?php echo base_url('imunanakdata/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                                    <a href="<?php echo base_url('imunanakdata/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                                </div>
                                </form>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->get('role') == 'kader') : ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="post">
                                    <div class="text-right">
                                        <a href="<?php echo base_url('dataimunanak/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                                        <a href="<?php echo base_url('dataimunanak/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
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
                                        text: "Data imunisasi berhasil dihapus.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "<?= base_url('dataimunanak'); ?>";
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
                                <th>Usia Anak</th>
                                <th>Tanggal Imunisasi</th>
                                <th>Jenis Imunisasi</th>
                                <th>Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                              <?php foreach($imunisasi as $imun) : ?>
                                <tr>
                                  <th scope="row"><?= $i++; ?></th>
                                  <td><?= $imun->anaknama; ?></td>
                                  <td><?= $imun->ibunama; ?></td>
                                  <td><?= $imun->usia; ?></td>
                                  <td><?= $imun->tglimun; ?></td>
                                  <td><?= $imun->jenisimun; ?></td>
                                  <td>
                                  <?php if (session()->get('role') == 'admin') : ?>
                                    <a href="/imunanakdetail/<?= $imun->idimunisasi; ?>" class="btn btn-warning btn-sm">Detail</a>
                                  <?php endif; ?>
                                  <?php if (session()->get('role') == 'kader') : ?>
                                    <a href="/detailimunanak/<?= $imun->idimunisasi; ?>" class="btn btn-warning btn-sm">Detail</a>
                                    <!-- <a href="/editimunanak/<?= $imun->idimunisasi; ?>" class="btn btn-success btn-sm">Edit</a> -->
                                    <form action="/hapusimunanak/<?= $imun->idimunisasi; ?>" method="post" class="d-inline">
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
                                                        <td>
                                                        <button id="pilihAnak" type="button" data-idanak="<?= $nak->idanak; ?>" data-anaknama="<?= $nak->anaknama; ?>" data-jk="<?= $nak->jk; ?>" data-tgllhr="<?= $nak->tgllhr; ?>" data-idortu="<?= $nak->idortu; ?>" data-ibunama="<?= $nak->ibunama; ?>" class="btnSelectAnak btn btn-primary btn-sm">Pilih</button>
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

                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '#pilihAnak', function(){
            anaknama = $(this).data('anaknama')
            idanak = $(this).data('idanak')
            idortu = $(this).data('idortu')
            jk = $(this).data('jk')
            tgllhr = $(this).data('tgllhr')
            ibunama = $(this).data('ibunama')
            
            $("#anaknama").val(anaknama)
            $("#idanak").val(idanak)
            $("#idortu").val(idortu)
            $("#jk").val(jk)
            $("#tgllhr").val(tgllhr)
            $("#ibunama").val(ibunama)

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

        $(document).on('click', '#simpan', function(){
            var data = {
              idanak: $("#idanak").val(),
              idortu: $("#idortu").val(),
              tglimun: $("#tglimun").val(),
              usia: $("#usia").val(),
              jenisimun: $("[name='jenisimun[]']:checked").val(),
              namavit: $("[name='namavit[]']:checked").val(),
              obatcacing: $("[name='obatcacing[]']:checked").val(),
              ket: $("#ket").val(),
        };

            var url = '/imunanak/save';

            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(response) {
                    if(response == "Data imunisasi berhasil ditambahkan."){
                        $('.alert-message').removeClass('d-none')
                        $('.alert-message').removeClass('alert-danger')
                        $('.alert-message').addClass('alert-info')
                        $('.alert-message').html(response)
                        location.reload()
                    }else{
                        $('.alert-message').removeClass('d-none')
                        $('.alert-message').html(response)
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                }
            });

        })
                
    </script>
    <script>
    </script>
    <script>
        function hapusData(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Data imunisasi akan dihapus.',
                icon: 'warning',
                showCancelButton: false, // Menghilangkan tombol "Batal"
                confirmButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengarahkan pengguna ke URL penghapusan dengan mengirimkan ID sebagai parameter
                    window.location.href = '/hapusimunanak/' + id;
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
                text: 'Apakah Anda yakin menghapus data imunisasi anak ini?',
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
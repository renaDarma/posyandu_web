<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Absen Anak</h3>
                <?php if(session()->getFlashdata('error')) : ?>
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <h3><?= session()->getFlashdata('error'); ?></h3>
                        </div>
                    </div>
                 <?php endif; ?>
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
                        <form id="absenanak-form" name="absenanak-form" class="form-horizontal form-label-left" action="<?php echo base_url('/anak_absen/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 label-align">Tanggal Posyandu</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="idagenda" id="idagenda">
                                    <?php foreach($agenda as $agen): ?>
                                        <option value="<?= $agen->idagenda ?>"><?= $agen->tglagenda ?> </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibunama">Nama Ibu
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="ibunama" name="ibunama" class="form-control" readonly>
                                </div>
                                <label class="col-form-label label-align" for="ibunama"></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="timbang">Penimbangan</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="checkbox" name="timbang[]" id="timbang" value="1" class="flat">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="imun">Imunisasi</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="checkbox" name="imun[]" id="imun" value="1" class="flat">
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group row">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                  <tbody>
                                    <tr>
                                      <td>
                                          <!-- <button type="button" id="simpan" name="simpan" class="btn btn-info">Simpan</button> -->
                                          <button type="button" onclick="simpanData()" id="simpan" name="simpan" class="btn btn-info">Simpan</button>
                                      </td>
                                    </tr>  
                                  </tbody>
                                </div>
                            </div>
                          </form> 
                  <?php endif; ?>  
                    <!-- <div class="ln_solid"></div>
                            <div class="row">
                                    <h5><b>Filter Absen</b></h5>
                                <div class="col-md-12 col-sm-12">
                                <form class="form-horizontal form-label-left" action="/absenanak/filter" method="POST">
                                    <div class="form-group row">
                                        <input type="hidden" name="nilaifilter" value="1"> 
                                        <label class="col-form-label col-sm-2 label-align"><b>Tanggal Agenda</b></label>
                                        <div class="col-md-2 col-sm-2">
                                            <div class="input-group">
                                            <select class="form-control" name="idagenda" id="idagenda">
                                                <?php foreach($agenda as $agen): ?>
                                                    <option value="<?= $agen->idagenda ?>"><?= $agen->tglagenda ?> </option>
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-2">
                                            <div class="md-4">
                                                <button type="submit" class="w-50 p-1 btn-outline-warning" value="Tampil">Tampil</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>  -->
                  <div class="ln_solid"></div>
                    <!-- page content -->
                        <div class="x_title">
                          <h2>Tabel Data Absensi Anak</h2>
                        <?php if (session()->get('role') == 'kader') : ?>
                            <!-- <div class="row">
                                <div class="col-sm-12">
                                    <form action="" method="post">
                                    <div class="text-right">
                                        <a href="<?php echo base_url('absenanak/excel') ?>" type="button" class="btn btn-sm btn-outline-success" id="dwn_menu" target="_blank" title="Download Excel"></i> Excel</a>
                                        <a href="<?php echo base_url('absenanak/pdf') ?>" type="button" class="btn btn-sm btn-outline-danger" id="dwn_menu" target="_blank" title="Print PDF"></i>PDF</a>
                                    </div>
                                    </form>
                                </div>
                            </div> -->
                        <?php endif; ?>
                          <div class="clearfix"></div>
                        </div>
                            <?php if (session()->getFlashdata('hapus')) : ?>
                                <script>
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: "Data imunisasi anak berhasil dihapus.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "<?= base_url('absenanak'); ?>";
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
                                <th>Tanggal Posyandu</th>
                                <th>Nama Anak</th>
                                <th>Nama Ibu</th>
                                <th>Penimbangan</th>
                                <th>Imunisasi</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                              <?php foreach($absenanak as $absen) : ?>
                                <tr>
                                  <th scope="row"><?= $i++; ?></th>
                                  <td><?= $absen->tglagenda; ?></td>
                                  <td><?= $absen->anaknama; ?></td>
                                  <td><?= $absen->ibunama; ?></td>
                                  <td>
                                  <?php
                                    if ($absen->timbang == "1") {
                                        echo "Hadir";
                                    } else{
                                        echo "Tidak Hadir";
                                    }
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    if ($absen->imun == "1") {
                                        echo "Hadir";
                                    } else{
                                        echo "Tidak Hadir";
                                    }
                                  ?>
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
                                                        <td><?= $nak->ibunama; ?></td>
                                                        <td>
                                                        <button id="pilihAnak" type="button" data-idanak="<?= $nak->idanak; ?>" data-anaknama="<?= $nak->anaknama; ?>" data-idortu="<?= $nak->idortu; ?>" data-ibunama="<?= $nak->ibunama; ?>" class="btnSelectAnak btn btn-primary btn-sm">Pilih</button>
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
            ibunama = $(this).data('ibunama')
            
            $("#anaknama").val(anaknama)
            $("#idanak").val(idanak)
            $("#idortu").val(idortu)
            $("#ibunama").val(ibunama)

            $('#DataAnakModal').modal('hide')
        })

        $(document).on('click', '#simpan', function(){

        // Tangkap nilai dari checkbox
            // var timbang = document.getElementById('timbang').checked ? 1 : 0;
            // var imun = document.getElementById('imun').checked ? 1 : 0;

        var data = {
          idanak: $("#idanak").val(),
          idortu: $("#idortu").val(),
          idagenda: $("#idagenda").val(),
          tglagenda: $("#tglagenda").val(),
          timbang: $("[name='timbang[]']:checked").val(),
          imun: $("[name='imun[]']:checked").val(),
        };

        var url = '/absenanak/save';

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
                text: "Data absensi anak berhasil disimpan.",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?= base_url('absenanak'); ?>";
                }
            });
        }
    </script>
 <!-- /page content -->
<?= $this->endSection() ?>
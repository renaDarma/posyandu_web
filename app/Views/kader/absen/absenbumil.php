<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Data Absen Bumil</h3>
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
                        <form id="absenbumil-form" name="absenbumil-form" class="form-horizontal form-label-left" action="<?php echo base_url('/bumil_absen/submit'); ?>" method="POST" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 label-align">Tanggal Posyandu</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="idagenda" id="idagenda">
                                    <?php foreach($agenda as $agen): ?>
                                        <option value="<?= $agen['idagenda'] ?>"><?= $agen['tglagenda'] ?> </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ibunama">Nama Bumil
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="hidden" name="idbumil" id="idbumil" class="form-control" readonly>

                                        <input type="text" name="ibunama" id="ibunama" class="form-control" readonly>
                                        <span class="input-group-btn">
                                            <button id="pilihData" name="pilihData" type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#DataBumilModal">Pilih</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="ayahnama">Nama Suami
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=text step=any id="ayahnama" name="ayahnama" class="form-control" readonly>
                                </div>
                                <label class="col-form-label label-align" for="ayahnama"></label>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kesbumil">Kesbumil</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="checkbox" name="kesbumil[]" id="kesbumil" value="1" class="flat">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="kb">Program KB</label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <input type="checkbox" name="kb[]" id="kb" value="1" class="flat">
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
                            <div class="ln_solid"></div>
                    <!-- page content -->
                        <div class="x_title">
                          <h2>Tabel Data Absensi Bumil</h2>
                          <div class="clearfix"></div>
                        </div>
                            <?php if (session()->getFlashdata('hapus')) : ?>
                                <script>
                                    Swal.fire({
                                        title: "Sukses!",
                                        text: "Data absen bumil berhasil dihapus.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "<?= base_url('absenbumil'); ?>";
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
                                <th>Nama Bumil</th>
                                <th>Nama Suami</th>
                                <th>Kesbumil</th>
                                <th>Program KB</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                              <?php foreach($absenbumil as $absen) : ?>
                                <tr>
                                  <th scope="row"><?= $i++; ?></th>
                                  <td><?= $absen->tglagenda; ?></td>
                                  <td><?= $absen->ibunama; ?></td>
                                  <td><?= $absen->ayahnama; ?></td>
                                  <td>
                                  <?php
                                    if ($absen->kesbumil == "1") {
                                        echo "Hadir";
                                    } else{
                                        echo "Tidak Hadir";
                                    }
                                  ?>
                                  </td>
                                  <td>
                                  <?php
                                    if ($absen->kb == "1") {
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

                    <!-- Modal Data Bumil -->
                    <div class="modal fade bs-example-modal-lg" id="DataBumilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Daftar Data Bumil</h5>
                                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> -->
                                    </div>
                                    <div class="modal-body">
                                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Bumil</th>
                                                    <th>Nama Suami</th>
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
                                                        <td>
                                                        <button id="pilihBumil" type="button" data-idbumil="<?= $bu->idbumil; ?>" data-ibunama="<?= $bu->ibunama; ?>" data-ayahnama="<?= $bu->ayahnama; ?>" class="btnSelectBumil btn btn-primary btn-sm">Pilih</button>
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
        $(document).on('click', '#pilihBumil', function(){
            ibunama = $(this).data('ibunama')
            idbumil = $(this).data('idbumil')
            ayahnama = $(this).data('ayahnama')
            
            $("#ibunama").val(ibunama)
            $("#idbumil").val(idbumil)
            $("#ayahnama").val(ayahnama)

            $('#DataBumilModal').modal('hide')
        })

        $(document).on('click', '#simpan', function(){

        // Tangkap nilai dari checkbox
            // var timbang = document.getElementById('timbang').checked ? 0 : 1;
            // var imun = document.getElementById('imun').checked ? 0 : 1;

        var data = {
          idbumil: $("#idbumil").val(),
          idagenda: $("#idagenda").val(),
          tglagenda: $("#tglagenda").val(),
          kesbumil: $("[name='kesbumil[]']:checked").val(),
          kb: $("[name='kb[]']:checked").val(),
        };

        var url = '/absenbumil/save';

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
                text: "Data absensi bumil berhasil disimpan.",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "<?= base_url('absenbumil'); ?>";
                }
            });
        }
    </script>
 <!-- /page content -->
<?= $this->endSection() ?>
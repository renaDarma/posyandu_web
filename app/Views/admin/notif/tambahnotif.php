<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

    <!-- page content -->  
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>
            </div>

        <div class="clearfix"></div>
        <?php if(session()->getFlashdata('error')) : ?>
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-file-excel"></i>
                    <?= session()->getFlashdata('error'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="col-md-12 ">
	        <div class="x_panel">
				<div class="x_title">
					<h2>Form Tambah Data Imunisasi</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br>
					<form class="form-horizontal form-label-left" action="/notif/save" method="post" enctype="multipart/form-data">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="usia">Usia</label>
                                <div class="col-md-6 col-sm-6">
                                    <input type=number step=any id="usia" name="usia" class="form-control" readonly>
                                </div>
                                <label class="col-form-label label-align" for="usia">bulan</label>
                                </div>
                            </div>
                            <div class="form-group row ">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Imunisasi
                                </label>
                                <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="idJenImun" id="namaimun">
                                    <option value = "" disabled selected>-- Silahkan Pilih Imunisasi --</option>
                                <?php foreach($jenisimun as $mun): ?>
                                    <option value="<?= $mun['idJenImun'] ?>"><?= $mun['namaimun'] ?> </option>
                                <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namaimun'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="/datanotif" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
					</form>    
				</div>
			</div>
		</div>
        </div>
    </div>

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
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            // Define $currentPage
                                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                                            ?>
                                            <tbody>
                                                <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                                <?php foreach($anak as $nak) : ?>
                                                    <tr>
                                                        <th scope="row"><?= $i++; ?></th>
                                                        <td><?= $nak['anaknama']; ?></td>
                                                        <td><?= $nak['jk']; ?></td>
                                                        <td><?= $nak['tgllhr']; ?></td>
                                                        
                                                        <td>
                                                        <button id="pilihAnak" type="button" data-idanak="<?= $nak['idanak']; ?>" data-anaknama="<?= $nak['anaknama']; ?>" data-jk="<?= $nak['jk']; ?>" data-tgllhr="<?= $nak['tgllhr']; ?>" class="btnSelectAnak btn btn-primary btn-sm">Pilih</button>
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

    <!-- ?<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        $(document).on('click', '#pilihAnak', function(){
            console.log('aa');
            anaknama = $(this).data('anaknama')
            idanak = $(this).data('idanak')
            
            jk = $(this).data('jk')
            tgllhr = $(this).data('tgllhr')
            
            
            $("#anaknama").val(anaknama)
            $("#idanak").val(idanak)
            
            $("#jk").val(jk)
            $("#tgllhr").val(tgllhr)
            

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
                
    </script>
 <!-- /page content -->
<?= $this->endSection() ?>						
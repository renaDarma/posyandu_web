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
					<h2>Form Tambah Data User</h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"></li>
					</ul>
						<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form class="form-horizontal form-label-left" action="/user/save" method="post" enctype="multipart/form-data">
                        <?= csrf_field(); ?>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Username</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Email</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row"><!-- bisa lihat password dan dihidden -->
							<label class="control-label col-md-3 col-sm-3 ">Password</label>
							<div class="col-md-9 col-sm-9 "> 
								<input type="password" class="form-control" name="password_hash" placeholder="Password">
							</div>
						</div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">Nama User</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="fullname" placeholder="Nama User">
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label class="control-label col-md-3 col-sm-3 ">No HP User</label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" class="form-control" name="usernohp" placeholder="No HP User">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="control-label col-md-3 col-sm-3 ">Level User</label>
                            <div class="col-md-9 col-sm-9 " name="name">
                                <select class="form-control" name="name" id="name">
                                    <option value="Admin">Admin</option>
                                    <option value="Kader">Kader</option>
                                    <option value="Masyarakat">Masyarakat</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <div class="col-md-9 col-sm-9  offset-md-3"> -->
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="/datauser" class="btn btn-primary">Kembali</a>
                            <!-- </div> -->
                        </div>
					</form>    
				</div>
			</div>
		</div>
    </div>
</div>
	<!-- /page content -->
<?= $this->endSection() ?>								
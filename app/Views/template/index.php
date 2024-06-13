<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title; ?> | SIP Silir</title>   

    <!-- Bootstrap -->
    <link href="<?= base_url('admin')?>/cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?= base_url('admin')?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= base_url('admin')?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= base_url('admin')?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?= base_url('admin')?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?= base_url('admin')?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?= base_url('admin')?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('admin')?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('admin')?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('admin')?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('admin')?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?= base_url('admin')?>/build/css/custom.min.css" rel="stylesheet">
    <!--Chartist Chart CSS -->
    <link rel="stylesheet" href="<?= base_url('admin')?>/assets/chartist.min.css">

    <!--Morris Chart CSS -->
    <!-- <link rel="stylesheet" href="<?= base_url('admin')?>assets/morris.css"> -->
     
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
  </head>
  <?php $session = session(); ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="<?= base_url('awal')?>/assets/img/favicons/icon2.png"> <span>SIP SILIR</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <!-- <div class="profile_pic">
                <img src="<?= base_url('admin')?>/production/images/mini.png" alt="<?= base_url('admin')?>." class="img-circle profile_img">
              </div> -->
              <div class="text-white">
              <center>
                <h2><b>Selamat Datang,</b></h2>
                <h2><?= $session->get('fullname'); ?></h2><br>
                <h5 id="tanggal"></h5>
                <h5 id="waktu"></h5>
                <script>
                  function updateTime() {
                    var dt = new Date();
                    var tanggal = dt.toLocaleDateString();
                    var waktu = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', second: '2-digit' });
                    document.getElementById("tanggal").innerHTML = tanggal;
                    document.getElementById("waktu").innerHTML = waktu;
                  }

                  // Update waktu setiap detik
                  setInterval(updateTime, 1000);
                </script>
              </center>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <?= $this->include('template/sidebar'); ?>

            <!-- /menu footer buttons -->
            <!-- HALMAN FOOTER ADMIN -->
            <?php if (session()->get('role') == 'admin') : ?>
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Data Bidan" href="/databidan">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Data Kader" href="/datakader">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Edit Profil" href="/profiledit/<?= $session->get('id'); ?>">
                <span href="/profiledit/<?= $session->get('id'); ?>" class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Log Out" href="<?php echo base_url('logout'); ?>/login/index">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>  
              <?php endif; ?>
            <!-- HALMAN FOOTER KADER -->
            <?php if (session()->get('role') == 'kader') : ?>
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Data Ortu" href="/dataortu">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Data Anak" href="/dataanak">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Edit Profil" href="/profil/<?= $session->get('id'); ?>">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Log Out" href="<?php echo base_url('logout'); ?>/login/index">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <?php endif; ?>
             <!-- HALMAN FOOTER MASYARAKAT -->
             <?php if (session()->get('role') == 'masyarakat') : ?>
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Riwayat Kes Bumil" href="/riwayatkesbumilku">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Riwayat Program KB" href="/riwayatkbku">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Riwayat Penimbangan" href="/riwayatpenimbanganku">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Riwayat Imunisasi" href="/riwayatimunanakku">
                <span class="glyphicon glyphicon-book" aria-hidden="true"></span>
              </a>
            </div>
            <?php endif; ?>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <?= $this->include('template/topbar'); ?>

        <?= $this->renderSection('content'); ?>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a>Sistem Informasi Posyandu | Desa Silir</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('admin')?>/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?= base_url('admin')?>/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url('admin')?>/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url('admin')?>/vendors/nprogress/nprogress.js"></script>
      <!-- iCheck -->
    <script src="<?= base_url('admin')?>/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?= base_url('admin')?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url('admin')?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- Chart.js -->
    <script src="<?= base_url('admin')?>/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= base_url('admin')?>/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- Flot -->
    <script src="<?= base_url('admin')?>/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url('admin')?>/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('admin')?>/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('admin')?>/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('admin')?>/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url('admin')?>/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url('admin')?>/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url('admin')?>/vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url('admin')?>/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url('admin')?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url('admin')?>/build/js/custom.min.js"></script>

        <!--Morris Chart-->
        <script src="<?= base_url('admin')?>/assets/morris.min.js"></script>
        <script src="<?= base_url('admin')?>/assets/raphael-min.js"></script>
        <script src="<?= base_url('admin')?>/assets/morris.init.js"></script>
    <!-- Sweetalert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
   
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      function previewImg() {
        const foto = document.querySelector('#foto');
        const fotoLabel = document.querySelector('.form-control');
        const imgPreview = document.querySelector('.img-preview');

        fotoLabel.textContent = foto.files[0].name;

        const fileFoto = new FileReader();
        fileFoto.readAsDataURL(foto.files[0]);

        fileFoto.onload = function(e) {
          imgPreview.src = e.target.result;
        }
      }
   </script>
    <script>
      $(document).ready(function () {
          $('#example-buttons').DataTable();
      } );
      </script>
      <script type="text/javascript">
          window.onload = function() { jam(); }
        
          function jam() {
          var e = document.getElementById('jam'),
          d = new Date(), h, m, s;
          h = d.getHours();
          m = set(d.getMinutes());
          s = set(d.getSeconds());
        
          e.innerHTML = h +':'+ m +':'+ s;
        
          setTimeout('jam()', 1000);
          }
        
          function set(e) {
          e = e < 10 ? '0'+ e : e;
          return e;
          }
      </script>
  </body>
</html>
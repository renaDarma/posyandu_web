<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>

        <!-- page content -->
      <?php if (session()->get('role') == 'admin') : ?>
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12">
              <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-user-md"></i></div>
                  <div class="count"><?= $jumlah_bidan ?></div>
                  <h3>Data Bidan</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                  <a class="btn btn-info" href="/databidan">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-medkit"></i></div>
                  <div class="count"><?= $jumlah_kader ?></div>
                  <h3>Data Kader</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                  <a class="btn btn-info" href="/datakader">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-calendar"></i></div>
                  <div class="count"><?= $jumlah_agenda ?></div>
                  <h3>Data Agenda</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                  <a class="btn btn-info" href="/dataagenda">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-female"></i></div>
                  <div class="count"><?= $jumlah_ortu ?></div>
                  <h3>Data Ortu Anak</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                  <a class="btn btn-info" href="/ortudata">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-child"></i></div>
                  <div class="count"><?= $jumlah_anak ?></div>
                  <h3>Data Anak</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                  <a class="btn btn-info" href="/anakdata">Lihat data</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php endif; ?>

          <?php if (session()->get('role') == 'kader') : ?>
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12">
            <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-family"></i></div>
                  <div class="count"><?= $jumlah_ortu ?></div>
                  <h3>Data Ortu Anak</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                    <a class="btn btn-info" href="/dataortu">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-child"></i></div>
                  <div class="count"><?= $jumlah_anak ?></div>
                  <h3>Data Anak</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                    <a class="btn btn-info" href="/dataanak">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-calendar"></i></div>
                  <div class="count"><?= $jumlah_agenda ?></div>
                  <h3>Data Agenda</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                    <a class="btn btn-info" href="/agendadata">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-bar-chart"></i></div>
                  <div class="count"><?= $jumlah_timbang ?></div>
                  <h3>Data Penimbangan</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                    <a class="btn btn-info" href="/datapenimbanganak">Lihat data</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 ">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-eyedropper"></i></div>
                  <div class="count"><?= $jumlah_imun ?></div>
                  <h3>Data Imunisasi</h3><br>
                  <div class="col-lg-6 col-md-4 col-sm-2">
                    <a class="btn btn-info" href="/dataimunanak">Lihat data</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <?php endif; ?>

      <?php if (session()->get('role') == 'masyarakat') : ?>
        <div class="right_col" role="main">
          <div class="row">
              <div class="col-md-12">
                  <!-- <div class="col-md-4 col-sm-4 ">
                    <div class="tile-stats"><br>
                      <div class="icon"><i class="fa fa-calendar"></i></div>
                      <div class="count" id="tanggalwaktu"></div><br>
                      <script>
                        var dt = new Date();
                        document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
                      </script>
                    </div>
                  </div> -->
                  <div class="col-md-4 col-sm-4 ">
                    <div class="tile-stats"><br>
                      <div class="icon"><i class="fa fa-clock-o"></i></div>
                      <div class="count" id="jam"></div><br>
                      <script>
                        var dt = new Date();
                        document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
                      </script>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      <?php endif; ?>
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
<?= $this->endSection() ?>


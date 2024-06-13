<?php if (session()->get('role') == 'admin') : ?>
            <!-- sidebar menu admin-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/dashboard/ad"><i class="fa fa-home"></i> Beranda </a></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Menu Data</h3>
                <ul class="nav side-menu">
                  <li><a href="/datauser"><i class="fa fa-users"></i> Data User </a></li>
                  <li><a><i class="fa fa-cogs"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/databidan">Data Bidan</a></li>
                      <li><a href="/datakader">Data Kader</a></li>
                      <li><a href="/dataagenda">Data Agenda</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bell-o"></i> Notifikasi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="/datanotif">Data Imunisasi</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Data Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="/dataortu">Data Orang Tua</a></li>
                      <li><a href="/anakdata">Data Anak</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-stethoscope"></i> Layanan Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/penimbanganakdata">Penimbangan Anak</a></li>
                      <li><a href="/imunanakdata">Imunisasi Anak</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i> Laporan Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/komdatlaporan">Laporan Komdat</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <?php endif; ?>
             <!-- /sidebar menu admin-->
            <?php if (session()->get('role') == 'kader') : ?>
             <!-- sidebar menu kader-->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/dashboard/ka"><i class="fa fa-home"></i> Beranda </a></li></li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Menu Data</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-cogs"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/dataortu">Data Orang Tua</a></li>
                      <li><a href="/dataanak">Data Anak</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Data Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/agendadata">Data Agenda</a></li>
                      <li><a href="/absenanak">Daftar Hadir Anak</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-stethoscope"></i> Layanan Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/datapenimbanganak">Penimbangan Anak</a></li>
                      <li><a href="/dataimunanak">Imunisasi Anak</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-file-text"></i> Laporan Posyandu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/laporankomdat">Laporan Komdat</a></li>
                  </li>
                </ul>
              </div>
            </div>
              <?php endif; ?>
               <!-- /sidebar menu kader-->
          
               
<?php  
  helper('usia_helper');
  $dataBumilTopBar = dataBumilTopBar();
  // $dataKbBumilKbTopBar = dataKbBumilKbTopBar();
  $dataAnakTopBar = dataAnakTopBar();
  // $dataAnakTimbangTopBar = dataAnakTimbangTopBar();
  $bumilhpl = bumilhpl();
  $data = dataNotifAnakImunisasi();
  $dataCount = dataNotifAnakImunisasiCount();
  // dd($data);
?>
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class="navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <span href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" 
                      aria-expanded="false"><b><?= session()->get('username'); ?> (<?= session()->get('fullname'); ?>)</b>
                    </span>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <?php if (session()->get('role') == 'admin') : ?>  
                      <a class="dropdown-item" href="/profil/<?= session()->get('id'); ?>"><i class="fa fa-user pull-right"></i>Edit Profil</a>
                    <?php endif; ?>
                    <?php if (session()->get('role') == 'kader') : ?>  
                      <a class="dropdown-item" href="/profiledit/<?= session()->get('id'); ?>"><i class="fa fa-user pull-right"></i>Edit Profil</a>
                    <?php endif; ?>
                    <?php if (session()->get('role') == 'masyarakat') : ?>  
                      <a class="dropdown-item" href="/profilku/<?= session()->get('id'); ?>"><i class="fa fa-user pull-right"></i>Edit Profil</a>
                    <?php endif; ?>
                        <!-- <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a> -->
                      <a class="dropdown-item" href="<?php echo base_url('logout') ?>/login/index"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                  <?php if (session()->get('role') == 'kader') : ?>
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bell-o"></i>
                      <span class="badge bg-green"><?= count($dataCount) ?></span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1" x-placement="bottom-start" style="position: absolute; transform: translate3d(-139px, 16px, 0px); top: 0px; left: 0px; will-change: transform;">

                      <?php foreach ($data as $no => $value): ?>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="message">
                              <?= $value->anaknama ?> bulan ini imunisasi <?= $value->namaImun ?>
                          </span>
                        </a>
                      </li>
                      <?php endforeach ?>
                      <li class="nav-item">
                          <a class="dropdown-item" href="/datanotif">View All</a>
                      </li>
                      <!-- <?php foreach ($dataAnakTopBar as $no => $value): ?>
                      <li class="nav-item"->
                        <a class="dropdown-item">
                          <span class="message">
                            Balita <?= $value->anaknama ?> Belum mengikuti pertemuan posyandu balita
                          </span>
                        </a>
                      </li>
                      <?php endforeach ?> -->
                    </ul>
                  </li>
                  <!-- <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green"><?= count($bumilhpl) ?></span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1" x-placement="bottom-start" style="position: absolute; transform: translate3d(-139px, 16px, 0px); top: 0px; left: 0px; will-change: transform;">
                      <?php if (!empty($bumilData)) : ?>
                        <?php foreach ($bumilData as $bumil) : ?>
                          <li class="nav-item">
                            <a class="dropdown-item">
                              <span class="message">
                                Bumil <?= $bumil->ibunama ?> Mencapai HPL (Hari Perkiraan Lahir) - Umur Kandungan: <?= $bumil->umurkandungan ?> Bulan
                              </span>
                            </a>
                          </li>
                        <?php endforeach ?>
                          <?php else : ?>
                            <li class="nav-item">
                              <a class="dropdown-item">
                                <span class="message">
                                  Tidak ada notifikasi kehamilan saat ini.
                                </span>
                              </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                  </li> -->
                  <?php endif; ?>
                  <?php if (session()->get('role') == 'admin') : ?>
                  <?php endif; ?>
                  <?php if (session()->get('role') == 'masyarakat') : ?>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

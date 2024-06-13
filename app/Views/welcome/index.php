<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title><?= $title; ?> | SIP SILIR</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('awal')?>/assets/img/favicons/icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('awal')?>/assets/img/favicons/mini.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('awal')?>/assets/img/favicons/mini.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('awal')?>/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="<?= base_url('awal')?>/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= base_url('awal')?>/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url('awal')?>/vendors/prism/prism.css" rel="stylesheet">
    <link href="<?= base_url('awal')?>/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="<?= base_url('awal')?>/assets/css/theme.css" rel="stylesheet" />
    <link href="<?= base_url('awal')?>/assets/css/user.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg fixed-top navbar-dark" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="index.html"><img src="<?= base_url('awal')?>/assets/img/icon.png" alt="" /><b>SIP SILIR<b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa-solid fa-bars text-white fs-3"></i></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
              <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url('/home/index') ?>">Beranda</a></li>
              <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="#beranda">Beranda</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#sip">SIP</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#fitur">Fitur</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#manfaat">Manfaat</a></li> -->
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#dok">Kegiatan</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#layanan">Layanan</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="#hubungi">Hubungi</a></li>
              <!-- <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url('/home/about') ?>">Tentang Posyandu</a></li>
              <li class="nav-item"><a class="nav-link" aria-current="page" href="<?php echo base_url('/home/blogs') ?>">Layanan Posyandu</a></li> -->
              <li class="nav-item mt-2 mt-lg-0"><a class="nav-link btn btn-light text-black w-md-25 w-50 w-lg-100" aria-current="page" href="<?php echo base_url('login') ?>">Log In</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="bg-dark"><img class="img-fluid position-absolute end-0" src="<?= base_url('awal')?>/assets/img/hero/hero-bg.png" alt="" />

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section id="beranda">

          <div class="container">
            <div class="row align-items-center py-lg-6 py-6">
              <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white fs-9 fs-xl-7">SELAMAT DATANG</h1><br>
                <h4 class="text-white fs-9 fs-xl-5">DI WEBSITE POSYANDU</h4>
                <h4 class="text-white fs-5 fs-xl-5">DESA SILIR</h4><br>
                <!-- <p class="text-white py-lg-3 py-2">Layanan Kesehatan Ibu dan Anak</p> -->
                <div class="d-sm-flex align-items-center gap-3">
                  <button class="btn btn-success text-black mb-3 w-50"><a href="<?php echo base_url('login') ?>"><h5>Sign In</h5></a></button>
                  <!-- <button class="btn btn-outline-light mb-3 w-75"><a href="<?php echo base_url('register') ?>"><h5>Sign Up</h5></a></button> -->
                </div>
              </div>
              <div class="col-lg-6 text-center text-lg-end mt-3 mt-lg-0"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/hero/pos.png" alt="" /></div>
            </div>
            <div class="swiper">
              <div class="swiper-container swiper-shadow swiper-theme" data-swiper='{"slidesPerView":2,"breakpoints":{"640":{"slidesPerView":2,"spaceBetween":20},"768":{"slidesPerView":4,"spaceBetween":40},"992":{"slidesPerView":5,"spaceBetween":40},"1024":{"slidesPerView":4,"spaceBetween":50},"1025":{"slidesPerView":6,"spaceBetween":50}},"spaceBetween":10,"grabCursor":true,"pagination":{"el":".swiper-pagination","clickable":true},"loop":true,"freeMode":true,"autoplay":{"delay":2500,"disableOnInteraction":false}}'>
                <div class="swiper-wrapper">
                  <div class="swiper-slide text-center"><img src="<?= base_url('awal')?>/assets/img/desa.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="<?= base_url('awal')?>/assets/img/pos.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="<?= base_url('awal')?>/assets/img/desa.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="<?= base_url('awal')?>/assets/img/pos.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="<?= base_url('awal')?>/assets/img/desa.png" alt="" /></div>
                  <div class="swiper-slide text-center"><img src="<?= base_url('awal')?>/assets/img/pos.png" alt="" /></div>
                </div>
              </div>
            </div>
          </div>
          <!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


      </div>


       <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="sip" class="sip">

        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/si.png" alt="" /></div>
            <div class="col-lg-6">
              <h1 class="fs-xl-4 fs-lg-3 fs-3">Posyandu (Pos Pelayanan Terpadu)</h1>
              <h4 class="fs-xl-2 fs-lg-3 fs-2">Posyandu adalah sebuah program pelayanan kesehatan masyarakat di Indonesia.</h4>
              <h5 class="fs-xl-2 fs-lg-2 fs-2">Tujuannya:</h5>
              <ul class="list-unstyled my-xl-3 my-3">
                <li class="fs-2 my-3 d-flex align-items-center gap-3 text-black"><i class="fa-solid fa-circle-check fs-3 text-dark"></i><span>Memberikan pelayanan kesehatan dasar kepada ibu hamil, bayi, balita, dan anak-anak usia dini.</span></li>
                <li class="fs-2 my-3 d-flex align-items-center gap-3 text-black"><i class="fa-solid fa-circle-check fs-3 text-dark"></i><span>Meningkatkan pemantauan pertumbuhan dan perkembangan anak secara rutin.</span></li>
                <li class="fs-2 my-3 d-flex align-items-center gap-3 text-black"><i class="fa-solid fa-circle-check fs-3 text-dark"></i><span>Memberikan imunisasi dan vaksinasi yang sesuai dengan jadwal.</span></li>
                <li class="fs-2 my-3 d-flex align-items-center gap-3 text-black"><i class="fa-solid fa-circle-check fs-3 text-dark"></i><span>Menyediakan informasi dan edukasi tentang gizi dan kesehatan kepada masyarakat.</span></li>
              </ul>
              <a class="btn btn-dark" href="#layanan">Layanan Posyandu</a>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
    <main id="main">
      <!-- <section id="fitur" class="fitur"> 

        <div class="container">
          <p class="text-center fs-4">Fitur SIP Silir</p>
          <h2 class="mx-auto text-center fs-lg-4 fs-md-3 w-lg-75">Beberapa Fitur Sistem Informasi Posyandu Desa Silir</h2>
          <div class="row gx-xl-7 mt-5">
            <div class="col-md-4 mb-6 mb-md-0 text-center text-md-start"><img class="w-50 w-md-100" src="<?= base_url('awal')?>/assets/img/md.png" alt="" />
              <h4 class="mt-3 my-1">Manajemen Data Master</h4>
            </div>
            <div class="col-md-4 mb-6 mb-md-0 text-center text-md-start"><img class="w-50 w-md-100" src="<?= base_url('awal')?>/assets/img/dp.png" alt="" />
              <h4 class="mt-3 my-1">Manajemen Data Anggota Posyandu</h4>
            </div>
            <div class="col-md-4 mb-6 mb-md-0 text-center text-md-start"><img class="w-50 w-md-100" src="<?= base_url('awal')?>/assets/img/mw.png" alt="" />
              <h4 class="mt-3 my-1">Manajemen Kegiatan Posyandu</h4>
            </div>
            <div class="col-md-4 mb-6 mb-md-0 text-center text-md-start"><img class="w-50 w-md-100" src="<?= base_url('awal')?>/assets/img/services/3.png" alt="" />
              <h4 class="mt-3 my-1">Monitoring Tumbuh Kembang Anak</h4>
            </div>
            <div class="col-md-4 mb-6 mb-md-0 text-center text-md-start"><img class="w-50 w-md-100" src="<?= base_url('awal')?>/assets/img/services/3.png" alt="" />
              <h4 class="mt-3 my-1">Monitoring Kesehatan Ibu Hamil</h4>
            </div>
            <div class="col-md-4 mb-6 mb-md-0 text-center text-md-start"><img class="w-50 w-md-100" src="<?= base_url('awal')?>/assets/img/services/3.png" alt="" />
              <h4 class="mt-3 my-1">Pelaporan dan Perekapan Data</h4>
            </div>
          </div>
        </div>

      </section> -->
      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-8 pt-lg-0" id="manfaat">

        <div class="container">
          <div class="d-flex flex-column-reverse flex-lg-row">
            <div class="col-lg-7">
              <h1 class="fs-lg-3 fs-md-3 fs-xl-4 mb-4">Manfaat Posyandu</h1>
              <ul class="list-unstyled">
                <!-- <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-shield-virus fs-lg-2 fs-1"></i><span>Mendukung perilaku hidup bersih dan sehat</span></li> -->
                <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-square-plus fs-lg-2 fs-1"></i><span>Mendukung pemberdayaan keluarga dan masyarakat</span></li>
                <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-users fs-lg-2 fs-1"></i><span>Mendukung pelayanan Keluarga Berencana</span></li>
                <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-eye-dropper fs-lg-2 fs-1"></i><span>Pencegahan penyakit dengan imunisasi</span></li>
                <!-- <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-leaf fs-lg-2 fs-1"></i><span>Pencegahan penyakit yang berbasis lingkungan</span></li> -->
                <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-suitcase-medical fs-lg-2 fs-1"></i><span>Perbaikan perilaku, keadaan gizi dan kesehatan keluarga</span></li>
                <li class="fs-2 shadow-sm offer-list-item"><i class="fa-solid fa-person-breastfeeding fs-lg-2 fs-1"></i><span>Pusat informasi dan konseling dalam perlindungan anak</span></li>
              </ul>
            </div>
            <div class="col-lg-5 text-center text-lg-end"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/mp.png" alt="" /></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-dark pt-6" id="dok">

        <div class="container">
          <div class="col-md-6">
            <h1 class="text-white fs-lg-5 fs-md-3 fs-2">Dokumentasi Kegiatan Posyandu Desa Silir</h1>
          </div>
          <div class="swiper mt-7">
            <div class="swiper-container swiper-theme" data-swiper='{"slidesPerView":1,"breakpoints":{"640":{"slidesPerView":1,"spaceBetween":10},"768":{"slidesPerView":2,"spaceBetween":20},"1025":{"slidesPerView":3,"spaceBetween":40}},"spaceBetween":10,"grabCursor":true,"pagination":{"el":".swiper-pagination","clickable":true},"navigation":{"nextEl":".swiper-button-next","prevEl":".swiper-button-prev"},"loop":true,"freeMode":true,"loopedSlides":3}'>
              <div class="swiper-wrapper">
                <div class="swiper-slide bg-white p-5 rounded-3 h-auto">
                  <div class="d-flex flex-column justify-content-between h-100"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/timbang.jpg" alt="" /><br>
                    <p class="text-black">Penimbangan Anak</p>
                  </div>
                </div>
                <div class="swiper-slide bg-white p-5 rounded-3 h-auto">
                  <div class="d-flex flex-column justify-content-between h-100"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/imun.jpg" alt="" />
                    <p class="text-black">Imunisasi Anak</p>
                  </div>
                </div>
                <div class="swiper-slide bg-white p-5 rounded-3 h-auto">
                  <div class="d-flex flex-column justify-content-between h-100"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/kesbumil.jpg" alt="" />
                    <p class="text-black">Monitoring Kesehatan Ibu Hamil</p>
                  </div>
                </div>
                <!-- <div class="swiper-slide bg-white p-5 rounded-3 h-auto">
                  <div class="d-flex flex-column justify-content-between h-100"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/offer/2.png" alt="" />
                    <p class="text-black">Program Keluarga Berencana</p>
                  </div>
                </div> -->
                <!-- <div class="swiper-slide bg-white p-5 rounded-3 h-auto">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <h4 class="text-black">“Buyer buzz partner network disruptive non-disclosure agreement business”</h4>
                    <div class="d-flex align-items-center gap-3 mt-5"><img src="<?= base_url('awal')?>/assets/img/review/1.png" alt="" />
                      <div class="text-black">
                        <p class="mb-0 fw-bold text-dark">Albus Dumbledore</p><small>Manager @ Howarts</small>
                      </div>
                    </div>
                  </div>
                </div> -->
              </div>
            </div>
            <div class="swiper-button-next"><span class="fas fa-arrow-right fs-lg-3 fs-2"></span></div>
            <div class="swiper-button-prev"><span class="fas fa-arrow-left fs-lg-3 fs-2"></span></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section id="layanan">

      <div class="container"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/keg.jpg" alt="" />
          <div class="row mt-5 align-items-center">
            <div class="col-md-6">
              <h2 class="fs-md-4 fs-3 pt-3">Layanan yang tersedia di Posyandu Desa Silir</h2>
            </div>
            <div class="col-md-6">
              <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item"></div>
                <h2 class="accordion-header border-bottom" id="sxvdgrfhfh276">
                  <button class="accordion-button collapsed text-black" type="button" data-bs-toggle="collapse" data-bs-target="#srgdgfdgdgg45tyuu5ghj" aria-expanded="false" aria-controls="sxvdgrfhfh276"><span class="fs-1 pe-3">Posyandu Balita</span></button>
                </h2>
                <div class="accordion-collapse collapse" aria-labelledby="sxvdgrfhfh276" data-bs-parent="#accordionFlushExample" id="srgdgfdgdgg45tyuu5ghj">
                  <div class="accordion-body">
                    <p class="mb-0">Posyandu Balita adalah layanan kesehatan untuk anak balita (0-5 tahun) yang memantau tumbuh kembang dan kesehatan mereka.</p>
                  </div>
                </div>
                <div class="accordion-item"></div>
                <h2 class="accordion-header border-bottom" id="sxvdgrfhfh276">
                  <button class="accordion-button collapsed text-black" type="button" data-bs-toggle="collapse" data-bs-target="#srgdgfdgdgg45tyuu5ghj" aria-expanded="false" aria-controls="sxvdgrfhfh276"><span class="fs-1 pe-3">Poyandu Ibu Hamil</span></button>
                </h2>
                <div class="accordion-collapse collapse" aria-labelledby="sxvdgrfhfh276" data-bs-parent="#accordionFlushExample" id="srgdgfdgdgg45tyuu5ghj">
                  <div class="accordion-body">
                    <p class="mb-0">Posyandu Ibu Hamil adalah program kesehatan untuk ibu hamil yang memberikan pemeriksaan, informasi, dan dukungan selama masa kehamilan.</p><br>
                    <!-- <a href="<?php echo base_url('/home/daftarbumil') ?>" class="btn btn-dark">Daftar</a> -->
                  </div>
                </div>
                <div class="accordion-item"></div>
                <h2 class="accordion-header border-bottom" id="sxvdgrfhfh276">
                  <button class="accordion-button collapsed text-black" type="button" data-bs-toggle="collapse" data-bs-target="#srgdgfdgdgg45tyuu5ghj" aria-expanded="false" aria-controls="sxvdgrfhfh276"><span class="fs-1 pe-3">Program Keluarga Berencana (KB)</span></button>
                </h2>
                <div class="accordion-collapse collapse" aria-labelledby="sxvdgrfhfh276" data-bs-parent="#accordionFlushExample" id="srgdgfdgdgg45tyuu5ghj">
                  <div class="accordion-body">
                    <p class="mb-0">Program KB adalah program yang membantu pasangan suami istri dalam pengendalian kelahiran melalui konseling dan penyediaan alat kontrasepsi.</p><br>
                    <!-- <a href="<?php echo base_url('/home/daftarkb') ?>" class="btn btn-dark">Daftar</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

    

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pb-0" id="hubungi">

        <div class="container">
          <p class="text-center text-gray fs-4">Hubungi Kami</p>
          <h2 class="mx-auto text-center fs-lg-4 fs-md-3 w-lg-75">Informasi kontak dan lokasi Posyandu Desa Silir</h2>
          <div class="row mt-7 gx-xl-7">
            <div class="col-md-4 text-center text-md-start h-auto mb-5">
              <div class="d-flex justify-content-between flex-column h-100"><a href="#"><img class="w-75 w-md-100 rounded-2" src="<?= base_url('awal')?>/assets/img/email.png" alt="" /></a>
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a href="#">
                    <!-- <p class="fw-bold mb-0 text-black">E-mail</p> -->
                  </a>
                  <p class="mb-0">E-mail</p>
                </div><a href="#">
                  <h5 class="mt-1 mb-3 fs-0 fs-md-1">posyandusilir@gmail.com</h5>
                </a>
              </div>
            </div>
            <div class="col-md-4 text-center text-md-start h-auto mb-5">
              <div class="d-flex justify-content-between flex-column h-100"><a href="#"><img class="w-75 w-md-100 rounded-2" src="<?= base_url('awal')?>/assets/img/maps.png" alt="" /></a>
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a href="#">
                    <!-- <p class="fw-bold mb-0 text-black">Lokasi</p> -->
                  </a>
                  <p class="mb-0">Alamat</p>
                </div><a href="#">
                  <h5 class="mt-1 mb-3 fs-0 fs-md-1">Jl.Makumambang, Silir, Wates, Kediri, Jawa Timur, Indonesia 64181</h5>
                </a>
              </div>
            </div>
            <div class="col-md-4 text-center text-md-start h-auto mb-5">
              <div class="d-flex justify-content-between flex-column h-100"><a href="#"><img class="w-75 w-md-100 rounded-2" src="<?= base_url('awal')?>/assets/img/call.png" alt="" /></a>
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a href="#">
                    <!-- <p class="fw-bold mb-0 text-black">Nomor Telepon</p> -->
                  </a>
                  <p class="mb-0">Nomor Telepon</p>
                </div><a href="#">
                  <h5 class="mt-1 mb-3 fs-0 fs-md-1">Telp : 0819-1116-2972</h5>
                </a>
              </div>
            </div>
            <!-- <div class="col-md-4 text-center text-md-start h-auto mb-5">
              <div class="d-flex justify-content-between flex-column h-100"><a href="#"><img class="w-75 w-md-100 rounded-2" src="<?= base_url('awal')?>/assets/img/blog/3.png" alt="" /></a>
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-2 mt-3"><a href="#">
                    <p class="fw-bold mb-0 text-black">Category</p>
                  </a>
                  <p class="mb-0">November 22, 2021</p>
                </div><a href="#">
                  <h5 class="mt-1 mb-3 fs-0 fs-md-1">Beta prototype sales iPad gen-z marketing network effects value proposition</h5>
                </a>
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3"><img class="img-fluid" src="<?= base_url('awal')?>/assets/img/blog/profile3.png" alt="" /><a href="#">
                    <p class="mb-0 text-gray">Monica Geller</p>
                  </a></div>
              </div>
            </div> -->
          </div>
          <div class="text-center mb-3">
            <a class="btn btn-outline-dark" href="https://linktr.ee/posyandugempolan?utm_source=linktree_admin_share">Lebih banyak</a>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-0" id="lokasi">

      <div class="container bg-dark overflow-hidden rounded-1">
        <div class="bg-holder" style="background-image:url(assets/img/promo/promo-bg.png);">
        </div>
        <!--/.bg-holder-->

        <div class="px-5 py-7 position-relative">
          <h1 class="text-center w-lg-30 mx-auto fs-lg-4 fs-md-2 fs-2 text-white">Lokasi</h1>
          <div class="row justify-content-center mt-5">
            <iframe class="mb-4 mb-lg-0"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.900513854957!2d112.09635707433885!3d-7.800356677428447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e785976fd10e5f3%3A0xc0fc06e40ed0aa77!2sKantor%20Kepala%20Desa%20Gempolan!5e0!3m2!1sid!2sid!4v1685125403901!5m2!1sid!2sid" 
              width="550" height="530" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade" frameborder="0"
              style="border:0; width: 100%; height: 390px;" allowfullscreen>
            </iframe>
          </div>
        </div>

        <!-- <div class="px-5 py-7 position-relative">
          <h1 class="text-center w-lg-75 mx-auto fs-lg-6 fs-md-4 fs-3 text-white">An enterprise template to ramp up your company website</h1>
          <div class="row justify-content-center mt-5">
            <div class="col-auto w-100 w-lg-50">
              <input class="form-control mb-2 border-light fs-1" type="email" placeholder="Your email address" />
            </div>
            <div class="col-auto mt-2 mt-lg-0">
              <button class="btn btn-success text-dark fs-1">Start now</button>
            </div>
          </div>
        </div> -->
      </div>
      <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pt-0">

      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-sm-12"><a href="index.html"><img src="<?= base_url('awal')?>/assets/img/icon3.png" alt="" /></a>
            <p class="w-lg-75 text-gray">Sehat dan cerdas bersama Posyandu Desa Silir. Generasi kuat, desa sejahtera!</p>
          </div>
          <div class="col-lg-4 col-sm-6">
            <h3 class="fw-bold fs-1 mt-5 mb-4">Informasi Posyandu</h3>
            <ul class="list-unstyled">
              <li class="my-3 col-md-4"><a href="#sip"><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">O</span>Definisi</a></li>
              <li class="my-3"><a href="#hubungi"><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">O</span>Hubungi</a></li>
              <li class="my-3"><a href="#lokasi"><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">O</span>Lokasi</a></li>
             
            </ul>
          </div>
          <div class="col-lg-3 col-sm-4">
            <h3 class="fw-bold fs-1 mt-5 mb-4">Informasi Posyandu</h3>
            <ul class="list-unstyled">
              <li class="my-3"><a href="#manfaat"><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">O</span>Manfaat</a></li>
              <li class="my-3"><a href="#dok"><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">O</span>Kegiatan</a></li>
              <!-- <li class="my-3"><a href="#dok">Kegiatan</a><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">Hiring!</span></li> -->
              <li class="my-3"><a href="#layanan"><span class="py-1 px-2 rounded-2 bg-success fw-bold text-dark ms-2">O</span>Layanan</a></li>
            </ul>
          </div>
          <!-- <div class="col-lg-2 col-sm-4">
            <h3 class="fw-bold fs-1 mt-5 mb-4">Pendaftaran</h3>
            <ul class="list-unstyled">
              <li class="mb-3"><a href="#">Balita</a></li>
              <li class="mb-3"><a href="#">Ibu Hamil</a></li>
              <li class="mb-3"><a href="#">KB</a></li>
            </ul>
          </div> -->
        </div>
        <p class="text-gray">SIP-SILIR</p>
      </div>
      <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?= base_url('awal')?>/vendors/popper/popper.min.js"></script>
    <script src="<?= base_url('awal')?>/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?= base_url('awal')?>/vendors/anchorjs/anchor.min.js"></script>
    <script src="<?= base_url('awal')?>/vendors/is/is.min.js"></script>
    <script src="<?= base_url('awal')?>/vendors/fontawesome/all.min.js"></script>
    <script src="<?= base_url('awal')?>/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="<?= base_url('awal')?>/vendors/prism/prism.js"></script>
    <script src="<?= base_url('awal')?>/vendors/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('awal')?>/assets/js/theme.js"></script>

  </body>

</html>
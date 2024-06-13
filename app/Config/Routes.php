<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// =====HALAMAN AWAL====L //
// $routes->get('/', 'Home::index');
// $routes->get('/home/index', 'Home::index');
// $routes->get('/', 'Login::index');
// $routes->get('/login/index', 'Login::index');
// // $routes->get('/home/about', 'Home::about');
// // $routes->get('/home/blogs', 'Home::blogs');
// // =====DAFTAR IBU HAMI==== //
// $routes->get('/home/daftarbumil', 'Home::daftarbumil');
// $routes->post('/home/daftarbumil/submitbumil', 'Home::submitbumil');
// // ====DAFTAR KB===== //
// $routes->get('/home/daftarkb', 'Home::daftarkb');
// $routes->post('/home/daftarkb/submitkb', 'Home::submitkb');
// =====LOGIN DAN LOGOUT====L //
$routes->get('/', 'Login::index');
$routes->post('/login_action', 'Login::store');
$routes->get('/login_user', 'Login::login_user');
$routes->post('/login_action_user', 'Login::login_action');
$routes->get('/register', 'Login::register');
$routes->post('/register_action', 'Login::register_action');
// $routes->post('/postlogin', 'Login::store');
$routes->get('logout/login/index', 'Login::index');

// ===========ADMIN================================================================== //
$routes->get('/admin', 'Admin::index');
$routes->get('/index.php', 'Admin::dashboard');
$routes->get('/dashboard/ad', 'Admin::index');
// ========PROFIL ADMIN========= //
$routes->get('/profil/(:any)', 'Profil::lihat/$1');
$routes->post('/profil/editprofil', 'Profil::edit_proadmin');
// ========RESET PASSWORD ADMIN========= //
$routes->get('/resetpass/(:any)', 'Resetpass::index/$1');
// ======DATA USER============= //
$routes->get('/datauser', 'Admin::datauser');
$routes->get('/tambahuser', 'Admin::tambahuser');
$routes->post('/user/save', 'Admin::save');
$routes->get('/detailuser/(:num)', 'Admin::detailuser/$1');
$routes->get('/edituser/(:num)', 'Admin::edituser/$1');
$routes->post('/user/update/(:num)', 'Admin::update/$1');
$routes->delete('/hapususer/(:num)', 'Admin::hapususer/$1');
// =======DATA BIDAN=========== //
$routes->get('/databidan', 'Bidan::index');
$routes->get('/tambahbidan', 'Bidan::tambahbidan');
$routes->post('/bidan/save', 'Bidan::save');
$routes->get('/detailbidan/(:any)', 'Bidan::detailbidan/$1');
$routes->get('/editbidan/(:num)', 'Bidan::editbidan/$1');
$routes->post('/bidan/update/(:num)', 'Bidan::update/$1');
$routes->delete('/hapusbidan/(:num)', 'Bidan::hapusbidan/$1');
$routes->get('/databidan/pdf', 'Bidan::pdf');
$routes->get('/databidan/excel', 'Bidan::excel');
// ======DATA KADER=========== //
$routes->get('/datakader', 'Kader::index');
$routes->get('/tambahkader', 'Kader::tambahkader');
$routes->post('/kader/save', 'Kader::save');
$routes->get('/detailkader/(:any)', 'Kader::detailkader/$1');
$routes->get('/editkader/(:any)', 'Kader::editkader/$1');
$routes->post('/kader/update/(:num)', 'Kader::update/$1');
$routes->delete('/hapuskader/(:num)', 'Kader::hapuskader/$1');
$routes->get('/datakader/pdf', 'Kader::pdf');
$routes->get('/datakader/excel', 'Kader::excel');
// =======DATA AGENDA======= //
$routes->get('/dataagenda', 'Agenda::index');
$routes->get('/tambahagenda', 'Agenda::tambahagenda');
$routes->post('/agenda/save', 'Agenda::save');
$routes->get('/detailagenda/(:num)', 'Agenda::detailagenda/$1');
$routes->get('/editagenda/(:num)', 'Agenda::editagenda/$1');
$routes->post('/agenda/update/(:num)', 'Agenda::update/$1');
$routes->delete('/hapusagenda/(:num)', 'Agenda::hapusagenda/$1');
$routes->get('/dataagenda/pdf', 'Agenda::pdf');
$routes->get('/dataagenda/excel', 'Agenda::excel');
// ===  DATA NOTIF === //
$routes->get('/datanotif', 'Notif::index');
$routes->get('/tambahnotif', 'Notif::tambahnotif');
$routes->post('/notif/save', 'Notif::save');
$routes->delete('/hapusnotif/(:num)', 'Notif::hapusnotif/$1');
// ==================  FITUR LIHAT ADMIN  ============================== //
// ===  DATA BUMIL === //
$routes->get('/bumildata', 'Bumil::index');
$routes->get('/bumildetail/(:num)', 'Bumil::detailbumil/$1');
$routes->get('/bumildata/pdf', 'Bumil::pdf');
$routes->get('/bumildata/excel', 'Bumil::excel');
// ===  DATA BUMIL MELAHIRKAN === //
$routes->get('/bumillahirdata', 'Bumil::lahir');
// ===  DATA ORANG TUA ANAK === //
$routes->get('/ortudata', 'Ortu::index');
$routes->get('/ortudetail/(:num)', 'Ortu::detailortu/$1');
$routes->get('/ortudata/pdf', 'Ortu::pdf');
$routes->get('/ortudata/excel', 'Ortu::excel');
// ===  DATA ANAK === //
$routes->get('/anakdata', 'Anak::index');
$routes->get('/anakdetail/(:num)', 'Anak::detailanak/$1');
$routes->get('/anakdata/pdf', 'Anak::pdf');
$routes->get('/anakdata/excel', 'Anak::excel');
// ======DATA KB====== //
$routes->get('/kbdata', 'Kb::index');
$routes->get('/kbdetail/(:num)', 'Kb::detailkb/$1');
$routes->get('/kbdata/pdf', 'Kb::pdf');
$routes->get('/kbdata/excel', 'Kb::excel');
// ======DATA KESBUMIL====== //
$routes->get('/kesbumildata', 'Kesbumil::index');
$routes->get('/kesbumildetail/(:any)', 'Kesbumil::detailkesbumil/$1');
$routes->get('/kesbumildata/pdf', 'Kesbumil::pdf');
$routes->get('/kesbumildata/excel', 'Kesbumil::excel');
// === DATA IMUNISASI ANAK === //
$routes->get('/imunanakdata', 'Imunisasi::index');
$routes->get('/imunanakdetail/(:num)', 'Imunisasi::detailimunanak/$1');
$routes->get('/imunanakdata/pdf', 'Imunisasi::pdf');
$routes->get('/imunanakdata/excel', 'Imunisasi::excel');
// === DATA PENIMBANGAN ANAK === //
$routes->get('/penimbanganakdata', 'Penimbangan::index');
$routes->get('/penimbanganakdetail/(:num)', 'Penimbangan::detailpenimbanganak/$1');
$routes->get('/penimbanganakdata/pdf', 'Penimbangan::pdf');
$routes->get('/penimbanganakdata/excel', 'Penimbangan::excel');
// === LAPORAN KOMDAT === //
$routes->get('/komdatlaporan', 'Laporankomdat::index');
$routes->get('/komdatlaporandetail/(:num)', 'Laporankomdat::detaillaporankomdat/$1');
$routes->get('/komdatlaporan/pdfall', 'Laporankomdat::pdfall');
$routes->get('/komdatlaporan/pdf/(:num)', 'Laporankomdat::pdf/$1');
$routes->post('/komdatlaporan/filter', 'Laporankomdat::filter');




// ==================================KADER========================== //
$routes->get('/kader', 'Kader::index');
$routes->get('/index.php', 'Admin::dashboard');
$routes->get('/dashboard/ka', 'Admin::index');
// ========PROFIL KADER========= //
$routes->get('/profiledit/(:any)', 'Profil::lihat/$1');
$routes->post('/profil/profiledit', 'Profil::edit_prokader');
// ========RESET PASSWORD KADER========= //
$routes->get('/passreset/(:any)', 'Resetpass::index');
// ===  DATA ORTU ANAK === //
$routes->get('/dataortu', 'Ortu::index');
$routes->get('/tambahortu', 'Ortu::tambahortu');
$routes->post('/ortu/save', 'Ortu::save');
$routes->get('/editortu/(:any)', 'Ortu::editortu/$1');
$routes->post('/ortu/update/(:num)', 'Ortu::update/$1');
$routes->delete('/hapusortu/(:num)', 'Ortu::hapusortu/$1');
$routes->get('/detailortu/(:any)', 'Ortu::detailortu/$1');
$routes->get('/dataortu/pdf', 'Ortu::pdf');
$routes->get('/dataortu/excel', 'Ortu::excel');
// ===  DATA BUMIL === //
$routes->get('/databumil', 'Bumil::index');
$routes->get('/tambahbumil', 'Bumil::tambahbumil');
$routes->post('/bumil/save', 'Bumil::save');
$routes->get('/detailbumil/(:any)', 'Bumil::detailbumil/$1');
$routes->get('/editbumil/(:any)', 'Bumil::editbumil/$1');
$routes->post('/bumil/update/(:num)', 'Bumil::update/$1');
$routes->delete('/hapusbumil/(:num)', 'Bumil::hapusbumil/$1');
$routes->get('/databumil/pdf', 'Bumil::pdf');
$routes->get('/databumil/excel', 'Bumil::excel');
// ===  DATA BUMIL MELAHIRKAN === //
$routes->get('/databumillahir', 'Bumil::lahir');
// ===  DATA ANAK === //
$routes->get('/dataanak', 'Anak::index');
$routes->get('/tambahanak', 'Anak::tambahanak');
$routes->post('/anak/save', 'Anak::save');
$routes->get('/detailanak/(:any)', 'Anak::detailanak/$1');
$routes->get('/editanak/(:any)', 'Anak::editanak/$1');
$routes->get('/kmsanak/(:any)', 'Anak::kmsanak/$1');
$routes->post('/anak/update/(:num)', 'Anak::update/$1');
$routes->delete('/hapusanak/(:num)', 'Anak::hapusanak/$1');
$routes->get('/dataanak/pdf', 'Anak::pdf');
$routes->get('/dataanak/excel', 'Anak::excel');
// ===  DATA ABSEN BUMIL === //
$routes->get('/absenbumil', 'Absen::absenbumil');
$routes->post('/absenbumil/save', 'Absen::saveabsenbumil');
$routes->post('/absenbumil/filter', 'Absen::filterbumil');
// ===  DATA ABSEN ANAK === //
$routes->get('/absenanak', 'Absen::absenanak');
$routes->post('/absenanak/save', 'Absen::saveabsenanak');
$routes->post('/absenanak/filter', 'Absen::filteranak');
// ========DATA KB========== //
$routes->get('/datakb', 'Kb::index');
$routes->get('/tambahkb', 'Kb::tambahkb');
$routes->post('/kb/save', 'Kb::save');
$routes->get('/detailkb/(:any)', 'Kb::detailkb/$1');
$routes->get('/editkb/(:any)', 'Kb::editkb/$1');
$routes->post('/kb/update/(:num)', 'Kb::update/$1');
$routes->delete('/hapuskb/(:num)', 'Kb::hapuskb/$1');
$routes->get('/datakb/pdf', 'Kb::pdf');
$routes->get('/datakb/excel', 'Kb::excel');
// ======DATA KES BUMIL====== //
$routes->get('/datakesbumil', 'Kesbumil::index');
$routes->get('/datakesbumil/updateKandungan', 'Kesbumil::index');
$routes->get('/tambahkesbumil', 'Kesbumil::tambahkesbumil');
$routes->post('/kesbumil/save', 'Kesbumil::save');
$routes->get('/detailkesbumil/(:any)', 'Kesbumil::detailkesbumil/$1');
$routes->get('/editkesbumil/(:any)', 'Kesbumil::editkesbumil/$1');
$routes->post('/kesbumil/update/(:num)', 'Kesbumil::update/$1');
$routes->delete('/hapuskesbumil/(:num)', 'Kesbumil::hapuskesbumil/$1');
$routes->get('/datakesbumil/pdf', 'Kesbumil::pdf');
$routes->get('/datakesbumil/excel', 'Kesbumil::excel');
// === DATA IMUNISASI ANAK === //
$routes->get('/dataimunanak', 'Imunisasi::index');
$routes->get('/tambahimunanak', 'Imunisasi::tambahimunanak');
$routes->post('/imunanak/save', 'Imunisasi::save');
$routes->get('/detailimunanak/(:any)', 'Imunisasi::detailimunanak/$1');
$routes->get('/editimunanak/(:any)', 'Imunisasi::editimunanak/$1');
$routes->post('/imunanak/update/(:num)', 'Imunisasi::update/$1');
$routes->delete('/hapusimunanak/(:num)', 'Imunisasi::hapusimunanak/$1');
$routes->get('/dataimunanak/pdf', 'Imunisasi::pdf');
$routes->get('/dataimunanak/excel', 'Imunisasi::excel');
// === DATA PENIMBANGAN ANAK === //
$routes->get('/datapenimbanganak', 'Penimbangan::index');
$routes->get('/tambahpenimbanganak', 'Penimbangan::tambahpenimbanganak');
$routes->post('/penimbanganak/save', 'Penimbangan::save');
$routes->get('/detailpenimbanganak/(:any)', 'Penimbangan::detailpenimbanganak/$1');
$routes->get('/editpenimbanganak/(:any)', 'Penimbangan::editpenimbanganak/$1');
$routes->post('/penimbangan/update/(:num)', 'Penimbangan::update/$1');
$routes->delete('/hapuspenimbanganak/(:num)', 'Penimbangan::hapuspenimbanganak/$1');
$routes->get('/datapenimbanganak/pdf', 'Penimbangan::pdf');
$routes->get('/datapenimbanganak/excel', 'Penimbangan::excel');
/// ===  LAPORAN KOMDAT === //
$routes->get('/laporankomdat', 'Laporankomdat::index');
$routes->get('/tambahlaporankomdat', 'Laporankomdat::tambahlaporankomdat');
$routes->post('/laporankomdat/save', 'Laporankomdat::save');
$routes->post('/laporankomdat/hitung', 'Laporankomdat::hitung');
$routes->get('/detaillaporankomdat/(:any)', 'Laporankomdat::detaillaporankomdat/$1');
$routes->get('/editlaporankomdat/(:any)', 'Laporankomdat::editlaporankomdat/$1');
$routes->post('/laporankomdat/update/(:num)', 'Laporankomdat::update/$1');
$routes->delete('/hapuslaporankomdat/(:num)', 'Laporankomdat::hapuslaporankomdat/$1');
$routes->get('/laporankomdat/pdfall', 'Laporankomdat::pdfall');
$routes->get('/laporankomdat/pdf/(:any)', 'Laporankomdat::pdf/$1');
$routes->post('/laporankomdat/filter', 'Laporankomdat::filter');
// ==================  FITUR LIHAT KADER  ============================== //
// =======DATA BIDAN=========== //
$routes->get('/bidandata', 'Bidan::index');
$routes->get('/bidandetail/(:any)', 'Bidan::detailbidan/$1');
// =======DATA POSYANDU====== //
// $routes->get('/posyandudata', 'Posyandu::index');
// $routes->get('/posyandudetail/(:num)', 'Posyandu::detailposyandu/$1');
// =======DATA AGENDA====== //
$routes->get('/agendadata', 'Agenda::index');
$routes->get('/agendadetail/(:num)', 'Agenda::detailagenda/$1');
$routes->get('/agendadata/pdf', 'Agenda::pdf');
$routes->get('/agendadata/excel', 'Agenda::excel');
// =======DATA NOTIF====== //
$routes->get('/notifdata', 'Notif::index');





// ==================================Masyarakat========================== //
$routes->get('/masyarakat', 'Masyarakat::index');
$routes->get('/dashboard/ma', 'Admin::index');

// ========PROFIL MASYARAKAT========= //
$routes->get('/profilku/(:any)', 'Profil::lihat/$1');
$routes->post('/profil/editprofilku', 'Profil::edit_promas');
// ========RESET PASSWORD MASYARAKAT========= //
$routes->get('/passresetku/(:any)', 'Resetpass::index/$1');
$routes->post('/store_passresetku/(:any)', 'Resetpass::resetPassword/$1');
// ======DAFTAR BUMIL HALAMAN DASHBOARD=== //
$routes->get('/daftarbumil', 'Masyarakat::daftarbumil');
$routes->post('/daftarbumil/submitbumil', 'Masyarakat::submitbumil');
// ======DAFTAR KB HALAMAN DASHBOARD====== //
$routes->get('/daftarkb', 'Masyarakat::daftarkb');
$routes->post('/daftarkb/submitkb', 'Masyarakat::submitkb');
// ==========RIWAYAT KESBUMIL====== //
$routes->get('/riwayatkesbumilku', 'Masyarakat::riwayatkesbumil');
$routes->get('/detailkesbumilku/(:any)', 'Kesbumil::detailkesbumil/$1');
// ==========RIWAYAT KB====== //
$routes->get('/riwayatkbku', 'Masyarakat::riwayatkb');
$routes->get('/detailkbku/(:any)', 'Kb::detailkb/$1');
// ==========RIWAYAT PENIMBANGAN====== //
$routes->get('/riwayatpenimbanganku', 'Masyarakat::riwayatpenimbangan');
$routes->get('/detailpenimbanganakku/(:any)', 'Penimbangan::detailpenimbanganak/$1');
// ==========RIWAYAT IMUNISASI====== //
$routes->get('/riwayatimunisasiku', 'Masyarakat::riwayatimunisasi');
$routes->get('/detailimunku/(:any)', 'Imunisasi::detailimunanak/$1');





// ======================lAYANAN KESELURUHAN USER=========================== //
//==================ADMIN==========//
// ===  DATA CEK KES BUMIL === //
$routes->get('/cekkesbumil', 'Layanancekkes::index');
// ===  DATA PENIMBANGAN ANAK === //
$routes->get('/timbanganak', 'Layanantimbang::index');
// ===  DATA IMUNISASI === //(OPSIONAL)
$routes->get('/imun', 'Layananimun::index');
//===================KADER=========//
// ===  DATA CEK KES BUMIL === //
$routes->get('/kesbumilcek', 'Layanancekkes::index');
// ===  DATA PENIMBANGAN ANAK === //
$routes->get('/penimbangananak', 'Layanantimbang::index');
// ===  DATA IMUNISASI === //(OPSIONAL)
$routes->get('/imunisasianak', 'Layananimun::index');
//===================MASYARAKAT=========//
// ===  DATA CEK KES BUMIL === //
$routes->get('/bumilcekkes', 'Layanancekkes::index');
// ===  DATA PENIMBANGAN ANAK === //
$routes->get('/anaktimbang', 'Layanantimbang::index');
// ===  DATA IMUNISASI === //(OPSIONAL)
$routes->get('/anakimun', 'Layananimun::index');



// ====================== API =========================== //
$routes->post('/login', 'api\ManageAll::login');
$routes->post('/register', 'api\ManageAll::register_post');
$routes->get('/agenda', 'api\ManageAll::getAgenda');
$routes->get('/penimbangan', 'api\ManageAll::getPenimbangan');
$routes->get('/getprofil/(:any)', 'api\ManageAll::getProfil/$1');
$routes->put('/updateProfil/(:any)', 'api\ManageAll::updateProfil/$1');
$routes->get('/getImunisasi/(:any)', 'api\ManageAll::getImunisasi/$1');


// ====================== API ANDROID =========================== //
// $routes->post('api/ManageAll/register', 'api/ManageAll::register_post');




/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

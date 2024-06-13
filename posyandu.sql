/*
SQLyog Enterprise v12.4.3 (64 bit)
MySQL - 10.4.22-MariaDB : Database - posyandu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`posyandu` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `posyandu`;

/*Table structure for table `absenanak` */

DROP TABLE IF EXISTS `absenanak`;

CREATE TABLE `absenanak` (
  `idabsenanak` int(11) NOT NULL AUTO_INCREMENT,
  `idagenda` int(11) DEFAULT NULL,
  `idanak` int(11) DEFAULT NULL,
  `idortu` int(11) DEFAULT NULL,
  `timbang` tinyint(4) DEFAULT NULL,
  `imun` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idabsenanak`),
  KEY `ab_agen` (`idagenda`),
  KEY `ab_bumil` (`idortu`),
  KEY `ab_anak` (`idanak`),
  CONSTRAINT `ab_agen` FOREIGN KEY (`idagenda`) REFERENCES `agenda` (`idagenda`),
  CONSTRAINT `ab_anak` FOREIGN KEY (`idanak`) REFERENCES `anak` (`idanak`),
  CONSTRAINT `ab_bumil` FOREIGN KEY (`idortu`) REFERENCES `bumil` (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `absenbumil` */

DROP TABLE IF EXISTS `absenbumil`;

CREATE TABLE `absenbumil` (
  `idabsen` int(11) NOT NULL AUTO_INCREMENT,
  `idbumil` int(11) DEFAULT NULL,
  `kesbumil` tinyint(4) DEFAULT NULL,
  `kb` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idabsen`),
  KEY `bumil_absen` (`idbumil`),
  KEY `kesbumil_absen` (`kesbumil`),
  KEY `kb_absen` (`kb`),
  CONSTRAINT `bumil_absen` FOREIGN KEY (`idbumil`) REFERENCES `bumil` (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `idagenda` int(11) NOT NULL AUTO_INCREMENT,
  `namaagenda` varchar(100) DEFAULT NULL,
  `kategoriagenda` enum('Kesehatan Ibu Hamil','Imunisasi dan Penimbangan Balita','Program KB') DEFAULT NULL,
  `tglagenda` date DEFAULT NULL,
  `waktuagenda` time DEFAULT NULL,
  `tempatagenda` varchar(100) DEFAULT NULL,
  `alamatagenda` varchar(225) DEFAULT NULL,
  `idkader` int(11) DEFAULT NULL,
  `idbidan` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idagenda`),
  KEY `agenda_kader` (`idkader`),
  KEY `agenda_bidan` (`idbidan`),
  CONSTRAINT `agenda_bidan` FOREIGN KEY (`idbidan`) REFERENCES `bidan` (`idbidan`),
  CONSTRAINT `agenda_kader` FOREIGN KEY (`idkader`) REFERENCES `kader` (`idkader`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `anak` */

DROP TABLE IF EXISTS `anak`;

CREATE TABLE `anak` (
  `idanak` int(11) NOT NULL AUTO_INCREMENT,
  `nik` char(16) NOT NULL,
  `anaknama` varchar(225) DEFAULT NULL,
  `tmptlhr` varchar(100) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `jk` enum('Laki - Laki','Perempuan') DEFAULT NULL,
  `namatmptlhr` varchar(100) DEFAULT NULL,
  `jeniskelahiran` enum('Tunggal','Kembar 2','Kembar 3','Lainnya') DEFAULT NULL,
  `bblahir` varchar(5) DEFAULT NULL,
  `tblahir` varchar(5) DEFAULT NULL,
  `lklahir` varchar(5) DEFAULT NULL,
  `idortu` int(11) DEFAULT NULL,
  `idabsen` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idanak`),
  KEY `anak_bumil` (`idortu`),
  KEY `absen_anak` (`idabsen`),
  CONSTRAINT `absen_anak` FOREIGN KEY (`idabsen`) REFERENCES `absenanak` (`idabsenanak`),
  CONSTRAINT `anak_bumil` FOREIGN KEY (`idortu`) REFERENCES `ortu` (`idortu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `auth_activation_attempts` */

DROP TABLE IF EXISTS `auth_activation_attempts`;

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_groups` */

DROP TABLE IF EXISTS `auth_groups`;

CREATE TABLE `auth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `auth_groups_permissions` */

DROP TABLE IF EXISTS `auth_groups_permissions`;

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`),
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_groups_users` */

DROP TABLE IF EXISTS `auth_groups_users`;

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) unsigned NOT NULL DEFAULT 0,
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `group_id_user_id` (`group_id`,`user_id`),
  KEY `auth_users_group_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_group_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_logins` */

DROP TABLE IF EXISTS `auth_logins`;

CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8;

/*Table structure for table `auth_permissions` */

DROP TABLE IF EXISTS `auth_permissions`;

CREATE TABLE `auth_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Table structure for table `auth_reset_attempts` */

DROP TABLE IF EXISTS `auth_reset_attempts`;

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_tokens` */

DROP TABLE IF EXISTS `auth_tokens`;

CREATE TABLE `auth_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `auth_users_permissions` */

DROP TABLE IF EXISTS `auth_users_permissions`;

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) unsigned NOT NULL DEFAULT 0,
  `permission_id` int(11) unsigned NOT NULL DEFAULT 0,
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign ` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `bidan` */

DROP TABLE IF EXISTS `bidan`;

CREATE TABLE `bidan` (
  `idbidan` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(225) DEFAULT NULL,
  `bidannama` varchar(225) DEFAULT NULL,
  `bidantmptlhr` varchar(100) DEFAULT NULL,
  `bidantgllhr` date DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `bidanpendidikan` enum('SMA','D1/D2','D3','D4/S1') DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `lamakerja` varchar(50) DEFAULT NULL,
  `status` enum('Active','Non Active') DEFAULT 'Active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idbidan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `bumil` */

DROP TABLE IF EXISTS `bumil`;

CREATE TABLE `bumil` (
  `idbumil` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nokk` char(16) NOT NULL,
  `ayahnik` char(16) DEFAULT NULL,
  `ayahnama` varchar(225) DEFAULT NULL,
  `ayahtmptlhr` varchar(50) DEFAULT NULL,
  `ayahtgllhr` date DEFAULT NULL,
  `ayahagama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu') DEFAULT NULL,
  `ayahpendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','Tidak Bersekolah') DEFAULT NULL,
  `ayahpekerjaan` varchar(100) DEFAULT NULL,
  `ayahnohp` varchar(15) DEFAULT NULL,
  `ibunik` char(16) DEFAULT NULL,
  `ibunama` varchar(225) DEFAULT NULL,
  `ibutmptlhr` varchar(50) DEFAULT NULL,
  `ibutgllhr` date DEFAULT NULL,
  `ibuagama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu') DEFAULT NULL,
  `ibupendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','Tidak bersekolah') DEFAULT NULL,
  `ibupekerjaan` varchar(100) DEFAULT NULL,
  `ibunohp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jmlhanak` int(5) DEFAULT NULL,
  `anakke` int(5) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `imunisasi` */

DROP TABLE IF EXISTS `imunisasi`;

CREATE TABLE `imunisasi` (
  `idimunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `usia` varchar(20) DEFAULT NULL,
  `tglimun` date DEFAULT NULL,
  `jenisimun` enum('Hepatitis B','BCG','Polio tetes 1','DPT 1, Polio tetes 2 dan PCV 1','DPT 2, Polio tetes 3 dan PCV 2','DPT 3, Polio tetes 4 dan Polio suntik (IPV)','Campak dan rubella (MR)','PCV 3','DPT Lanjutan','Campak dan rubella (MR) Lanjutan') DEFAULT NULL,
  `namavit` varchar(100) DEFAULT NULL,
  `obatcacing` varchar(50) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL,
  `idanak` int(11) DEFAULT NULL,
  `idortu` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idimunisasi`),
  KEY `imun_anak` (`idanak`),
  KEY `imun_bumil` (`idortu`),
  CONSTRAINT `imun_anak` FOREIGN KEY (`idanak`) REFERENCES `anak` (`idanak`),
  CONSTRAINT `imun_bumil` FOREIGN KEY (`idortu`) REFERENCES `bumil` (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `jenisimun` */

DROP TABLE IF EXISTS `jenisimun`;

CREATE TABLE `jenisimun` (
  `idJenImun` int(11) NOT NULL AUTO_INCREMENT,
  `namaimun` varchar(225) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `keterangan` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`idJenImun`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `kader` */

DROP TABLE IF EXISTS `kader`;

CREATE TABLE `kader` (
  `idkader` int(11) NOT NULL AUTO_INCREMENT,
  `kadernama` varchar(225) DEFAULT NULL,
  `kadertmptlhr` varchar(100) DEFAULT NULL,
  `kadertgllhr` date DEFAULT NULL,
  `kaderpendidikan` enum('SMP','SMA','D1/D2','D3','D4/S1') DEFAULT NULL,
  `jabatan` enum('Ketua','Sekretaris','Bendahara','PPKBD','Anggota') DEFAULT NULL,
  `kadertugas` varchar(225) DEFAULT NULL,
  `lamakerja` int(5) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkader`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `kb` */

DROP TABLE IF EXISTS `kb`;

CREATE TABLE `kb` (
  `idkb` int(11) NOT NULL AUTO_INCREMENT,
  `tglkb` date DEFAULT NULL,
  `jeniskb` enum('Pil','Suntik','Kondom','IUD','Implan') DEFAULT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `idbumil` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkb`),
  KEY `kb_bumil` (`idbumil`),
  CONSTRAINT `kb_bumil` FOREIGN KEY (`idbumil`) REFERENCES `bumil` (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `kesbumil` */

DROP TABLE IF EXISTS `kesbumil`;

CREATE TABLE `kesbumil` (
  `idkesbumil` int(11) NOT NULL AUTO_INCREMENT,
  `tglperiksa` date DEFAULT NULL,
  `umur` varchar(5) DEFAULT NULL,
  `umurkandungan` int(5) DEFAULT NULL,
  `bb` varchar(10) DEFAULT NULL,
  `ketbb` varchar(100) DEFAULT NULL,
  `tb` varchar(10) DEFAULT NULL,
  `lila` varchar(10) DEFAULT NULL,
  `ketlila` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tinggifundus` varchar(20) DEFAULT NULL,
  `keluhan` varchar(50) DEFAULT NULL,
  `tekanandrh` varchar(20) DEFAULT NULL,
  `letakjanin` enum('Posisi Kepala di Bawah (Normal)','Posisi Posterior','Posisi Melintang','Posisi Sungsang') DEFAULT NULL,
  `denyutjantung` varchar(20) DEFAULT NULL,
  `bengkakkaki` enum('Ya','Tidak') DEFAULT NULL,
  `periksalabo` varchar(50) DEFAULT NULL,
  `tindakan` varchar(50) DEFAULT NULL,
  `nasihatsaran` text DEFAULT NULL,
  `hasil_bb` text DEFAULT NULL,
  `hasil_lila` text DEFAULT NULL,
  `idbumil` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idkesbumil`),
  KEY `kes_bumil` (`idbumil`),
  CONSTRAINT `kes_bumil` FOREIGN KEY (`idbumil`) REFERENCES `bumil` (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `laporan` */

DROP TABLE IF EXISTS `laporan`;

CREATE TABLE `laporan` (
  `idlaporan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl` date DEFAULT NULL,
  `kia1` varchar(5) DEFAULT NULL,
  `kia2` varchar(5) DEFAULT NULL,
  `gizi1` varchar(5) DEFAULT NULL,
  `gizi2` varchar(5) DEFAULT NULL,
  `imun1` varchar(5) DEFAULT NULL,
  `imun2` varchar(5) DEFAULT NULL,
  `kb1` varchar(5) DEFAULT NULL,
  `kb2` varchar(5) DEFAULT NULL,
  `perkia` varchar(10) DEFAULT NULL,
  `pergizi` varchar(10) DEFAULT NULL,
  `perimun` varchar(10) DEFAULT NULL,
  `perkb` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idlaporan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Table structure for table `notif` */

DROP TABLE IF EXISTS `notif`;

CREATE TABLE `notif` (
  `idnotif` int(11) NOT NULL AUTO_INCREMENT,
  `idanak` int(11) DEFAULT NULL,
  `usia` int(11) DEFAULT NULL,
  `idJenImun` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idnotif`),
  KEY `notif_anak` (`idanak`),
  KEY `notif_jenImun` (`idJenImun`),
  CONSTRAINT `notif_anak` FOREIGN KEY (`idanak`) REFERENCES `anak` (`idanak`),
  CONSTRAINT `notif_jenImun` FOREIGN KEY (`idJenImun`) REFERENCES `jenisimun` (`idJenImun`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `ortu` */

DROP TABLE IF EXISTS `ortu`;

CREATE TABLE `ortu` (
  `idortu` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nokk` char(16) NOT NULL,
  `ayahnik` char(16) DEFAULT NULL,
  `ayahnama` varchar(225) DEFAULT NULL,
  `ayahtmptlhr` varchar(50) DEFAULT NULL,
  `ayahtgllhr` date DEFAULT NULL,
  `ayahagama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu') DEFAULT NULL,
  `ayahpendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','Tidak Bersekolah') DEFAULT NULL,
  `ayahpekerjaan` varchar(100) DEFAULT NULL,
  `ayahnohp` varchar(15) DEFAULT NULL,
  `ibunik` char(16) DEFAULT NULL,
  `ibunama` varchar(225) DEFAULT NULL,
  `ibutmptlhr` varchar(50) DEFAULT NULL,
  `ibutgllhr` date DEFAULT NULL,
  `ibuagama` enum('Islam','Kristen Katolik','Kristen Protestan','Hindu','Budha','Konghucu') DEFAULT NULL,
  `ibupendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','Tidak bersekolah') DEFAULT NULL,
  `ibupekerjaan` varchar(100) DEFAULT NULL,
  `ibunohp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jmlhanak` int(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idortu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `penimbangan` */

DROP TABLE IF EXISTS `penimbangan`;

CREATE TABLE `penimbangan` (
  `idpenimbangan` int(11) NOT NULL AUTO_INCREMENT,
  `tgltimbang` date DEFAULT NULL,
  `usia` varchar(5) DEFAULT NULL,
  `bb` varchar(10) DEFAULT NULL,
  `ketbb` varchar(100) DEFAULT NULL,
  `tb` varchar(10) DEFAULT NULL,
  `kettb` varchar(100) DEFAULT NULL,
  `lk` varchar(10) DEFAULT NULL,
  `ketlk` varchar(100) DEFAULT NULL,
  `lila` varchar(10) DEFAULT NULL,
  `ketlila` varchar(100) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `idanak` int(11) DEFAULT NULL,
  `idortu` int(11) DEFAULT NULL,
  `hasil_bb` text DEFAULT NULL,
  `hasil_tb` text DEFAULT NULL,
  `hasil_lk` text DEFAULT NULL,
  `hasil_lila` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idpenimbangan`),
  KEY `kembang_anak` (`idanak`),
  KEY `kembang_bumil` (`idortu`),
  CONSTRAINT `kembang_anak` FOREIGN KEY (`idanak`) REFERENCES `anak` (`idanak`),
  CONSTRAINT `kembang_bumil` FOREIGN KEY (`idortu`) REFERENCES `bumil` (`idbumil`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `posyandu` */

DROP TABLE IF EXISTS `posyandu`;

CREATE TABLE `posyandu` (
  `idposyandu` int(11) NOT NULL AUTO_INCREMENT,
  `namapos` varchar(50) DEFAULT NULL,
  `kategoripos` enum('Imunisasi Balita','Pemberian Makanan Tambahan','Kesehatan Ibu Hamil','Kesehatan Balita','Program KB','Pemantauan Gizi Balita','Pemantauan Gizi Ibu Hamil') DEFAULT NULL,
  `waktupos` time DEFAULT NULL,
  `lokasipos` varchar(100) DEFAULT NULL,
  `idagenda` int(11) NOT NULL,
  `idkader` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idposyandu`),
  KEY `pos_agenda` (`idagenda`),
  KEY `pos_kader` (`idkader`),
  CONSTRAINT `pos_agenda` FOREIGN KEY (`idagenda`) REFERENCES `agenda` (`idagenda`),
  CONSTRAINT `pos_kader` FOREIGN KEY (`idkader`) REFERENCES `kader` (`idkader`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `puskesmas` */

DROP TABLE IF EXISTS `puskesmas`;

CREATE TABLE `puskesmas` (
  `idpuskesmas` int(11) NOT NULL AUTO_INCREMENT,
  `namapuskesmas` varchar(50) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `idbidan` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idpuskesmas`),
  KEY `idbidan` (`idbidan`),
  CONSTRAINT `puskesmas_ibfk_1` FOREIGN KEY (`idbidan`) REFERENCES `bidan` (`idbidan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `usernohp` varchar(15) DEFAULT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(20) NOT NULL,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

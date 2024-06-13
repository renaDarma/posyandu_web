<?php
use App\Models\PenimbanganModel;
use App\Models\ImunisasiModel;
use App\Models\KesbumilModel;
use App\Models\NotifModel;
use App\Models\KbModel;

if (! function_exists('hitung_umur')) {
    function hitung_umur($tgl)
    {
        $tanggal = new DateTime($tgl);
        $today = new DateTime('today');
        $y = $today->diff($tanggal)->y;
        $m = $today->diff($tanggal)->m;
        $d = $today->diff($tanggal)->d;
        return $y . " Tahun, " . $m . " Bulan, " . $d . " Hari";
    }
}

// AWAL NOTIF BUMIL KES DAN KB
if (! function_exists('dataBumilTopBar'))
{
    function dataBumilTopBar()
    {
        $kesbumil = new KesbumilModel();
        return $kesbumil->dataAll();
    }
}

if (! function_exists('dataKbBumilKbTopBar'))
{
    function dataKbBumilKbTopBar()
    {
        $kbbumil = new KbModel();
        return $kbbumil->dataAll();
    }
}
// AKHIR NOTIF BUMIL KES DAN KB

// AWAL NOTIF ANAK IMUN DAN TIMBANG
if (! function_exists('dataAnakTopBar'))
{
    function dataAnakTopBar()
    {
        $imunisasi = new ImunisasiModel();
        return $imunisasi->dataAllAnak();
    }
}

if (! function_exists('dataAnakTimbangTopBar'))
{
    function dataAnakTimbangTopBar()
    {
        $penimbangan = new PenimbanganModel();
        return $penimbangan->dataAllAnak();
    }
}
// AKHIR NOTIF ANAK IMUN DAN TIMBANG

// AWAL NOTIF IBU HPL
if (!function_exists('bumilhpl')) {
    function bumilhpl()
    {
        $kesbumil = new KesbumilModel();
        return $kesbumil->getBumil9Bulan();
    }
}

if (!function_exists('generate_notifikasi')) {
    function generate_notifikasi($bumil_data)
    {
        $notification = '';

        foreach ($bumil_data as $bumil) {
            $notification .= "Bumil {$bumil['ibunama']} Telah mencapai HPL (Hari Perkiraan Lahir)<br>";
        }

        return $notification;
    }
}
// AKHIR NOTIF IBU HPL


// notif baru
if (! function_exists('dataNotifAnakImunisasi'))
{
    function dataNotifAnakImunisasi()
    {
        $notif = new NotifModel();
        return $notif->getNotifTop();
    }
}
if (! function_exists('dataNotifAnakImunisasiCount'))
{
    function dataNotifAnakImunisasiCount()
    {
        $notif = new NotifModel();
        return $notif->getNotif();
    }
}
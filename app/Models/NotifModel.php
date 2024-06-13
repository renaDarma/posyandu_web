<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifModel extends Model
{
    protected $table      = 'notif';
    protected $primaryKey = 'idnotif';

    protected $returnType     = 'array';

    protected $allowedFields = ['idnotif', 'idanak', 'idJenImun', 'anaknama', 'jk', 'tgllhr'];

    protected $useTimestamps = true;

    public function getNotif() 
    {
    return $this->db->table('notif')
        ->select('b.anaknama, c.namaImun, notif.idnotif')
        ->join('anak b', 'notif.idanak = b.idanak', 'left')
        ->join('jenisImun c', 'notif.idJenImun = c.idJenImun', 'left')
        ->get()
        ->getResultObject();    
    }
    public function getNotifTop() 
    {
        // Ambil tanggal awal dan akhir dari bulan ini
        $startDate = date('Y-m-01 00:00:00');
        $endDate = date('Y-m-t 23:59:59');

        return $this->db->table('notif')
            ->select('b.anaknama, c.namaImun, notif.idnotif')
            ->join('anak b', 'notif.idanak = b.idanak', 'left')
            ->join('jenisImun c', 'notif.idJenImun = c.idJenImun', 'left')
            ->where('notif.created_at >=', $startDate)
            ->where('notif.created_at <=', $endDate)
            ->limit(5)
            ->get()
            ->getResultObject();    
    }


    // public function getIdAnak($idnotif) 
    // {
    //     return $this->db->table('anak')
    //             ->select('anak.idanak, anak.anaknama, anak.tgllhr, anak.jk, imunisasi.*, ortu.idortu, ortu.ibunama')
    //             ->join('imunisasi','anak.idanak = imunisasi.idanak','left')
    //             ->join('ortu','ortu.idortu = imunisasi.idortu','left')
    //             ->where('imunisasi.idimunisasi', $idimunisasi)
    //             ->orderBy('imunisasi.idimunisasi','ASC')
    //             ->get() 
    //             ->getResultObject();
    // }

    // public function getIdOrtu($idimunisasi) 
    // {
    //     return $this->db->table('ortu')
    //             ->select('ortu.idortu, ortu.ibunama, imunisasi.*, anak.idanak, anak.anaknama, anak.tgllhr, anak.jk')
    //             ->join('imunisasi','ortu.idortu = imunisasi.idortu','left')
    //             ->join('anak','anak.idanak = imunisasi.idanak','left')
    //             ->where('imunisasi.idimunisasi', $idimunisasi)
    //             ->orderBy('imunisasi.idimunisasi','ASC')
    //             ->get() 
    //             ->getResultObject();
    // }

    public function getIdNotif($idnotif) 
    {
        return $this->where(['idnotif'=> $idnotif])->first();
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;
class LaporankomdatModel extends Model
{
    protected $table      = 'laporan';
    protected $primaryKey = 'idlaporan';

    protected $returnType     = 'array';

    protected $allowedFields = ['tgl', 'kia1', 'kia2', 'gizi1',
                                'gizi2', 'imun1', 'imun2', 'kb1',
                                'kb2', 'perkia', 'pergizi', 'perimun', 
                                'perkb','status'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('laporan')->like('status', $keyword)->orLike('tgl', $keyword);
    }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->select('laporan.*')
                ->orderBy('laporan.idlaporan','DESC')->get()->getResultObject();
    }

    public function filterByTanggal($tanggalawal, $tanggalakhir)
    {
        return $this->table($this->table)
            ->select('laporan.*')
            ->where('tgl >=', $tanggalawal)
            ->where('tgl <=', $tanggalakhir)
            ->findAll();
    }

    public function getLaporan($idlaporankomdat)
    {
       return $this->where(['idlaporan'=> $idlaporankomdat])->first();
    }
}
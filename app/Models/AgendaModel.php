<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table      = 'agenda';
    protected $primaryKey = 'idagenda';

    protected $returnType     = 'array';

    protected $allowedFields = ['namaagenda', 'kategoriagenda',
                                'tglagenda', 'waktuagenda', 
                                'tempatagenda', 'alamatagenda', 'kadernama'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('agenda')->like('namaagenda', $keyword)->orLike('tempatagenda', $keyword);
    }

    // public function getData() 
    // {
    // 	$builder = $this->db->table('agenda');
    //     $builder->select('idagenda, agenda, alamat, nohp');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->join('kader','agenda.idkader = kader.idkader','left')
                ->select('agenda.*, kader.idkader as idkader, kader.kadernama as kadernama')
                ->orderBy('agenda.idagenda','DESC')->get()->getResultObject();
    }

    // public function getAllData() 
    // {
    // 	$builder = $this->db->table('agenda');
    //     $builder->select('agenda.idagenda, agenda, kategori, tgl, waktu, alamat');
    //     $builder->join('posyandu','agenda.idposyandu=posyandu.idposyandu');
    //     $builder->where('agenda.idagenda');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function getIdKader($idagenda)
    {
    	// $builder = $this->db->table('posyandu');
        // $builder->select('posyandu.idposyandu, agenda.*, posyandu.kategoripos');
        // $builder->join('agenda','posyandu.idposyandu = agenda.idposyandu');
        // $builder->where('posyandu.idposyandu', $idagenda);
        // $query = $builder->get();
        // return $query->getResult();

        return $this->db->table('kader')
            ->join('agenda','kader.idkader = agenda.idkader','left')
            ->select('kader.idkader, kader.kadernama, agenda.*')
            ->where('kader.idkader', $idagenda)
            ->orderBy('kader.idkader','DESC')->get()->getResultObject();
    }

    public function getIdagenda($idagenda)
    {
       return $this->where(['idagenda'=> $idagenda])->first();
    }
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class OrtuModel extends Model
{
    protected $table      = 'ortu';
    protected $primaryKey = 'idortu';

    protected $allowedFields = ['nokk','ayahnik', 'ayahnama', 'ayahtmptlhr', 'ayahtgllhr', 
                                'ayahagama', 'ayahpendidikan', 'ayahpekerjaan', 
                                'ayahnohp', 'ibunik', 'ibunama', 'ibutmptlhr', 
                                'ibutgllhr', 'ibuagama', 'ibupendidikan', 
                                'ibupekerjaan', 'ibunohp', 'alamat', 'jmlhanak'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('ortu')->like('ibunama', $keyword)->orLike('ayahnama', $keyword)->orLike('alamat', $keyword);
    }

    public function getAyahByIbu($ibunama)
    {
        return $this->where('ibunama', $ibunama)->first();
    }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->select('ortu.*')
                ->orderBy('ortu.idortu','DESC')->get() ->getResultObject();
    }


    public function getOrtu($idortu)
    {
       return $this->where(['idortu'=> $idortu])->first();
    }
}
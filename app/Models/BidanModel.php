<?php

namespace App\Models;

use CodeIgniter\Model;

class BidanModel extends Model
{
    protected $table      = 'bidan';
    protected $primaryKey = 'idbidan';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['bidannama', 'bidantmptlhr', 'bidantgllhr',  'alamat', 'bidanpendidikan', 'foto', 'nohp'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('bidan')->like('bidannama', $keyword)->orLike('alamat', $keyword);
    }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->select('bidan.*')
                ->orderBy('bidan.idbidan','DESC')->get()->getResultObject();
    }

    public function getBidan($bidannama = false)
    {
        if($bidannama == false){
            return $this->findAll();
        }
        return $this->where(['bidannama' => $bidannama])->first();
    }

      public function getIdBidan($idbidan)
    {
       return $this->where(['idbidan'=> $idbidan])->first();
    }

}
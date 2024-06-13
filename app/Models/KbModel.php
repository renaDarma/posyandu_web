<?php

namespace App\Models;

use CodeIgniter\Model;

class KbModel extends Model
{
    protected $table      = 'kb';
    protected $primaryKey = 'idkb';

    protected $returnType     = 'array';

    protected $allowedFields = ['tglkb','usia','jeniskb', 
                                'ibunama','ibutgllhr', 'ayahnama',];

    protected $useTimestamps = true;

    public function getAllData() 
    {
    	$builder = $this->db->table($this->table);
        $builder->join('bumil','kb.idbumil = bumil.idbumil','left');
        $builder->select('kb.*, bumil.idbumil, bumil.ibunama, bumil.ayahnama, bumil.ibutgllhr');
      
        $query = $builder->get();
        return $query->getResult();
    }

    public function getDataBumil()
    {
        return $this->db->table('bumil')
                ->select('bumil.idbumil, bumil.ibunama, bumil.ayahnama, bumil.ibutgllhr')
                ->orderBy('bumil.idbumil','DESC')->get() ->getResultObject();
    }

    public function dataAll() 
    {
        $bumilExisting = [];
    
        $kb = $this->db->table('kb')->get()->getResultObject();

        foreach ($kb as $value) {
            array_push($bumilExisting,$value->idbumil);
        }

        $dataBumil = $this->db->table('bumil')->whereNotIn('idbumil',$bumilExisting)->get()->getResultObject();

        return $dataBumil;
    }

    public function getIdBumil($idkb) 
    {
    	return $this->db->table('bumil')
                ->select('bumil.idbumil, bumil.ibunama, bumil.ayahnama, bumil.ibutgllhr, kb.*')
                ->join('kb','bumil.idbumil = kb.idbumil','left')
                ->where('kb.idkb', $idkb)
                ->orderBy('kb.idkb','ASC')
                ->get() 
                ->getResultObject();
    }

    public function getIdKb($idkb)
    {
       return $this->where(['idkb'=> $idkb])->first();
    }
}
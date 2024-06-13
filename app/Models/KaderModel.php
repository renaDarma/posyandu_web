<?php

namespace App\Models;

use CodeIgniter\Model;

class KaderModel extends Model
{
    protected $table      = 'kader';
    protected $primaryKey = 'idkader';

    protected $allowedFields = ['kadernama', 'kadertmptlhr', 'kadertgllhr', 
                                'kaderpendidikan', 'jabatan', 'kadertugas', 
                                'lamakerja', 'alamat', 'nohp'];
   
    protected $returnType     = 'array';

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('kader')->like('kadernama', $keyword)->orLike('jabatan', $keyword)->orLike('alamat', $keyword);
    }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->select('kader.*')
                ->orderBy('kader.idkader','DESC')->get()->getResultObject();
    }

    public function getKader($kadernama = false)
    {
        if($kadernama == false){
            return $this->findAll();
        }
        return $this->where(['kadernama' => $kadernama])->first();
    }

    public function getIdKader($idkader)
    {
       return $this->where(['idkader'=> $idkader])->first();
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class AnakModel extends Model
{
    protected $table      = 'anak';
    protected $primaryKey = 'idanak';

    protected $returnType     = 'array';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['nik', 'anaknama', 'iduser', 'tmptlhr', 'tgllhr', 'jk', 
                                'namatmptlhr', 'jeniskelahiran', 
                                'bblahir', 'tblahir', 'lklahir', 
                                'ayahnama', 'ibunama', 'fullname', 'email'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('anak')->like('fullname', $keyword)->like('email', $keyword)->orLike('tmptlhr', $keyword)->orLike('ayahnama', $keyword)->orLike('ibunama', $keyword);
    }

    // public function getAllData() 
    // {
    // 	$builder = $this->db->table('anak');
    //     $builder->select('idanak, nik, anaknama, tmptlhr, tgllhr, jk, namatmptlhr, jeniskelahiran, 
    //                     bblahir, tblahir, lklahir, ayahnama, ibunama');
    //     $builder->join('keluarga','anak.idkeluarga=keluarga.idkeluarga');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->join('ortu','ortu.idortu = '.$this->table.'.idortu','left')
                ->join('users','users.id = '.$this->table.'.iduser','left')
                ->select('anak.*, ortu.idortu, ortu.ayahnama, ortu.ibunama, users.fullname, users.email')
                ->orderBy('anak.idanak','DESC')->get() ->getResultObject();
    }

    public function getAllUsers() 
    {
        return $this->db->table('users')
                ->select('fullname, email, id')
                ->where('role', 'masyarakat')
                ->get()->getResultObject();
    }

    // BUAT KMS
    public function get_detail_anak($id_anak)
    {
        return $this->db->table('anak')
            ->select('anak.anaknama, penimbangan.bb, MONTH(penimbangan.tgltimbang) AS bulan, YEAR(penimbangan.tgltimbang) AS tahun')
            ->join('penimbangan', 'anak.idanak = penimbangan.idanak', 'left')
            ->where('penimbangan.idanak', $id_anak)
            ->orderBy('penimbangan.tgltimbang', 'ASC')
            ->get()
            ->getResultObject();
    }

    public function getIdOrtu($idanak) 
    {
        return $this->db->table('ortu')
                ->join('anak','anak.idortu = ortu.idortu','left')
                ->select('anak.*, ortu.idortu, ortu.ayahnama, ortu.ibunama')
                ->where('ortu.idortu',$idanak)
                ->orderBy('ortu.idortu','DESC', $idanak)->get() ->getResultObject();
    }

    public function getUsers($idanak) 
    {
        return $this->db->table('users')
                ->join('anak','anak.iduser = users.id','left')
                ->select('anak.*, users.id, users.fullname, users.email')
                ->where('users.id',$idanak)
                ->orderBy('users.id','DESC', $idanak)->get() ->getResultObject();
    }

    // UNTUK PENIMBANGAN
    public function getDetailAnak($idpenimbangan) 
    {
        return $this->db->table('anak')
                ->select('anak.idanak, anak.anaknama, anak.jk, anak.tgllhr, penimbangan.*, 
                        ortu.idortu, ortu.ibunama, ortu.ayahnama')
                ->join('penimbangan','anak.idanak = penimbangan.idanak','left')
                ->join('ortu','ortu.idortu = penimbangan.idortu','left')
                ->where('anak.idanak', $idpenimbangan)
                ->orderBy('penimbangan'.'.idpenimbangan', $idpenimbangan)->get() ->getResultObject();
    }


    public function getIdAnak($idanak) 
    {
        return $this->where(['idanak'=> $idanak])->first();
    }

}
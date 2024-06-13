<?php

namespace App\Models;

use CodeIgniter\Model;

class PenimbanganModel extends Model
{
    protected $table      = 'penimbangan';
    protected $primaryKey = 'idpenimbangan';

    protected $returnType     = 'array';

    protected $allowedFields = ['tgltimbang', 'usia', 'bb', 'ketbb', 'tb', 'kettb',
                                'lk', 'ketlk', 'lila', 'ketlila', 'ket', 'anaknama', 
                                'jk', 'tgllhr', 'ibunama', 'ayahnama' , 'idortu', 'idanak',
                                'hasil_bb', 'hasil_tb', 'hasil_lk', 'hasil_lila'];


    protected $useTimestamps = true;

    // public function search($keyword)
    // {
    //     // return $this->table('penimbangan')->like('anaknama', $keyword)->orLike('ibunama', $keyword)->orLike('ayahnama', $keyword);
    //     return $this->db->table($this->table)
    //     ->join('anak','penimbangan.idanak = anak.idanak','left')
    //     ->join('bumil','penimbangan.idbumil = bumil.idbumil','left')
    //     ->select('penimbangan.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr,
    //                 bumil.idbumil, bumil.ibunama, bumil.ayahnama')
    //     ->orderBy('penimbangan.idpenimbangan','DESC')->like('anaknama', $keyword)->orLike('bb', $keyword)->orLike('tb', $keyword)->orLike('lk', $keyword)->orLike('ibunama', $keyword)->orLike('ayahnama', $keyword)->get() ->getResultObject();
    // }

    // public function getAllData() 
    // {
    // 	$builder = $this->db->table('penimbangan');
    //     $builder->select('idpenimbangan, nik, penimbangannama, tmptlhr, tgllhr, jk, namatmptlhr, jeniskelahiran, 
    //                     bblahir, tblahir, lklahir, ayahnama, ibunama');
    //     $builder->join('keluarga','penimbangan.idkeluarga=keluarga.idkeluarga');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function dataAllAnak() 
    {
        $anakExisting = [];
;
        $penimbangan = $this->db->table('penimbangan')->get()->getResultObject();

        foreach ($penimbangan as $value) {
            array_push($anakExisting,$value->idanak);
        }

        $dataAnak = $this->db->table('anak')->whereNotIn('idanak',$anakExisting)->get()->getResultObject();

        return $dataAnak;
    }

    public function getDataAnak()
    {
        return $this->db->table('anak')
        ->join('ortu','anak.idortu = ortu.idortu','left')
        ->select('anak.idanak, anak.anaknama, anak.jk, anak.tgllhr, 
                ortu.idortu, ortu.ibunama, ortu.ayahnama')
        ->orderBy('anak.idanak','DESC')->get() ->getResultObject();
    }

    public function getAllData()
    {
        return $this->db->table($this->table)
        ->join('anak','penimbangan.idanak = anak.idanak','left')
        ->join('ortu','penimbangan.idortu = ortu.idortu','left')
        ->select('penimbangan.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr,
                    ortu.idortu, ortu.ibunama, ortu.ayahnama')
        ->orderBy('penimbangan.idpenimbangan','DESC')->get() ->getResultObject();
    }

    public function getAllPenimbangan()
    {
        return $this->db->table($this->table)
        ->join('anak','penimbangan.idanak = anak.idanak','left')
        ->join('ortu','penimbangan.idortu = ortu.idortu','left')
        ->select('penimbangan.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr,
                    ortu.idortu, ortu.ibunama, ortu.ayahnama')
        ->where(['ortu.id_user' => session()->get('id')])
        ->orderBy('penimbangan.idpenimbangan','DESC')->get() ->getResultObject();
    }

    public function getIdAnak($idpenimbangan)
{
    return $this->db->table('anak')
        ->select('anak.idanak, anak.anaknama, anak.jk, anak.tgllhr, penimbangan.*, ortu.idortu, ortu.ibunama, ortu.ayahnama')
        ->join('penimbangan', 'anak.idanak = penimbangan.idanak', 'left')
        ->join('ortu', 'ortu.idortu = penimbangan.idortu', 'left')
        ->where('penimbangan.idpenimbangan', $idpenimbangan)
        ->orderBy('penimbangan.idpenimbangan', 'ASC')
        ->get()
        ->getResultObject();
}

public function get_detail_anak($id_anak)
{
    return $this->db->table('anak')
        ->select('anak.anaknama, penimbangan.bb, MONTH(penimbangan.tgltimbang) AS bulan, YEAR(penimbangan.tgltimbang) AS tahun')
        ->join('penimbangan', 'anak.idanak = penimbangan.idanak', 'left')
        ->where('penimbangan.idanak', $id_anak)
        ->orderBy('penimbangan.idpenimbangan', 'ASC')
        ->get()
        ->getResultObject();
}

public function getIdOrtu($idpenimbangan)
{
    return $this->db->table('ortu')
        ->select('ortu.idortu, ortu.ibunama, ortu.ayahnama, penimbangan.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr')
        ->join('penimbangan', 'ortu.idortu = penimbangan.idortu', 'left')
        ->join('anak', 'anak.idanak = penimbangan.idanak', 'left')
        ->where('penimbangan.idpenimbangan', $idpenimbangan)
        ->orderBy('penimbangan.idpenimbangan', 'ASC')
        ->get()
        ->getResultObject();
}

    public function getIdPenimbangan($idpenimbangan) 
    {
        return $this->where(['idpenimbangan'=> $idpenimbangan])->first();
    }


    //================CEK PERTUMBUHAN ANAK======//
    // public function getDataPenimbangan()
    // {
    //     return $this->db->table($this->table)
    //     ->join('anak','penimbangan.idanak = anak.idanak','left')
    //     ->join('bumil','penimbangan.idbumil = bumil.idbumil','left')
    //     ->select('penimbangan.idpenimbangan, penimbangan.bb, penimbangan.tb, 
    //                 penimbangan.lk, penimbangan.lila, anak.idanak, anak.anaknama,
    //                 anak.jk, anak.tgllhr, bumil.idbumil, bumil.ibunama, bumil.ayahnama')
    //     ->orderBy('penimbangan.idpenimbangan','DESC')->get() ->getResultObject();
    // }
}
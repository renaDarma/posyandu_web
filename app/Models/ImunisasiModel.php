<?php

namespace App\Models;

use CodeIgniter\Model;

class ImunisasiModel extends Model
{
    protected $table      = 'imunisasi';
    protected $primaryKey = 'idimunisasi';

    protected $returnType     = 'array';

    protected $allowedFields = ['usia', 'tglimun', 'jenisimun',
                                'namavit', 'obatcacing','ket', 'anaknama', 'jk', 'tgllhr','ibunama'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('imunisasi')->like('anaknama', $keyword)->orLike('jenisimun', $keyword)->orLike('usia', $keyword)->orLike('ibunama', $keyword);
    }

    public function getAllImunisasi()
    {
        return $this->db->table($this->table)
        ->join('anak','imunisasi.idanak = anak.idanak','left')
        ->join('ortu','imunisasi.idortu = ortu.idortu','left')
        ->select('imunisasi.*, anak.idanak, anak.anaknama, anak.jk, anak.tgllhr, ortu.idortu, ortu.ibunama, ortu.ayahnama')
        ->where(['ortu.id_user' => session()->get('id')])
        ->orderBy('imunisasi.idimunisasi','DESC')->get() ->getResultObject();
    }

    // public function getAllData() 
    // {
    // 	$builder = $this->db->table('imunisasi');
    //     $builder->select('idimunisasi, nik, imunisasinama, tmptlhr, tgllhr, jk, namatmptlhr, jeniskelahiran, 
    //                     bblahir, tblahir, lklahir, ayahnama, ibunama');
    //     $builder->join('keluarga','imunisasi.idkeluarga=keluarga.idkeluarga');
    //     $query = $builder->get();
    //     return $query->getResult();
    // }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->join('anak','imunisasi.idanak = anak.idanak','left')
                ->join('ortu','imunisasi.idortu = ortu.idortu','left')
                ->select('imunisasi.*, anak.idanak, anak.anaknama, anak.tgllhr, anak.jk, ortu.idortu, ortu.ibunama')
                ->orderBy('imunisasi.idimunisasi','DESC')->get() ->getResultObject();
    }

    public function getDataAnak()
    {
        return $this->db->table('anak')
                ->join('ortu','anak.idortu = ortu.idortu','left')
                ->select('anak.idanak, anak.anaknama, anak.tgllhr, anak.jk, 
                            ortu.idortu, ortu.ibunama')
                ->orderBy('anak.idanak','DESC')->get() ->getResultObject();
    }

    public function getIdAnak($idimunisasi) 
    {
        return $this->db->table('anak')
                ->select('anak.idanak, anak.anaknama, anak.tgllhr, anak.jk, imunisasi.*, ortu.idortu, ortu.ibunama')
                ->join('imunisasi','anak.idanak = imunisasi.idanak','left')
                ->join('ortu','ortu.idortu = imunisasi.idortu','left')
                ->where('imunisasi.idimunisasi', $idimunisasi)
                ->orderBy('imunisasi.idimunisasi','ASC')
                ->get() 
                ->getResultObject();
    }

    public function getIdOrtu($idimunisasi) 
    {
        return $this->db->table('ortu')
                ->select('ortu.idortu, ortu.ibunama, imunisasi.*, anak.idanak, anak.anaknama, anak.tgllhr, anak.jk')
                ->join('imunisasi','ortu.idortu = imunisasi.idortu','left')
                ->join('anak','anak.idanak = imunisasi.idanak','left')
                ->where('imunisasi.idimunisasi', $idimunisasi)
                ->orderBy('imunisasi.idimunisasi','ASC')
                ->get() 
                ->getResultObject();
    }

    public function getIdImunisasi($idimunisasi) 
    {
        return $this->where(['idimunisasi'=> $idimunisasi])->first();
    }

    public function dataAllAnak() 
    {
        $anakExisting = [];

        $imunisasi = $this->db->table('imunisasi')->get()->getResultObject();
        $penimbangan = $this->db->table('penimbangan')->get()->getResultObject();
      
        foreach ($imunisasi as $value) {
            array_push($anakExisting,$value->idanak);
        }
        foreach ($penimbangan as $value) {
            array_push($anakExisting,$value->idanak);
        }
       
        $dataAnak = $this->db->table('anak')->whereNotIn('idanak',$anakExisting)->get()->getResultObject();

        return $dataAnak;
    }

    public function getExisting($jenisimun, $idanak) 
    {
        return $this->db->table('imunisasi')
                ->select('*')
                ->where('jenisimun', $jenisimun)
                ->where('idanak', $idanak)
                ->get() 
                ->getResultObject();
    }

    public function notifAnakTidakHadirAWAL() 
    {
        $anak =  $this->db->table('anak')->orderBy('idanak', 'DESC')->get()->getResultObject();
        $absenanak = [];
        foreach ($anak as $value) {
            $data_absenanak = $this->db->table('absenanak')->where('idanak',$value->idanak)->orderBy('idagenda', 'DESC')->get(1);
            if($data_absenanak->getResultObject() > 0){
                $count = $this->db->table('agenda')->where('idagenda > ',$data_absenanak->getRow()->idagenda)->countAllResults();

                if($count >= 3){
                    $absenanak[] = [
                        'ibunama' => $value->ibunama,
                        'count' => $count,
                        'data_absenanak' => $count
                    ];
                }
            }
        }
        return $absenanak;
    }

    public function notifAnakTidakHadir() 
    {
        $anak =  $this->db->table('anak')->orderBy('idanak', 'DESC')->get()->getResultObject();
        $absenanak = [];
        foreach ($anak as $value) {
            $data_absenanak = $this->db->table('absenanak')->where('idanak',$value->idanak)->orderBy('idagenda', 'DESC')->get(1);
            if($data_absenanak->getResultObject() > 0){
                if(isset($data_absenanak->getRow()->idagenda) ){
                    $count = $this->db->table('agenda')->where('idagenda > ',$data_absenanak->getRow()->idagenda)->countAllResults();

                    if($count >= 3){
                        $absenanak[] = [
                            'anaknama' => $value->anaknama,
                            'count' => $count,
                            'data_absenanak' => $count
                        ];
                    }
                }
            }
        }
        return $absenanak;
    }

}
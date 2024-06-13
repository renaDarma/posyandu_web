<?php

namespace App\Models;

use CodeIgniter\Model;

class KesbumilModel extends Model
{
    protected $table      = 'kesbumil';
    protected $primaryKey = 'idkesbumil';

    protected $returnType     = 'array';

    protected $allowedFields = ['tglperiksa', 'umur','umurkandungan','bb', 'ketbb','tb', 'keluhan', 'lila', 'ketlila',
                                'catatan','tekanandrh','tinggifundus','letakjanin','denyutjantung',
                                'bengkakkaki','periksalabo','tindakan','nasihatsaran', 'idbumil',
                                'ibunama', 'ayahnama', 'ibutgllhr','anakke', 'hasil_bb', 'hasil_lila'];

    protected $useTimestamps = true;
    
    public function search($keyword)
    {
        // return $this->table('kesbumil')->like('lila', $keyword)->orLike('umur', $keyword)->orLike('umurkandungan', $keyword)->orLike('ibunama', $keyword)->orLike('ayahnama', $keyword);
        
        return $this->db->table($this->table)
        ->join('bumil','kesbumil.idbumil = bumil.idbumil','left')
        ->select('kesbumil.*, bumil.idbumil, bumil.ibunama, bumil.ayahnama, 
                bumil.ibutgllhr, bumil.anakke')
        ->orderBy('kesbumil.idkesbumil','DESC')->like('lila', $keyword)->orLike('umur', $keyword)->orLike('umurkandungan', $keyword)->orLike('ibunama', $keyword)->orLike('ayahnama', $keyword)->get() ->getResultObject();
    }

    public function getDataBumil()
    {
        return $this->db->table('bumil')
        ->select('idbumil, ibunama, ayahnama, ibutgllhr, anakke')
        ->orderBy('bumil.idbumil','DESC')->get() ->getResultObject();
    }

    public function getAllData() 
    {
    	// $builder = $this->db->table('kesbumil');
        // $builder->select('kesbumil.idkesbumil, bumil.idbumil, kesbumil.*, 
        //                     bumil.ibunik, bumil.ibunama');
        // $builder->join('bumil','kesbumil.idbumil = bumil.idbumil');
        // $query = $builder->get();
        // return $query->getResult();

        return $this->db->table($this->table)
        ->join('bumil','kesbumil.idbumil = bumil.idbumil','left')
        ->select('kesbumil.*, bumil.idbumil, bumil.ibunama, bumil.ayahnama, bumil.ibutgllhr, bumil.anakke')
        ->orderBy('kesbumil.idkesbumil','DESC')->get() ->getResultObject();
    }

    public function getAllKesbumil()
    {
        return $this->db->table($this->table)
        ->join('bumil','kesbumil.idbumil = bumil.idbumil','left')
        ->select('kesbumil.*, bumil.idbumil, bumil.ibunama, bumil.ayahnama', 'ibutgllhr', 'anakke')
        ->where(['bumil.id_user' => session()->get('id')])
        ->orderBy('kesbumil.idkesbumil','DESC')->get() ->getResultObject();
    }


    public function getIdBumil($idkesbumil) 
    {
        return $this->db->table('bumil')
        ->select('bumil.idbumil, bumil.ibunama, bumil.ayahnama, bumil.ibutgllhr, bumil.anakke, kesbumil.*')
        ->join('kesbumil','bumil.idbumil = kesbumil.idbumil','left')
        ->where('kesbumil.idkesbumil', $idkesbumil)
        ->orderBy('kesbumil.idkesbumil', 'ASC')
        ->get() 
        ->getResultObject();
    }

    public function getLastUmur($idbumil) 
    {
        $data = $this->db->table('kesbumil')->where('idbumil', $idbumil)->orderBy('idkesbumil', 'desc')->get()->getFirstRow();
        if($data == null){
            return 1;
        }else{
            return $data->umurkandungan + 1;
        }
    }

    public function getIdKesbumil($idkesbumil)
    {
       return $this->where(['idkesbumil'=> $idkesbumil])->first();
    }

    public function dataAll() 
    {
        $bumilExisting = [];

        $kesbumil = $this->db->table('kesbumil')->get()->getResultObject();
        $kb = $this->db->table('kb')->get()->getResultObject();

        foreach ($kesbumil as $value) {
            array_push($bumilExisting,$value->idbumil);
        }
        foreach ($kb as $value) {
            array_push($bumilExisting,$value->idbumil);
        }

        $dataBumil = $this->db->table('bumil')->whereNotIn('idbumil',$bumilExisting)->get()->getResultObject();

        return $dataBumil;
    }

    public function notifIbuTidakHadir() 
    {
        $bumil =  $this->db->table('bumil')->orderBy('idbumil', 'DESC')->get()->getResultObject();
        $absenbumil = [];
        foreach ($bumil as $value) {
            $data_absenbumil = $this->db->table('absenbumil')->where('idbumil',$value->idbumil)->orderBy('idagenda', 'DESC')->get(1);
            if($data_absenbumil->getResultObject() > 0){
                if(isset($data_absenbumil->getRow()->idagenda)){
                    $count = $this->db->table('agenda')->where('idagenda > ',$data_absenbumil->getRow()->idagenda)->countAllResults();

                    if($count >= 3){
                        $absenbumil[] = [
                            'ibunama' => $value->ibunama,
                            'count' => $count,
                            'data_absenbumil' => $count
                        ];
                    }
                }
            }
        }
        return $absenbumil;
    }

    public function getBumil9Bulanawal()
    {
        // return $this->join('bumil', 'kesbumil.idbumil = bumil.idbumil')
        //             ->where('umurkandungan >=', 9)
        //             ->findAll();

        $bumilData = $this->db->table('kesbumil')
            ->join('bumil', 'kesbumil.idbumil = bumil.idbumil')
            ->where('umurkandungan >=', 9)
            ->orderBy('kesbumil.idbumil', 'DESC')
            ->get()
            ->getResultObject();

        $bumilhpl = [];
        foreach ($bumilData as $value) {
            $bumilhpl[] = [
                'ibunama' => $value->ibunama,
            ];
        }
        return $bumilhpl;
    }

    public function getBumil9BulanKedua() 
    {
        $bumilExisting = [];

        $kesbumil = $this->db->table('kesbumil')->get()->getResultObject();

        foreach ($kesbumil as $value) {
            array_push($bumilExisting,$value->idbumil);
        }

        $dataBumil = $this->db->table('bumil')->whereNotIn('idbumil',$bumilExisting)->get()->getResultObject();

        return $dataBumil;
    }

    public function getBumil9Bulan()
    {
        return $this->select('bumil.ibunama, kesbumil.umurkandungan')
            ->join('bumil', 'kesbumil.idbumil = bumil.idbumil')
            ->where('kesbumil.umurkandungan >=', 9)
            ->findAll();
    }
}
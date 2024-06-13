<?php

namespace App\Models;

use App\Controllers\Penimbangan;
use CodeIgniter\Model;

class BumilModel extends Model
{
    protected $table      = 'bumil';
    protected $primaryKey = 'idbumil';

    protected $allowedFields = ['nokk','ayahnik', 'ayahnama', 'ayahtmptlhr', 'ayahtgllhr', 
                                'ayahagama', 'ayahpendidikan', 'ayahpekerjaan', 
                                'ayahnohp', 'ibunik', 'ibunama', 'ibutmptlhr', 
                                'ibutgllhr', 'ibuagama', 'ibupendidikan', 
                                'ibupekerjaan', 'ibunohp', 'alamat', 'jmlhanak', 'anakke','status'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('bumil')->like('ibunama', $keyword)->orLike('ayahnama', $keyword)->orLike('alamat', $keyword);
    }

    public function getAyahByIbu($ibunama)
    {
        return $this->where('ibunama', $ibunama)->first();
    }

    public function getAllData() 
    {
        return $this->db->table($this->table)
                ->select('bumil.*')
                ->whereIn('bumil.status', ['0'])
                ->orderBy('bumil.idbumil','DESC')->get() ->getResultObject();
    }

    public function getAllMelahirkan() 
    {
        return $this->db->table($this->table)
                ->select('bumil.*')
                ->whereIn('bumil.status', ['1'])
                ->orderBy('bumil.idbumil','DESC')->get() ->getResultObject();
    }

    public function getRiwayat() 
    {
        return $this->db->table($this->table)
        ->join('kesbumil','kesbumil.idbumil = bumil.idbumil','left')
        ->select('bumil.*, kesbumil.idkesbumil, kesbumil.tglperiksa, kesbumil.umur, 
                kesbumil.umurkandungan, kesbumil.bb, kesbumil.tb, kesbumil.keluhan, 
                kesbumil.lila, kesbumil.tekanandrh, kesbumil.tinggifundus, 
                kesbumil.letakjanin, kesbumil.denyutjantung, kesbumil.bengkakkaki, 
                kesbumil.periksalabo, kesbumil.tindakan, kesbumil.nasihatsaran')
        ->orderBy('kesbumil.idkesbumil','DESC')->get() ->getResultObject();
    }

    public function getBumil($idbumil)
    {
       return $this->where(['idbumil'=> $idbumil])->first();
    }
}
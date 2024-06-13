<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenbumilModel extends Model
{
    protected $table      = 'absenbumil';
    protected $primaryKey = 'idabsen';

    protected $returnType     = 'array';

    protected $allowedFields = ['tglagenda', 'ibunama', 'ayahnama', 'kesbumil', 'kb'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('absenbumil')->like('ayahnama', $keyword)->orLike('ibunama', $keyword);
    }

    public function getDataBumil()
    {
        return $this->db->table('bumil')
            ->select('bumil.*')
            ->orderBy('bumil.idbumil','DESC')->get() ->getResultObject();
    }

    public function getDataAllBumil() 
    {
        return $this->db->table($this->table)
            ->join('agenda','absenbumil.idagenda = agenda.idagenda','left')
            ->join('bumil','absenbumil.idbumil = bumil.idbumil','left')
            ->select('absenbumil.*, agenda.idagenda, agenda.tglagenda, bumil.ibunama, bumil.ayahnama')
            ->orderBy('absenbumil.idabsen','DESC')
            ->get()
            ->getResultObject();
    }

}
<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenanakModel extends Model
{
    protected $table      = 'absenanak';
    protected $primaryKey = 'idabsenanak';

    protected $returnType     = 'array';

    protected $allowedFields = ['tglagenda', 'ibunama', 'anaknama', 'timbang', 'imun'];

    protected $useTimestamps = true;

    public function search($keyword)
    {
        return $this->table('absenanak')->like('anaknama', $keyword)->orLike('ibunama', $keyword);
    }

    public function filter($tglagenda)
    {
        return $this->table($this->table)
            ->join('agenda','absenanak.idagenda = agenda.idagenda','left')
            ->join('anak','absenanak.idanak = anak.idanak','left')
            ->join('ortu','absenanak.idortu = ortu.idortu','left')
            ->select('absenanak.*, agenda.idagenda, agenda.tglagenda, anak.anaknama, ortu.ibunama')
            ->where('tglagenda', $tglagenda)
            ->findAll();
    }

    public function getDataAnak()
    {
        return $this->db->table('anak')
                ->join('ortu','anak.idortu = ortu.idortu','left')
                ->select('anak.idanak, anak.anaknama, ortu.idortu, ortu.ibunama')
                ->orderBy('anak.idanak','DESC')->get() ->getResultObject();
    }

    public function getDataAllAnak() 
    {
        return $this->db->table($this->table)
            ->join('agenda','absenanak.idagenda = agenda.idagenda','left')
            ->join('anak','absenanak.idanak = anak.idanak','left')
            ->join('ortu','absenanak.idortu = ortu.idortu','left')
            ->select('absenanak.*, agenda.idagenda, agenda.tglagenda, anak.anaknama, ortu.ibunama')
            ->orderBy('absenanak.idabsenanak','DESC')
            ->get()
            ->getResultObject();
    }

}
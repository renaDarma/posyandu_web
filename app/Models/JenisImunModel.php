<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisImunModel extends Model
{
    protected $table      = 'jenisimun';
    protected $primaryKey = 'idJenImun';

    protected $returnType     = 'array';

    protected $allowedFields = ['idJenImun', 'namaimun', 'umur', 'keterangan'];

    protected $useTimestamps = true;

    public function getJenisImun() 
    {
    return $this->db->table('jenisimun')
        ->select('jenisimun.*')
        ->orderBy('jenisimun.idJenImun','DESC')
        ->get() 
        ->getResultObject();    
    }

}
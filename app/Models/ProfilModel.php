<?php

namespace App\Models;

use CodeIgniter\Model;
class ProfilModel extends Model
{
	protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $allowedFields = ['username','email', 'fullname','usernohp'];

    protected $useTimestamps = true;


}
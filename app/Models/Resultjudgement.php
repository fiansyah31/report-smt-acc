<?php

namespace App\Models;

use CodeIgniter\Model;

class Resultjudgement extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tbl_resultjudgement';
    protected $primaryKey           = 'id_resultjudgement';

    protected $allowedFields = [
    'keterangan_laporan'
    ];



    
}
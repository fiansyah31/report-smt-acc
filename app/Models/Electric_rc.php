<?php

namespace App\Models;

use CodeIgniter\Model;

class Electric_rc extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tbl_electric_room_cooler';
    protected $primaryKey           = 'id_electric_rc';

    protected $allowedFields = [
    'electric_room_cooler', 'laporan_id', 'id_resultjudgement_laporan'
    ];



    
}
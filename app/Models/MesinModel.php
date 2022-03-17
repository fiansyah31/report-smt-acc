<?php

namespace App\Models;

use CodeIgniter\Model;

class MesinModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tbl_mesin';

    protected $allowedFields = [
    'nama_mesin', 'laporan_id', 'result', 'judgement', 'file_gambar', 'temuan'];


    public function getMesin($id_laporan = false)
    {
        if ($id_laporan == false) {
            return
                $this->findAll();
        }
        return
            $this->where(['laporan_id' => $id_laporan])->findAll();
    }
    
}
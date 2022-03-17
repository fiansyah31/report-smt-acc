<?php

namespace App\Models;

use CodeIgniter\Model;

class GambarMesin extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'gambar_mesin';

    protected $allowedFields = [
    'file_gambar', 'mesin_id', 'laporanmesin_id'];


    public function getGambar($id_laporan = false)
    {
        if ($id_laporan == false) {
            return
                $this->findAll();
        }
        return
            $this->where(['laporanmesin_id' => $id_laporan])->findAll();
    }
    
}
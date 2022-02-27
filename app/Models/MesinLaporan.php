<?php

namespace App\Models;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\Model;

class MesinLaporan extends Model
{
    protected $table = "tbl_laporan";
    protected $table2 = "tbl_mesin";


    public function Joinmesinlaporan(){
        return $this->table('tbl_laporan');
        $this->select('id_laporan, nama, tanggal','nama_mesin', 'result', 'judgement')->join('tbl_mesin', 'tbl_mesin.laporan_id = tbl_laporan.id_laporan');
          $this->get()->getResultArray();
    }
}
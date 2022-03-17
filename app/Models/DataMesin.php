<?php
namespace App\Models;

use CodeIgniter\Model;


class DataMesin extends Model
{
   protected $DBGroup              = 'default';
   protected $table                = 'mesin';
   protected $primaryKey           = 'id';
   protected $useAutoIncrement     = true;

   protected $allowedFields = [
    'mesin'// 'foto_mesin'
 ];
 protected $useTimestamps = true;

    
public function getDataMesin($id_email = null){
   if ($id_email == false) {
      return
          $this->findAll();
  }
  return
      $this->where(['id_email' => $id_email])->first();
}
}
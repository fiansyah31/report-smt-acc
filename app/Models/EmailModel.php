<?php
namespace App\Models;

use CodeIgniter\Model;


class EmailModel extends Model
{
   protected $DBGroup              = 'default';
   protected $table                = 'tbl_email';
   protected $primaryKey           = 'id_email';
   protected $useAutoIncrement     = true;

   protected $allowedFields = [
    'email', 'user_id'
 ];
 protected $useTimestamps = true;

    
public function getEmail($id_email = null){
   if ($id_email == false) {
      return
          $this->findAll();
  }
  return
      $this->where(['id_email' => $id_email])->first();
}
}
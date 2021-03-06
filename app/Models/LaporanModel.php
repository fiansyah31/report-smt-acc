<?php
namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;


class LaporanModel extends Model
{
   protected $DBGroup              = 'default';
   protected $table                = 'tbl_laporan';
   protected $primaryKey           = 'id_laporan';
   protected $useAutoIncrement     = true;
    
   protected $allowedFields = [
     'nama', 'idkaryawan', 'tanggal', 'jam_mulai', 'jam_selesai', 'acc', 'user_id'
   ];
    
    //Dates
   protected $useTimestamps        = true;
    
    public function inser($data){

         $data=  $this->getInsertID('id_laporan');
    }
    public function getLaporan($id_laporan = false)
    {
       
        if ($id_laporan == false) {
        return
         $this->findAll();
         
        }
        return
            $this->where(['id_laporan' => $id_laporan])->first();
          
    }
    
    public function LaporanFind(){

     return $this->table("tbl_laporan")
    ->select('*')
    ->join('tbl_mesin', 'tbl_mesin.laporan_id = tbl_laporan.id_laporan')
    ->join('gambar_mesin', 'gambar_mesin.laporanmesin_id = tbl_mesin.laporan_id')
    ->get()->getResultArray();
    }

    public function Mingguan(){
      $mingguan =  Time::now('Y');
      $this->select('tanggal');
      $this->where('tanggal',$mingguan);
      return $this->get()->getDayOfYear();
     
    }
    public function Bulanan(){
      $mingguan =  new Time('now');
        $mingguan->getWeekOfMonth();
      $this->selectSum('nama');
      $this->where('tanggal',$mingguan);
      $query = $this->get();
      return $query->getNumRows();
    }
 
     public function hapus_data($where,$table){
         $this->where($where);
         $this->delete($table);
      }
   



 // GET ALL PRODUCT
 //function get_laporans(){
 //   $query = $this->get('tbl_laporan');
  //  return $query;
//}
 //GET PRODUCT BY PACKAGE ID
 //function get_laporan_by_resultjudgement($resultjudgement_id){
  //  $this->select('*');
   // $this->from('tbl_laporan');
   // $this->join('detail_laporan', 'detail_laporan_id=id_laporan');
   // $this->join('tbl_resultjudgement', 'id_resultjudgement=detail_resultjudgement_id');
   // $this->where('id_resultjudgement',$resultjudgement_id);
   // $query = $this->get();
   // return $query;
//}

//READ
//function get_resultjudgements(){
 //   $this->select('tbl_resultjudgement.*,COUNT(id_laporan) AS item_laporan');
  //  $this->from('tbl_resultjudgement');
  //  $this->join('detail_laporan', 'id_resultjudgement=detail_resultjudgement_id');
   // $this->join('tbl_laporan', 'detail_laporan_id=id_laporan');
  //  $this->group_by('id_resultjudgement');
  //  $query = $this->get();
   // return $query;
//}

// CREATE
//function create_laporan($resultjudgement,$laporan){
    //$this->transStart();
    //    $id= user()->id;
        //INSERT TO PACKAGE
     //   $data  = array([
      //      'nama' => $laporan,
         //   'tanggal' => $laporan,
      //      'air_compresor' => $laporan,
        //    'electric_room_cooler' => $laporan,
        //    'breaker_mast' => $laporan,
        //    'hyd_pump1' => $laporan,
        //    'hyd_pump2' => $laporan,
        //    'traversing_unit' => $laporan,
        //    'keterangan_laporan' => $resultjudgement,
           // 'user_id' => $id
       // ]);
      // $this->save('tbl_laporan', $data);


        //GET ID PACKAGE
      //  $id_laporan = $this->insertID();
      //  $result = array();
      //      foreach($resultjudgement AS $key => $val){
       //          $result[] = array(
        //          'detail_laporan_id'   => $id_laporan,
          //        'detail_resultjudgement_id'   => $_POST['tbl_resultjudgement'][$key]
         //        );
        //    }      
        //MULTIPLE INSERT TO DETAIL TABLE
       // $this->insert_batch('detail_laporan', $result);
   // $this->transComplete();
//}

 
// UPDATE
//function update_resultjudgement($id,$resultjudgement,$laporan){
 //   $this->trans_start();
      //UPDATE TO PACKAGE
   //     $data  = array(
  //          'package_name' => $resultjudgement
   //     );
      //  $this->where('id_resultjudgement',$id);
      //  $this->update('tbl_resultjudgement', $data);
         
        //DELETE DETAIL PACKAGE
   //     $this->delete(['detail_laporan', array('detail_resultjudgement_id' => $id)]);
///
    //    $result = array();
       //     foreach($laporan AS $key => $val){
      ///           $result[] = array(
      //            'detail_resultjudgement_id'   => $id,
       //           'detail_laporan_id'   => $_POST['laporan_edit'][$key]
       //          );
       //     }      
        //MULTIPLE INSERT TO DETAIL TABLE
       // $this->insert_batch('detail_laporan', $result);
    //$this->trans_complete();
//}

// DELETE
//function delete_resultjudgement($id){
//    $this->trans_start();
//        $this->delete(['detail_laporan', array('detail_resultjudgement_id' => $id)]);
//        $this->delete(['tbl_resultjudgement', array('id_resultjudgement' => $id)]);
//    $this->trans_complete();
}

    

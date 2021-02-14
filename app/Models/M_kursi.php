<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_kursi extends Model{
 
    public function getAll(){
        $sql = "SELECT * FROM kursi,tiket WHERE kursi.ID_TIKET = save.ID_TIKET";
        $result = $this->db->query($sql);
        return $result->result();
    }
}
<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_ongkir extends Model{
 
    protected $table = "ongkir";
    protected $primaryKey = "id";

    public function getAll(){
        $sql = "SELECT * FROM ongkir";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getOngkir($kecamatan_tujuan){
        $sql = "SELECT * FROM ongkir WHERE kecamatan_tujuan= '$kecamatan_tujuan'";
        $result = $this->db->query($sql);
        return $result;
    }

}
?>
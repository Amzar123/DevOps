<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_penjualan extends Model{
 
    protected $table = "penjualan";
    protected $primaryKey = "ID_PENJUALAN";
 
    public function get_idmax()
    {
        //$query = $this->db->query('SELECT MAX(idPenjualan) as idPenjualan FROM '.$this->table);
        $results = $this->countAllResults();
        return $results+1;
    }
    public function insertPenjualan($data)
    {
        
        $id = $data['idtrx'];
        $total = $data['total'];
        $namaPembeli = $data['penerima'];
        $alamatPembeli = $data['alamat'];
        $kecamatanPembeli = $data['kecamatan'];
        $kotaPembeli = $data['kota'];
        $hpPembeli = $data['nohp'];
        $totalongkir = $data['totalongkir'];
       
        $this->db->query("INSERT INTO penjualan( nama, hp, alamat, kecamatan, kota, total, totalongkir)VALUES ('$namaPembeli','$hpPembeli','$alamatPembeli','$kecamatanPembeli','$kotaPembeli',$total,$totalongkir)");
    } 
    public function getAllPenjualan(){
        $sql = "SELECT * FROM penjualan";
        $results = $this->db->query($sql);
        return $results;
    }
    
}
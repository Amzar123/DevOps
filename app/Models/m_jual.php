<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class M_jual extends Model{
 
    protected $table = "jual";
    
        public function insertProsesJual($data)
    {
        $id = $data['idtrx'];
        $items = $data['items'];

        foreach($items as $key => $item) {
            $productId = $item['id'];
            $productPrice = $item['price'];
            $productQty = $item['quantity'];

            $productStock = $this->db->table('products')->where('id', $productId)->get()->getRowArray();
            $nowStock = $productStock['stock'] - $productQty;

            $this->db->query("UPDATE products SET stock = '$nowStock' where id = '$productId'");
            $this->db->query("INSERT INTO jual(idpjl, id, jmljual, hargajual) VALUES ($id,$productId,$productPrice,$productQty)");
        }
    }
    
 
}
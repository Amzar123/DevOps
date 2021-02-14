<?php namespace App\Controllers;
 
use App\Models\M_product;
 
class C_product extends BaseController
{
 
    public function __construct() {
     
        $this->kursi = new M_kursi;
     
    }
    public function ShowProduct()
    {
        // membuat variabel untuk menampung session cart
        $session = session('cart');
        // membuat variabel total yang isinya mengecek ada atau tidak
        // variabel session dan memasukannya ke dalam array values
        // jika session cart tidak ada, tampilkan array() / kosong
        $data['total'] = is_array($session)? array_values($session): array();
        // menampilkan semua data product yang ada di dalam database
        $data['items'] = $this->kursi->getAll();
        // menampilkan halaman view product dan membawa variabel data
        return view('product/V_kursi', $data);
    }
}
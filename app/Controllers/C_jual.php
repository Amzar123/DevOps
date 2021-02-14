<?php namespace App\Controllers;
 
use App\Models\M_jual;
use App\Models\M_penjualan;
use Wildanfuady\WFcart\WFcart;
 
class C_jual extends BaseController
{
 
    public function __construct() {
     
        $this->jual = new M_jual;
        $this->cart = new WFcart();
        $this->penjualan = new M_penjualan;
     
    }
 
    public function proses()
    {
        $session = session('cart');
        $data =[
            'items' => $this->cart->totals(),
            'total' => $this->cart->count_totals(),
            'totalongkir' => $this->request->getPost('totalongkir'),
            // 'total' => $this->request->getPost('totalbayar'),
            'total_array'=> is_array($session)? array_values($session): array(),
            'idtrx'=>$this->penjualan->get_idmax(),
            'penerima'=>$this->request->getPost('nama'),
            'alamat'=>$this->request->getPost('alamat'),
            'kecamatan'=>$this->request->getPost('kecamatan'),
            'kota'=>$this->request->getPost('kota_tujuan'),
            'nohp'=>$this->request->getPost('telp'),
        ];
        $this->penjualan->insertPenjualan($data);
        $this->jual->insertProsesJual($data);
        unset($_SESSION['cart']);
        return redirect()->to('/product');
    }

 
}
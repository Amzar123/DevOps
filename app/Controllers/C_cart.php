<?php namespace App\Controllers;
 
use App\Models\M_product;
use App\Models\M_penjualan;
// memanggil library / package WFcart
use Wildanfuady\WFcart\WFcart;
 
class C_cart extends BaseController
{
 
    public function __construct() {
 
        // memanggil product model
        $this->product = new M_product;
        $this->penjualan = new M_penjualan;
        // membuat variabel untuk menampung class WFcart
        $this->cart = new WFcart();
        // memanggil form helper
        helper('form');
 
    }
 
    public function index()
    {
        // membuat variabel untuk menampung total keranjang belanja
        $data['items'] = $this->cart->totals();
        // menampilkan total belanja dari semua pembelian
        $data['total'] = $this->cart->count_totals();
        // menampilkan halaman view cart
        return view('Cart/v_cart', $data);
    }
    public function checkout(){
        helper('form');
        // membuat variabel untuk menampung total keranjang belanja
        $data['items'] = $this->cart->totals();
        // menampilkan total belanja dari semua pembelian
        $data['total'] = $this->cart->count_totals();
        // menampilkan halaman view cart
        return view('checkout/V_form', $data);
   }

   public function simpan(){
       $nama = $this->request->getpost('nama');
       $HP = $this->request->getpost('HP');
       $alamat = $this->request->getpost('alamat');
       $kecamatan = $this->request->getpost('kecamatan');
       $kota = $this->request->getpost('kota');
       $tgl = date('YYYY-mm-dd H:i:s');
       $total = 
       $data = [
        'nama' => $nama,
        'hp' => $HP,
        'alamat' => $alamat,
        'kecamatan' => $kecamatan,
        'kota' => $kota,
        'tgl' => $tgl,
        'total' => 10
       ];
       $this->penjualan->simpanpenjualan($data);
       return redirect()->to('product');
   }
   


    public function beli($id = null)
    {
        // cari product berdasarkan id
        $product = $this->product->getProduct($id);
        // cek data product
        if($product != null){ // jika product tidak kosong
 
            // buat variabel array untuk menampung data product
            $item = [
                'id'        => $product['id'],
                'name'      => $product['name'],
                'price'     => $product['price'],
                'photo'     => $product['photo'],
                'berat'     => $product['berat'],
                'quantity'  => 1
            ];
            // tambahkan product ke dalam cart
            $this->cart->add_cart($id, $item);
            // tampilkan nama product yang ditambahkan
            $product = $item['name'];
            // success flashdata
            session()->setFlashdata('success', "Berhasil memasukan {$product} ke karanjang belanja");
        } else {
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/product');
    }
 
    // function untuk update cart berdasarkan id dan quantity
    public function update()
    {
        // update cart
        $this->cart->update();
        return redirect()->to('/cart');
    }
 
    // function untuk menghapus cart berdasarkan id
    public function remove($id = null)
    {
         
        // cari product berdasarkan id
        $product = $this->product->getProduct($id);
        // cek data product
        if($product != null){ // jika product tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($id);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
        } else { // product tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/cart');
    }
 
}
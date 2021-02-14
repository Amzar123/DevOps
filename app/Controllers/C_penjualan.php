<?php namespace App\Controllers;
 
use App\Models\M_penjualan;
use App\Models\M_ongkir;
use Wildanfuady\WFcart\WFcart;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class C_penjualan extends BaseController
{
 
    public function __construct() {
     
        $this->penjualan = new M_penjualan;
        $this->ongkir= new M_ongkir;
        $this->cart = new WFcart();
    }
    
    public function export_excel()
    {
        $data = [
            'title' => "laporan",
            'data' => $this->penjualan->getAllPenjualan()->getResult()
        ];
        return view('dokumen/v_laporan_excel', $data);
    }

    public function customer_page()
    { 
        $data=[
            'data_kecamatan' => $this->ongkir->getAll()->getResult()
        ];
        return view('checkout/V_form',$data);
    }

    public function TampilkanData(){
        $data['data'] = $this->penjualan->getAllPenjualan()->getResult();
        return view('dokumen/v_laporan', $data);
    }
    public function checkout_page()
    {
        $kecamatan_tujuan = $this->request->getPost('kecamatan');
        $session = session('cart');
        echo $kecamatan_tujuan;
        $ongkirperkilo = $this->ongkir->getOngkir($kecamatan_tujuan)->getResult();
        // echo $ongkirperkilo;
            $data =[
                'items' => $this->cart->totals(),
                'total' => $this->cart->count_totals(),
                'total_array'=> is_array($session)? array_values($session): array(),
                'idtrx'=>$this->penjualan->get_idmax(),
                'penerima'=>$this->request->getPost('nama'),
                'alamat'=>$this->request->getPost('alamat'),
                'kecamatan'=>$kecamatan_tujuan,
                'kota'=>$this->request->getPost('kota_tujuan'),
                'nohp'=>$this->request->getPost('telp'),
                'ongkir' => $ongkirperkilo,
            ];
        
        return view('checkout/v_allinvoice',$data);
    }
 
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NB Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Detail Pembelian</h1>
        <div class="card">
            <div class="card-header">CHECKOUT</div>
                <div class="card-body">
                    <!-- tampilkan pesan success -->
                    <?php if(session()->getFlashdata('success') != null){ ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php } ?>
                    <!-- selesai menampilkan pesan success -->
                    
                    <?php if(count($items) != 0){ // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: ?>
                    <div class="table-responsive">
                    <form  action="<?php echo base_url('/konfirmasi'); ?>" method="post" >
                    <div class="container">
                    <h1 class="text-center mb-5">Data Pembeli</h1>
                    <label class="control-label col-xs-3" for="firstName">ID Transaksi :</label>
                    <input type="text" class="form-control" name="id" id="nama" value="<?php echo $idtrx;?>" readonly>
                    <label class="control-label col-xs-3" for="firstName">Nama Pembeli :</label>
                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $penerima;?>" readonly>
                    <label class="control-label col-xs-3" for="firstName">Alamat :</label>
                    <input type="text" class="form-control" name="alamat" id="nama" value="<?php echo $alamat;?>" readonly>
                    <label class="control-label col-xs-3" for="firstName">Kecamatan :</label>
                    <input type="text" class="form-control" name="kecamatan" id="nama" value="<?php echo $kecamatan;?>" readonly>
                    <label class="control-label col-xs-3" for="firstName">Kota :</label>
                    <input type="text" class="form-control" name="kota_tujuan" id="nama" value="<?php echo $kota;?>" readonly>
                    <label class="control-label col-xs-3" for="firstName">Telepon :</label>
                    <input type="text" class="form-control" name="telp" id="nama" value="<?php echo $nohp;?>" readonly>
                    </div>   
                    <h1 class="text-center mb-5">Daftar Pembelian Barang</h1>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Berat</th>
                                    <th>Kuantitas</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $berat = 0 ?>
                                <?php foreach($items as $key => $item) { 
                                    $berat = $berat + $item['berat']*$item['quantity'];
                                    ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><img src="<?php echo base_url('img/'.$item['photo']); ?>" width="100px"></td>
                                    <td><?php echo $item['berat']; ?></td>
                                    <td><?php echo $item['quantity']; ?></td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" class="text-right">Aktual</td>
                                    <td><?php echo $berat ?> Kg</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Total Berat</td>
                                    <?php $temp = fmod ( $berat , 1.0 ) ;
                                    if ($temp<=0.3){
                                     $berat = $berat-$temp;   
                                    }
                                    else{
                                        $berat = $berat-$temp;
                                        $berat++;
                                    }?>
                                    <td><?php echo $berat ?> Kg</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><b>Ongkir/Kg</b></td>
                                    <?php foreach($ongkir as $key => $ongkos) {
                                        $ongkirperkilo = $ongkos->ongkir_perkilo
                                    ?>
                                    <td><b> Rp. <?php echo number_format($ongkos->ongkir_perkilo, 0, 0, '.');?></b></td>
                                    <?php }?>
                                    
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><b>Total Ongkir</b></td>
                                    <td><b>Rp.<input type="text" class="form-control" name="totalongkir" id="totalongkir" value="<?php echo $ongkirperkilo*$berat?>" readonly></b></td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Jumlah</td>
                                    <td>Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><b>Total Bayar</b></td>
                                    <td><b> Rp. <?php echo number_format(($ongkirperkilo*$berat) + $total, 0, 0, '.'); ?></b></td>
                                    <!-- <td><b>Rp.<input type="text" class="form-control" name="totalongkir" id="totalbayar" value="<?php //echo $ongkirperkilo + $total;?>" readonly></b></td> -->
                                </tr>
                            </tbody>
                        </table>
                        
                    
                    </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table ?>
 
                    <?php if(count($items) == 0){ // jika cart kosong, maka tampilkan: ?>
                    Keranjang belanja Anda sedang kosong. <a href="<?php echo base_url('product'); ?>" class="btn btn-success">Belanja Yuk</a>
                    <?php } else { // jika cart tidak kosong, tampilkan: ?>
                        <button type="submit" class="btn btn-primary">Lanjutkan</button>
                    <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
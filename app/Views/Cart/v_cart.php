<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Shopping Cart Toko Amzar</h1>
        <div class="card">
            <div class="card-header">List Cart</div>
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
                        <?php echo form_open('C_cart/update'); ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Gambar</th>
                                    <th>Kuantitas</th>
                                    <th>Berat</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $berat = 0 ?>
                                <?php foreach($items as $key => $item) { 
                                    $berat = $berat + $item['berat']*$item['quantity']?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><img src="<?php echo base_url('img/'.$item['photo']); ?>" width="100px"></td>
                                  
                                    <td>
                                        <input type="number" name="quantity[]" min="1" class="form-control" value="<?php echo $item['quantity']; ?>" style="width:50px">
                                    </td>
                                    <td><?php echo $item['berat'];?></td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary btn-sm">Edit</button>
                                            <a href="<?php echo base_url('C_cart/remove/'.$item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')">Hapus</i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" class="text-right"><b>Total Berat</b></td>
                                    <td><b>Rp. <?php echo $berat ?></b></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"><b>Jumlah</b></td>
                                    <td><b>Rp. <?php echo number_format($total, 0, 0, '.'); ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php echo form_close(); ?>
                     
                    </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table ?>
 
                    <?php if(count($items) == 0){ // jika cart kosong, maka tampilkan: ?>
                    Keranjang belanja Anda sedang kosong. <a href="<?php echo base_url('product'); ?>" class="btn btn-success">Belanja Yuk</a>
                    <?php } else { // jika cart tidak kosong, tampilkan: ?>
                        <a href="<?php echo base_url('product'); ?>" class="btn btn-success">Lanjut Belanja</a>
                        <a href="<?php echo base_url('form'); ?>" class="btn btn-primary">Checkout</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
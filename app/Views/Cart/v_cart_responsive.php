<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-5">Shopping Cart</h1>
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
                        <?php echo form_open('cart/update'); ?>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Quantity (Kg)</th>
                                <th>Price</th>
                                <th>Sub Total</th>
                                <th>Sub Weight (Kg)</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $weight=0;
                            //$weight_total = 0;
                            foreach($items as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><img src="<?php echo base_url('images/'.$item['photo']); ?>" width="80px"></td>
                                    <td>
                                        <input type="number" name="quantity[]" min="1" class="form-control" value="<?php echo $item['quantity']; ?>" style="width:50px">
                                    </td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                    <td>
                                        <?php
                                        //$weight_total += $item['quantity']*1;
                                        echo $item['quantity'] * $item['berat'];
                                        ?>
                                        Kg</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Update</button>
                                            <a href="<?php echo base_url('cart/remove/'.$item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')"><i class="fa fa-trash"></i>  Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="text-right">Jumlah</td>
                                <td>Rp. <?php echo number_format($total, 0, 0, '.'); ?></td>
                                <td> <?php echo $weight?> Kg</td>
                                <?php
                                $sisa = 0;
                                $totalBeratBaru = 0;

                                $sisa = fmod($weight,1);

                                if ($sisa > 0.3) {
                                $totalBeratBaru = ceil($weight);
                                } else {
                                $totalBeratBaru = floor($weight);
                                }
                                ?>
                                <td> <?php echo $totalBeratBaru?> Kg</td>
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
                    <a href="<?php echo base_url('dataPembeli'); ?>" class="btn btn-warning">Checkout</a>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
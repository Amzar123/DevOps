<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center mb-5">Product Amzar Mart</h3>
        <a href="<?php echo base_url('printpdf'); ?>" class="btn btn-primary">Laporan</a>
        <div class="card">
            <div class="card-header">
                List Product
                <a class="btn btn-success btn-sm float-right" href="<?php echo base_url('cart'); ?>"><i class="fa fa-cart-plus"></i> <?php echo count($total); ?></a>
            </div>
                <div class="card-body">
                    <?php if(session()->getFlashdata('success') != null){ ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                    <?php } ?>
                    <?php if(session()->getFlashdata('error') != null){ ?>
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Stok</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($items as $key => $item) { ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $item['name']; ?></td>
                                    <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                    <td><?php echo $item['berat']; ?> Kg</td>
                                    <td><?php echo $item['stock']; ?> Pcs</td>
                                    <td><?php echo $item['description']; ?></td>
                                    <td><img src="<?php echo base_url('img/'.$item['photo']); ?>" width="100px"></td>
                                    <td>
                                        <a href="<?php echo base_url('C_cart/beli/'.$item['id']); ?>" class="btn btn-primary">Beli</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
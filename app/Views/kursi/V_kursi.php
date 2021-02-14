<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-5">Amzar Movies</h3>
    <!-- Cart basket -->

    <div class="card">
        <div class="cart-view">
            <a class="btn btn-success float-right" href="<?php echo base_url('cart'); ?>"><i class="fa fa-cart-plus"></i><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo count($total); ?> </a>
        </div>
        <div class="container mt-2">
            <div class="row">
                <?php foreach($items as $key => $item) { ?>
                <div class="col-md-3 col-6">
                    <div class="card card-block">
                        <img src="<?php echo base_url('img/'.$item['photo']); ?>">
                        <h5 align = "center"class="card-title mt-3 mb-3"><?php echo $item['KURSI']; ?></h5>
                        <p align = "center" class="card-text">Berat &nbsp; <?php echo $item['berat']; ?>Kg</p>
                        <h6  align = "center" class="card-text">Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></h6>
                        <p align = "center" class="card-text">Stok: <?php echo $item['stock']; ?></p>
                        <a href="<?php echo base_url('C_cart/beli/'.$item['id']); ?>" class="btn btn-primary btn-sm">Beli</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
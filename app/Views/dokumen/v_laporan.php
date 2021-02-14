<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Print PDF</title>
</head>

<style>
    @media print {
  #printPageButton {
    display: none;
  }
}
</style>
<body>

    <div class="container mt-5">
    <button id="printPageButton" onclick="window.print()">Print laporan</button>
    <a href="<?php echo base_url('printxls') ?>"><button id="printPageButton">Export to Excel</button></a>
    <h1 align="center">LAPORAN PENJUALAN PT.AMZAR</h1>
    <h1 align="center">PERIODE 2019-2020</h1>
        <table class="table table-bordered table-striped" border="1">
                <tr>
                    <th>No</th>
                    <th>Nama Pembeli</th>
                    <th>Total Penjualan</th>
                    <th>Total Ongkir</th>
                </tr>
                <?php $no = 1; ?>
                <?php foreach ($data as $pp) : ?>
                    <tr>
                        <td><?= $pp->idpjl; ?></td>
                        <td><?= $pp->nama; ?></td>
                        <td><?= $pp->total; ?></td>
                        <td><?= $pp->totalongkir; ?></td>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
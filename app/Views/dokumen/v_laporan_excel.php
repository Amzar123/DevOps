<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>
        <tr>
            <th>No Penjualan</th>
            <th>Nama Pembeli</th>
            <th>Total Penjualan</th>
            <th>Total Ongkir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $no => $value) { ?>
        <tr>
            <td><?=$value->idpjl?></td>
            <td><?=$value->nama?></td>
            <td><?=$value->total?></td>
            <td><?=$value->totalongkir?></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
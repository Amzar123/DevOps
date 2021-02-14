<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
 
<div class="container">
<form class="form-horizontal" action="<?php echo base_url('/checkout'); ?>" method="post" name="frmCO"
        id="frmCO">

        <h1>Masukan identitas anda</h1>
    
        <div class="form-outline mb-4">
            <label class="control-label col-xs-3" for="firstName">Nama :</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="control-label col-xs-3" for="lastName">Alamat:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat">
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="control-label col-xs-3" for="phoneNumber">Telp:</label>
            <div class="col-xs-9">
                <input type="tel" class="form-control" name="telp" id="telp" placeholder="No Telp">
            </div>
        </div>
        <div class="form-outline mb-4">
            <label class="control-label col-xs-3" for="phoneNumber">Kecamatan:</label>

            <div class="col-xs-9">
            <select class="form-select" name = "kecamatan"aria-label="Default select example">
                <option selected>Pilih Kecamatan</option>
                <?php foreach($data_kecamatan as $key => $data) {?>
                    <option value=<?php echo $data->kecamatan_tujuan;?>><?php echo $data->kecamatan_tujuan;?></option>
                <?php }?>
            </select>
                <!-- <input type="tel" class="form-control" name="kecamatan" id="kecamatan" placeholder="Nama Kecamatan"> -->
            </div>

        </div>
        <div class="form-outline mb-4">
            <label class="control-label col-xs-3" for="phoneNumber">Kota:</label>
            <div class="col-xs-9">
                <input type="tel" class="form-control" name="kota_tujuan" id="kota_tujuan" placeholder="kota tujuan">
            </div>
        </div>

        <div class="form-outline mb-4">
            <div class="col-xs-offset-3 col-xs-9">
                <button type="submit" class="btn btn-primary">Lanjutkan</button>
            </div>
        </div>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>
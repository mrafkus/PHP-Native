<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <?php
        include "koneksi2.php";
        $qry_get_pelanggan=mysqli_query($conn,"select * from pelanggan where id_pelanggan = '".$_GET['id_pelanggan']."'");
        $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);
        ?>

        <h3>Update Pelanggan</h3>
        <form action="proses_ubah_pelanggan.php" method="post">
        <input type="hidden" name="id_pelanggan" value="<?=$dt_pelanggan['id_pelanggan']?>">

        Nama pelanggan :
        <input type="text" name="nama" value="<?=$dt_pelanggan['nama']?>" class="form-control">

        Username :
        <textarea name="username" class="form-control" rows="4"><?=$dt_pelanggan['username']?></textarea>

        Password :
        <input type="text" name="password" value="<?=$dt_pelanggan['password']?>" class="form-control">

        Alamat :
        <textarea name="alamat" class="form-control" rows="4"><?=$dt_pelanggan['alamat']?></textarea>

        Gender :
        <?php
        $arr_gender=array('L'=>'Laki-laki','P'=>'Perempuan');
        ?>
        <select name="gender" class="form-control">
            <option></option>
            
            <?php foreach ($arr_gender as $key_gender => $val_gender):
            if($key_gender==$dt_pelanggan['gender']){
            $selek="selected";
            } else {
            $selek="";
            }
            ?>

            <option value="<?=$key_gender?>"
            <?=$selek?>><?=$val_gender?></option>

            <?php endforeach?>
        </select>

        Telfon :
        <input type="text" name="telfon" value="<?=$dt_pelanggan['telfon']?>" class="form-control">
        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">

        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
    </body>
</html>
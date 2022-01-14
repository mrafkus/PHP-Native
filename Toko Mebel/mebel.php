<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="mebel.css" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title></title>
    </head>
    <body>
        <?php
            include "header.php";
        ?>
        <h1 style="margin-top: 20px; margin-bottom: 50px;">Perangkat Mebel</h1>
        <table style="margin-left: 0px;">
            <thead>
            </thead>
            <tbody>
                <?php
                include "koneksi2.php";
                $qry_produk=mysqli_query($conn,"select * from produk");

                $no=0;
                while($data_produk=mysqli_fetch_array($qry_produk)){
                $no++;?>
                <tr>
                    <!-- mulai upload file -->
		            <td><img class="photo" src="<?php echo "gambar/".$data_produk['foto_produk']; ?>"></td>
                </tr>
                <tr>
                    <td><?=$data_produk['nama_produk']?></td>
                </tr>
                <tr>
                    <td><?=$data_produk['deskripsi']?></td>
                </tr>
                <tr>
                    <td><?=$data_produk['bahan']?></td>
                </tr>
                <tr>
                    <td><?=$data_produk['harga']?></td>
                </tr>
                <td>
                    <a href="beli.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-success">Beli</a>
                    <a href="detail.php?id_produk=<?=$data_produk['id_produk']?>"class="btn btn-danger">Detail</a>
                    <h1 style="margin-bottom: 70px;"></h1>
                </td>
                <?php
                }
                ?>
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <?php
            include "footer.php";
        ?>
    </body>
</html>
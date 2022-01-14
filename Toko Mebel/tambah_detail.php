<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Modul PHP Native – Rekayasa Perangkat Lunak SMK Telkom Malang</title>
        
    </head>
    <body>
        <h3>Tambah Detail Transaksi</h3>
        <form action="proses_tambah_detail.php" method="post">

            Id transaksi :
            <input type="text" name="id_transaksi" value="" class="form-control">

            Id produk :
            <input type="text" name="id_produk" value="" class="form-control">

            Quantity :
            <input type="text" name="qty" value="" class="form-control">

            Subtotal :
            <input type="text" name="subtotal" value="" class="form-control">
            <input type="submit" name="simpan" value="Tambah Detail Transaksi" class="btn btn-primary">
        </form>
        <script>
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
    </body>
</html>
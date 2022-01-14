<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Modul PHP Native – Rekayasa Perangkat Lunak SMK Telkom Malang</title>
        
    </head>
    <body>
        <h3>Tambah Transaksi</h3>
        <form action="proses_tambah_transaksi.php" method="post">
            ID TRANSAKSI :
            <input type="text" name="id_transaksi" value="" class="form-control">

            ID PELANGGAN :
            <input type="text" name="id_pelanggan" value="" class="form-control">

            ID PETUGAS :
            <input type="text" name="id_petugas" value="" class="form-control">

            TGL TRANSAKSI :
            <input type="date" name="tgl_transaksi" value="" class="form-control">
            <input type="submit" name="simpan" value="Tambah Transaksi" class="btn btn-primary">
        </form>

        <script>
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
    </body>
</html>
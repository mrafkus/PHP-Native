<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Modul PHP Native – Rekayasa Perangkat Lunak SMK Telkom Malang</title>
        
    </head>
    <body>
        <h3>Tambah Member</h3>
        <form action="proses_tambah_member.php" method="post">
        nama :
        <input type="text" name="nama" value="" class="form-control">

        alamat :
        <textarea name="alamat" class="form-control" rows="4"></textarea>

        jenis kelamin :
        <select name="jenis_kelamin" class="form-control">
            <option></option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>    

        telpon :
        <input type="text" name="telpon" value="" class="form-control">
        <input type="submit" name="simpan" value="Tambah Member" class="btn btn-primary">
        </form>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
    </body>
</html>
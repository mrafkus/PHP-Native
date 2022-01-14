<?php
if($_POST){
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $bahan=$_POST['bahan'];
    $harga=$_POST['harga'];

    //upload file
    $nama = $_FILES['foto_produk']['name'];
    $ukuran	= $_FILES['foto_produk']['size'];
    $file_tmp = $_FILES['foto_produk']['tmp_name'];

    if(empty($nama_produk)){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    }elseif(empty($deskripsi)){
        echo "<script>alert('deskripsi tidak boleh kosong');location.href='tambah_produk.php';</script>";
    }elseif(empty($bahan)){
        echo "<script>alert('bahan tidak boleh kosong');location.href='tambah_produk.php';</script>";
    }elseif(empty($harga)){
        echo "<script>alert('harga tidak boleh kosong');location.href='tambah_produk.php';</script>";
    }else{
        include "koneksi2.php";
        move_uploaded_file($file_tmp, 'foto_produk/'.$nama);
		$insert=mysqli_query($conn,"insert into produk (nama_produk,deskripsi,bahan,harga,foto_produk) value ('".$nama_produk."','".$deskripsi."','".$bahan."','".$harga."', '".$nama."')");

        if($insert){
            echo "<script>alert('Sukses menambahkan produk');location.href='tambah_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    }
}
?>